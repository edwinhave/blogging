@extends('layouts.template')

@section('title', 'Update Tag')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Update Tag</h1>
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
            <form action="{{ route('tags.update', $tag) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="name" class="form-label">Tag Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $tag->name) }}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection
