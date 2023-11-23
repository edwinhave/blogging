@extends('layouts.template')

@section('title', 'Articles List')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>All Articles</h1>

        <a href="{{ route('articles.create') }}" class="btn btn-primary btn-sm">Add New Category</a>
    </div>
    @if (session()->has('success'))
        <x-alert type="success" class="mt-4">
            {{ session()->get('success') }}
        </x-alert>
        {{-- <div class="alert alert-success mt-4">
            {{ session()->get('success') }}
        </div> --}}
    @endif


    <div class="container mt-5">
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Body</th>
                    <th scope="col">Category</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($articles as $article)
                    <tr>
                        <th scope="row">{{ $article->id }}</th>
                        <td><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></td>
                        <td>{{ Str::limit($article->body, 50, ' ...') }}</td>
                        <td>{{ $article->category->name ?? '...' }}</td>
                        <td>{{ $article->created_at }}</td>
                        <td>{{ $article->updated_at }}</td>
                        <td>
                            @foreach ($article->tags as $tag)
                                <span class="badge bg-primary">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('articles.edit', $article) }}" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                            <form action="{{ route('articles.destroy', $article) }}" method="POST" class="d-inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No articles found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {!! $articles->links() !!}
        </div>
    </div>

@endsection
