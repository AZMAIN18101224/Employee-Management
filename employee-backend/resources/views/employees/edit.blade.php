@extends('layouts.main')

@section('main-layout')
    <h1>Edit Emplyee Information</h1>

    @if (Session::has('message'))
        <div class="alert alert-info alert-dismissible fade show" role="alert" id="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form method="post" action="/employees/{{ $employee->id }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input name="name" value="{{ $employee->name }}" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Position</label>
            <input name="position" value="{{ $employee->position }}" type="position" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" value="{{ $employee->email }}" type="email" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Phone Number</label>
            <input name="phone" value="{{ $employee->phone }}" type="number" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Blood Group</label>
            <input name="blood" value="{{ $employee->blood }}" type="string" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label class="form-label" for="customFile">Change Image</label>
            <input name="image" type="file" class="form-control" id="image" />
        </div>

        <button type="submit" class="btn btn-info">Update</button>
    </form>
@endsection
