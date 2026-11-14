@extends('layouts.app')

@section('title', 'Latest stories | Northline')

@section('content')
    <main class="container py-5">
        <header class="d-flex justify-content-between align-items-end border-bottom border-dark pb-3 mb-4">
            <div>
                <p class="text-uppercase small text-danger mb-2">STAR EVAL · Independent stories</p>
                <h1 class="display-5 fw-semibold mb-0">Latest stories</h1>
            </div>

            <span class="text-secondary small d-none d-md-block">The daily edition</span>
        </header>

        <div class="row g-4">
            @forelse ($articles as $article)
                <div class="col-md-6 col-lg-4">
                    <article class="h-100 border-top border-dark pt-3">
                        <p class="small text-uppercase text-danger mb-2">
                            {{ $article->category?->name ?? 'Uncategorized' }}
                        </p>

                        <h2 class="h4">
                            <a href="{{ route('articles.show', $article->permalink) }}" class="link-dark text-decoration-none" wire:navigate>
                                {{ $article->title }}
                            </a>
                        </h2>

                        <p class="text-secondary">{{ $article->summary }}</p>

                        @if ($article->published_at)
                            <time class="small text-secondary" datetime="{{ $article->published_at->toDateString() }}">
                                {{ $article->published_at->format('M j, Y') }}
                            </time>
                        @else
                            <span class="small text-secondary">Not published yet</span>
                        @endif
                    </article>
                </div>
            @empty
                <div class="col">
                    <p class="text-secondary">No articles available yet.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $articles->links('pagination::bootstrap-5') }}
        </div>
    </main>
@endsection
