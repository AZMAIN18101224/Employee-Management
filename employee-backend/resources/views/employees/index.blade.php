@extends('layouts.main')

@section('main-layout')
    <h1>All Employee</h1>

    <div class="d-flex justify-content-center">
        <table class="table table-light table-striped">
            <thead>
                <tr class="">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $i=>$employee)
                    <tr>
                        <th scope="row">{{ $i + 1 }}</th>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>

                        <td>
                            <div class="btn-group">
                                <a href="/employees/{{ $employee->id }}" type="submit"
                                    class="btn btn-success btn-sm .pr-4">Show Details</a>

                                <a href="/employees/{{ $employee->id }}/edit" type="submit"
                                    class="btn btn-primary btn-sm">Edit</a>

                                <form method="post" action="{{ route('employees.destroy', $employee->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden"/>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
