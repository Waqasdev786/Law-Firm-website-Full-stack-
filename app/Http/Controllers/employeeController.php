<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;

class employeeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email'    => 'required|email|unique:employee,email',
            'password' => 'required|min:6',
        ]);

        employee::create([
            'username' => $request->username,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/')->with('success', 'Data successfully submitted!');
    }

    public function index()
    {
        $employees = employee::all();
        return view('employee.index', compact('employees'));
    }

    public function edit($id)
    {
        $employee = employee::findOrFail($id);
        return view('employee.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email'    => 'required|email|unique:employee,email,' . $id,
        ]);

        $employee = employee::findOrFail($id);
        $employee->username = $request->username;
        $employee->email    = $request->email;

        if ($request->password) {
            $employee->password = bcrypt($request->password);
        }

        $employee->save();
        return redirect('/admin')->with('success', 'Record updated!');
    }

    public function destroy($id)
    {
        $employee = employee::findOrFail($id);
        $employee->delete();
        return redirect('/admin')->with('success', 'Record deleted!');
    }
}