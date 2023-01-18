@extends('layouts.main')

@section('main-layout')
    <h1>Employee Details</h1>

    <div class="d-flex justify-content-center mt-5">
        <div class="card mb-3" style="max-width: 740px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img class="card-img-top" src="/storage/{{ $employee->image }}" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                    <div scope="row">Serial: {{ $employee->id }}</div><br>
                    <div>Name: {{ $employee->name }}</div><br>
                    <div>Position: {{ $employee->position }}</div><br>
                    <div>Email: {{ $employee->email }}</div><br>
                    <div>Phone: {{ $employee->phone }}</div><br>
                    <div>Blood Group: {{ $employee->blood }}</td><br>
                </div>
              </div>
            </div>
          </div>
    </div>
    <div class="position-relative">
        <div class="position-absolute top-100 end-0">
            <a href="/employees/{{ $employee->id }}/edit" type="submit"
                class="btn btn-primary btn-sm">Edit</a>
        </div>
    </div>
@endsection


