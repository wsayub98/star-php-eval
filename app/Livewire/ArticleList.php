<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleList extends Component
{
    use WithPagination;

    public string $search = '';

    protected $paginationTheme = 'bootstrap';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function render(): View
    {
        $search = trim($this->search);

        $articles = Article::with('category')
            ->when($search !== '', fn ($query) => $query->whereLike('title', '%'.$search.'%'))
            ->latest()
            ->orderByDesc('id')
            ->paginate(12);

        return view('livewire.article-list', ['articles' => $articles]);
    }
}
