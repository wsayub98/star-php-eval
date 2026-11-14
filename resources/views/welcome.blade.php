<main class="container py-5">
    <header class="d-flex justify-content-between align-items-end border-bottom border-dark pb-3 mb-4">
        <div>
            <p class="text-uppercase small news-accent mb-2">Northline · Independent stories</p>
            <h1 class="news-heading display-5 fw-semibold mb-0">Latest stories</h1>
        </div>

        <span class="text-secondary small d-none d-md-block">The daily edition</span>
    </header>

    <div class="row mb-4">
        <div class="col-md-6 col-lg-4">
            <label for="article-search" class="form-label">Search by title</label>

            <input
                id="article-search"
                type="search"
                class="form-control"
                placeholder="Try “gardens”"
                wire:model.live.debounce.300ms="search"
            >
        </div>
    </div>

    {{-- <div class="row g-4">
        @forelse ($articles as $article)
            <div class="col-md-6 col-lg-4">
                <article class="h-100 border-top border-dark pt-3">
                    <p class="small text-uppercase news-accent mb-2">
                        {{ $article->category->name }}
                    </p>

                    <h2 class="news-card-title h4">
                        <a
                            class="link-dark text-decoration-none"
                            href="{{ route('articles.show', $article->permalink) }}"
                        >
                            {{ $article->title }}
                        </a>
                    </h2>

                    <p class="text-secondary">{{ $article->summary }}</p>

                    <time class="small text-secondary">
                        {{ $article->published_at->format('M j, Y') }}
                    </time>
                </article>
            </div>
        @empty
            <div class="col">
                <p>No articles match that title.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $articles->links() }}
    </div> --}}
</main>