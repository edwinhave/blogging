@extends('layouts.template')

@section('title', 'Landing Page')

@section('content')
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 fst-italic">{{ $featured->title }}</h1>
            <p class="lead my-3">{{ Str::limit($featured->body, 50, ' ...') }}</p>
            <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
        </div>
    </div>

    {{-- Articles Card --}}
    <div class="row mb-2">
        @forelse ($articles as $article)
            <x-article-card :article="$article" />
        @empty
            <div class="col-md-12">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h2 class="card-text mb-auto">No articles found.</h2>
                    </div>
                </div>
            </div>
    </div>
    @endforelse

    <x-text-field />
    <br>
    {{ $articles->links() }}
    </div>
@endsection
