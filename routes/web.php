<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'list'])->name('home');
Route::get('/articles', [ArticleController::class, 'list'])->name('articles.index');
Route::get('/articles/{article:permalink}', [ArticleController::class, 'show'])->name('articles.show');
