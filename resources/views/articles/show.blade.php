@extends('layouts.template')

@section('title', $article->title)

@section('content')
    <article class="blog-post my-4">
        <h1 class="display-5 fw-bold">{{ $article->title }}</h1>
        <p class="blog-post-meta">{{ $article->updated_at }}</p>
        @if ($article->image_url)
            <img src="{{ $article->image_url }}" class="rounded mx-auto d-block my-3">
        @endif
        <p>{{ $article->body }}</p>
    </article>
@endsection
