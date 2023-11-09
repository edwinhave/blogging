@extends('layouts.template')

@section('title', 'Biodata')

@section('content')
    <div class="mt-4 p-5 bg-primary text-white rounded">
        <h1>Biodata</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success mt-4">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="my-4">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">{{ $user->name }}</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">{{ $user->email }}</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">{{ $user->phone_number ?? '-' }}</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Date of Birth</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">{{ $user->date_of_birth ?? '-' }}</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">{{ $biodata->address ?? '-' }}</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Website</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">{{ $biodata->website ?? '-' }}</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Instagram</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">{{ $biodata->instagram ?? '-' }}</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">About Me</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">{{ $biodata->about_me ?? '-' }}</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <a class="btn btn-secondary " href="{{ route('biodata.edit') }}">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
