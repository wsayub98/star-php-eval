@extends('layouts.app')

@section('title', 'Latest stories | Football Articles')

@section('content')
    <main id="main-content" class="container publication">
        <header class="publication-header">
            <p class="publication-name">STAR EVAL <span class="publication-section">/ Football</span></p>
            <h1 class="publication-title">Latest stories</h1>
        </header>

        <livewire:article-list />
    </main>
@endsection
