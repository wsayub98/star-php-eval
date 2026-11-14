<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{
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
