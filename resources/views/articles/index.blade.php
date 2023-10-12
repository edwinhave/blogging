@extends('layouts.template')

@section('title', 'Articles List')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>All Articles</h1>
    </div>



    <div class="container mt-5">
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Body</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($articles as $article)
                    <tr>
                        <td>
                        <th scope="row">{{ $article->id }}</th>
                        <a href="{{ route('articles.show', $article) }}">
                            {{ $article->title }}
                        </a></td>
                        <td>{{ Str::limit($article->body, 50, ' ...') }}</td>
                        <td>{{ $article->created_at }}</td>
                        <td>{{ $article->updated_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No articles found.</td>
                    </tr>
                @endforelse
            </tbody>
            <div class="d-flex justify-content-center">
                {!! $articles->links() !!}
            </div>
        </table>
    </div>
@endsection
