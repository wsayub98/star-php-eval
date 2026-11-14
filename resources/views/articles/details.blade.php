@extends('layouts.app')

@section('title', $article->title.' | STAR EVAL')

@section('content')
<main id="main-content" class="container reading-page">
    <a href="{{ route('articles.index') }}" class="link-secondary" wire:navigate>← All stories</a>

    <article class="mx-auto mt-4" style="max-width: 720px">
        <p class="story-category small">{{ $article->category?->name ?? 'Uncategorized' }}</p>

        <h1 class="reading-title">
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

        @if ($article->thumbnail)
            <img src="{{ $article->thumbnail }}" alt="Football on a pitch" class="img-fluid rounded mt-4" width="960" height="640" style="aspect-ratio: 3 / 2; object-fit: cover;">
        @endif

        <div class="mt-4 reading-body">
            {{ $article->body }}
        </div>
    </article>
</main>
@endsection
