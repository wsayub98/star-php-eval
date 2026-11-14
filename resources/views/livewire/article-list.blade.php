<div>
    <div class="row mb-4">
        <div class="col-md-6 col-lg-4">
            <label for="article-search" class="form-label">Search by title</label>
            <input id="article-search" type="search" class="form-control"
                placeholder="Search articles..." wire:model.live.debounce.300ms="search">
        </div>
    </div>
    <p class="small text-secondary" wire:loading wire:target="search" role="status">Searching...</p>

        <div class="row g-4">
            @forelse ($articles as $article)
                <div class="col-md-6 col-lg-4" wire:key="article-{{ $article->id }}">
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
                    <p class="text-secondary">{{ trim($search) !== '' ? 'No articles match that title.' : 'No articles available yet.' }}</p>
                </div>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $articles->links() }}
        </div>
</div>
