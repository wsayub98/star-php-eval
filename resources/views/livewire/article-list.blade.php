<div class="story-index">
    <div class="story-search">
        <label for="article-search" class="form-label">Search by title</label>
        <input id="article-search" type="search" class="form-control"
            placeholder="Find a story" wire:model.live.debounce.300ms="search"
            aria-controls="article-results">
        <div class="search-status" role="status" aria-live="polite">
            <span wire:loading wire:target="search">Searching...</span>
        </div>
    </div>

        <div id="article-results" class="story-list" aria-live="polite" aria-atomic="false">
            @forelse ($articles as $article)
                <article class="story-row" wire:key="article-{{ $article->id }}" aria-labelledby="story-title-{{ $article->id }}">
                    <div class="story-meta">
                        @if ($article->thumbnail)
                            <img src="{{ $article->thumbnail }}" alt="Football on a pitch" class="img-fluid rounded mb-3" width="160" height="107" loading="lazy" style="aspect-ratio: 3 / 2; object-fit: cover;">
                        @endif
                        <p class="story-category">
                            {{ $article->category?->name ?? 'Uncategorized' }}
                        </p>

                        @if ($article->published_at)
                            <time class="small text-secondary" datetime="{{ $article->published_at->toDateString() }}">
                                {{ $article->published_at->format('M j, Y') }}
                            </time>
                        @else
                            <span class="small text-secondary">Not published yet</span>
                        @endif
                    </div>
                    <div class="story-copy">
                        <h2 id="story-title-{{ $article->id }}" class="story-title">
                            <a href="{{ route('articles.show', $article->permalink) }}" wire:navigate>{{ $article->title }}</a>
                        </h2>
                        <p class="story-summary">{{ $article->summary }}</p>
                    </div>
                </article>
            @empty
                <div class="col">
                    <p class="text-secondary">{{ trim($search) !== '' ? 'No articles match that title.' : 'No articles available yet.' }}</p>
                </div>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $articles->links() }}
        </div>
</div>
