@extends('layouts.app')

@section('title', $article->title.' | STAR EVAL')

@section('content')
<main class="container py-5">
    <a href="{{ route('articles.index') }}" class="link-secondary" wire:navigate>← All stories</a>

    <article class="mx-auto mt-4" style="max-width: 720px">
        <p class="small text-uppercase text-danger">{{ $article->category?->name ?? 'Uncategorized' }}</p>

        <h1 class="news-heading display-5 fw-semibold">
            {{ $article->title }}
        </h1>

        <p class="lead text-secondary">{{ $article->summary }}</p>

        @if ($article->published_at)
            <time class="small text-secondary" datetime="{{ $article->published_at->toDateString() }}">
                {{ $article->published_at->format('F j, Y') }}
            </time>
        @else
            <span class="small text-secondary">Not published yet</span>
        @endif

        <div class="mt-5 fs-5 lh-lg" style="white-space: pre-line">
            {{ $article->body }}
        </div>
    </article>
</main>
@endsection
