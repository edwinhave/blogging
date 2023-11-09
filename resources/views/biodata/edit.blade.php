@extends('layouts.template')

@section('title', 'Biodata')

@section('content')
    <div class="mt-4 p-5 bg-primary text-white rounded">
        <h1>Update Biodata</h1>
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

    <div class="my-4">
        <div class="card mb-3">
            <div class="card-body">
                <form action="{{ route('biodata.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $user->name) }}">
                    </div>
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                            value="{{ old('email', $user->email) }}">
                    </div>
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                            value="{{ old('phone_number', $user->phone_number) }}">
                    </div>
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                            value="{{ old('date_of_birth', $user->date_of_birth) }}">
                    </div>
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ old('address', $biodata->address) }}">
                    </div>
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="website" class="form-label">Website</label>
                        <input type="text" class="form-control" id="website" name="website"
                            value="{{ old('website', $biodata->website) }}">
                    </div>
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="text" class="form-control" id="instagram" name="instagram"
                            value="{{ old('instagram', $biodata->instagram) }}">
                    </div>
                    <div class="mb-3 col-md-6 col-sm-12">
                        <label for="about_me" class="form-label">About Me</label>
                        <textarea class="form-control" rows="10" name="about_me">{{ old('about_me', $biodata->about_me) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
