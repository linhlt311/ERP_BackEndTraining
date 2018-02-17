<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest;
use App\Employee;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('updated_at','desc')->paginate(config('app.user_pagination'));
        $data = [
            'employees' => $employees,
        ];
        return view('admin.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('img')) {
            $imgLink = $request->file('img')->store('public/images');
            $imgLink = substr($imgLink, 7);
            $data["image"] = $imgLink;
        }
        Employee::create($data);
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        $data = [
            'employee' => $employee,
        ];
        return view('admin.users.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $data = [
            'employee' => $employee,
        ];
        return view('admin.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data = array_slice($data, 2);
        Employee::where('id',$id)->update($data);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Delete success'
        ]);
    }

    public function updateImage(Request $request, $id) {
        $array = $request->all();
        if (!$request->hasFile('img')) {
            return redirect()->route('user.show', [
                'id' => $id,
            ]);
        }
        $imgLink = $request->file('img')->store('public/images');
        $imgLink = substr($imgLink, 7);
        $data["image"] = $imgLink;
        Employee::find($id)->update($data);
        return redirect()->route('user.show', [
            'id' => $id,
        ]);
    }
}
