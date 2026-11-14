<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{
    public function list(): View
    {
        $articles = Article::with('category')
            ->latest()
            ->orderByDesc('id')
            ->paginate(12);

        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article): View
    {
        $article->load('category');

        return view('articles.details', ['article' => $article]);
    }

    public function index(): JsonResponse
    {
        $articles = Article::with('category')
            ->latest()
            ->get();

        return response()->json([
            'data' => $articles,
        ]);
    }
}
