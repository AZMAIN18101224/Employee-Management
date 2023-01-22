<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $employees = Employee::where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->get();
        }
        else{
            $employees = Employee::paginate(5);
        }

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all);

        if ($request->image) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName, 'public');
        }

        // validate will check if all the parameters are valid or not (Validation)
        $data = $request->validate(([
            'name' => 'required|unique:employees|max:255',
            'position' => 'required|max:255',
            'email' => 'required|email|unique:employees|max:255',
            'phone' => 'required|unique:employees|max:255',
            'blood' => 'required',
            'image' => 'required'
        ]));

        $data = [
            'name' => $request->name,
            'position' => $request->position,
            'email' => $request->email,
            'phone' => $request->phone,
            'blood' => $request->blood,
            'image' => $path,
        ];
        // dd($data);

        Employee::create($data);
        return redirect('/employees/create')->with('message', 'Employee Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {

        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        if ($request->image) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName, 'public');
        } else {
            $path = $employee->image;
        }

        $data = [
            'name' => $request->name,
            'position' => $request->position,
            'email' => $request->email,
            'phone' => $request->phone,
            'blood' => $request->blood,
            'image' => $path,
        ];

        // $employee->update($data);
        Employee::where('id', $employee->id)->update($data);

        return redirect('/employees')->with('message', 'Information Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee) //route model binding
    {
        $employee->delete();

        return redirect('/employees')->with('message', 'Deleted Successfully!');
    }
}
