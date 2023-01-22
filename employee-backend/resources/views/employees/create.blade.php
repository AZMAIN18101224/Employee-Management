@extends('layouts.main')

@section('main-layout')
    <h1>Add New Employee</h1>

    @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form method="post" action="/employees" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input value="{{ old('name') }}" name="name" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            @error('name')
                <div class="invalid-feedback d-block" role='alert'>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Position</label>
            <input value="{{ old('position') }}" name="position" type="position" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('position')
                <div class="invalid-feedback d-block" role='alert'>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input value="{{ old('email') }}" name="email" type="email" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            @error('email')
                <div class="invalid-feedback d-block" role='alert'>{{ "$message" }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Phone Number</label>
            <input value="{{ old('phone') }}" name="phone" type="number" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            @error('phone')
                <div class="invalid-feedback d-block" role='alert'>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Blood Group:</label>
            <select name="blood" value="{{ old('blood') }}" class="form-select" aria-label="Default select example">
                <option name="blood" value="A+">A+</option>
                <option name="blood" value="B+">B+</option>
                <option name="blood" value="A-">A-</option>
                <option name="blood" value="B-">B-</option>
                <option name="blood" value="AB">AB</option>
                <option name="blood" value="O+">O+</option>
                <option name="blood" value="O-">O-</option>
            </select>
            @error('blood')
                <div class="invalid-feedback d-block" role='alert'>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="customFile">Upload Image</label>
            <input name="image" value="{{ old('image') }}" type="file" class="form-control" id="image" />
            @error('image')
                <div class="invalid-feedback d-block" role='alert'>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">ADD</button>
    </form>
@endsection
