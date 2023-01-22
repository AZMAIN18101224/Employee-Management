@extends('layouts.main')

@section('main-layout')
    <h1>All Employee</h1>

    @if (Session::has('message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div>
        <form action="" class="">
            <div class="form-group flex-nowrap">
                <input type="search" name="search" id="search" class="form-control" placeholder="Search by Name Or Email"/>
            </div>
            <button class="btn btn-transparent .btn-lg m-1"><i class="bi bi-search text-dark fw-bolder "></i></button>
            <a href={{url('/employees')}}>
                <button class="btn btn-transparent .btn-lg m-1" type="button"><i class="bi bi-arrow-clockwise text-dark fw-bolder"></i></button>
            </a>
        </form>
    </div>
    <div class="d-flex justify-content-center">
        <table class="table table-light table-striped">
            <thead>
                <tr class="">
                    <th scope="col">Serial</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Role/Department</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $i => $employee)
                    <tr>
                        <th scope="row">{{ $i + 1 }}</th>
                        <td>{{ $employee->name }}</td>
                        <td>
                            <div class="col-md-4">
                                <img class="card-img-top" src="/storage/{{ $employee->image }}" alt="..." style="max-width: 90px;">
                            </div>
                        </td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="/employees/{{ $employee->id }}" type="submit"
                                    class="btn btn-success btn-sm .pr-4"><i class="bi bi-info-circle"></i></a>

                                <a href="/employees/{{ $employee->id }}/edit" type="submit"
                                    class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>

                                <form method="post" action="{{ route('employees.destroy', $employee->id) }}"
                                    class="btn-group">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" />
                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination justify-content-center">
        {{$employees->links()}}
    </div>
@endsection
