@extends('layouts.main')

@section('main-layout')
    <h1>Add New Employee</h1>

    <form method="post" action="/employees" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Position</label>
            <input name="position" type="position" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Phone Number</label>
            <input name="phone" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Blood Group:</label>
            <select name="blood" class="form-select" aria-label="Default select example">
                <option name="blood" value="A+">A+</option>
                <option name="blood" value="B+">B+</option>
                <option name="blood" value="A-">A-</option>
                <option name="blood" value="B-">B-</option>
                <option name="blood" value="AB">AB</option>
                <option name="blood" value="AB+">AB+</option>
                <option name="blood" value="O+">O+</option>
                <option name="blood" value="O-">O-</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="customFile">Upload Image</label>
            <input name="image" type="file" class="form-control" id="image" />
        </div>

        <button type="submit" class="btn btn-primary">ADD</button>
    </form>
@endsection
