@extends('layouts.template')

@section('title', 'Edit Article')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Edit Article</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row my-5">
        <div class="col-12 px-5">
            <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="{{ old('title', $article->title) }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="image" class="form-label">Image</label>
                    <input class="form-control" type="file" id="image" name="image">
                    @if ($article->image)
                        <img src="{{ $article->image_url }}" class="mt-3" style="max-width: 400px;">
                    @endif
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="body" class="form-label">Body</label>
                    <textarea class="form-control" rows="10" name="body">{{ old('body',$article->body) }}</textarea>
                </div>
                <div class="form-check form-switch mb-3">
                    <label class="form-check-label" for="is_published">Publish?</label>
                    <input class="form-check-input" type="checkbox" id="is_published" name="is_published" {{ $article->published_at != null ? 'checked' : '' }}>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection
