@extends('layouts.template')

@section('title', 'Tags List')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>All Tags</h1>
        <a href="{{ route('tags.create') }}" class="btn btn-primary btn-sm">Add New Tag</a>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success mt-4">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="container mt-2">
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">Tag Name</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tags as $tag)
                    <tr>
                        <th scope="row">{{ $tag->id }}</th>
                        <td>
                            {{ $tag->name }}
                        </td>
                        <td>{{ $tag->created_at }}</td>
                        <td>{{ $tag->updated_at }}</td>
                        <td>
                            <a href="{{ route('tags.edit', $tag) }}" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                            <form action="{{ route('tags.destroy', $tag) }}" method="POST"
                                class="d-inline-block">
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
                        <td colspan="7" class="text-center">No tags found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $tags->links() !!}
        </div>
    </div>
@endsection
