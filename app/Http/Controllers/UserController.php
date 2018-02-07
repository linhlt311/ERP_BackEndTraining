<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class UserController extends Controller
{
    public function show() {
        $employee = Employee::get();
        dd($employee);
        return view('admin.users.show', $employee);
    }

    public function create() {
        return view('admin.users.create');
    }

    public function add(Request $request) {
        $data = $request->all();
        $data = array_slice($data, 2);
        Employee::insert($data);
        return redirect()->route('show-employee');
    }
}
