@extends('layouts.template')

@section('title', 'Categories List')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>All Categories</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">Add New Category</a>
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
                    <th scope="col">Category Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Description</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>
                            {{ $category->name }}
                        </td>
                        <td>
                            {{ $category->slug }}
                        </td>
                        <td>{{ Str::limit($category->description, 50, ' ...') }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST"
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
                        <td colspan="7" class="text-center">No categories found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $categories->links() !!}
        </div>
    </div>
@endsection
