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

        <livewire:article-list />
    </main>
@endsection
