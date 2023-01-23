@extends('layouts.main')

@section('main-layout')
    <h1>Employee List</h1>

    @if (Session::has('message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div>
        <form action="" class="">
            <div class="form-group flex-nowrap">
                <input type="search" value="{{ request()->get('search') }}" name="search" id="search"
                    class="form-control" placeholder="Search by Name Or Email" />
            </div>
            <div>
                <button class="btn btn-transparent .btn-lg m-1"><i class="bi bi-search text-dark""></i></button>
                <a href={{ url('/employees') }}>
                    <button class="btn btn-transparent .btn-lg m-1" type="button"><i
                            class="bi bi-arrow-clockwise text-dark fw-bolder"></i></button>
                </a>
            </div>
        </form>
    </div>
    <div class="d-flex justify-content-center">
        <table class="table table-light table-striped border border-1 border-light">
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
                @forelse ($employees as $i => $employee)
                    <tr>
                        <th scope="row">{{ $i + 1 }}</th>
                        <td>{{ $employee->name }}</td>
                        <td>
                            <div class="col-md-4">
                                <img class="card-img-top" src="/storage/{{ $employee->image }}" alt="..."
                                    style="max-width: 90px;">
                            </div>
                        </td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="/employees/{{ $employee->id }}" type="submit" class="btn btn-dark btn-lr .pr-4"><i
                                        class="bi bi-info-circle" style="color: rgb(255, 255, 255)"></i></a>

                                <a href="/employees/{{ $employee->id }}/edit" type="submit" class="btn btn-dark btn-lr"><i
                                        class="bi bi-pencil-square" style="color: rgb(255, 255, 255)"></i></a>

                                <form method="post" action="{{ route('employees.destroy', $employee->id) }}"
                                    class="btn-group">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" />
                                    <button class="btn btn-dark btn-lr"><i class="bi bi-trash3"
                                            style="color: red"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <div>
                        <tr>
                            <td scope="col">No result found!</td>
                        </tr>
                    </div>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="pagination justify-content-center">
        {{ $employees->links() }}
    </div>
@endsection
