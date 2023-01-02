<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\employee;
use Hamcrest\Arrays\IsArray;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = [
            '1' => 'Admin',
            '2' => 'Hr',
            '3' => 'Team Leader',
            '4' => 'Users',
            '5' => 'Intern',
        ];
        $employees = User::where('role_as', '!=', '1')->paginate(5);

        return view('admin.employee.index', ['employees' => $employees, 'role' => $role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(employee $request)
    {
        dd($request);
        //    $request->validate();
        $employee = User::create($request->all());
        return view('admin.employee.index')->with('Employee Are Add!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $employees = User::where('id', $id)->first();
        // dd($employees);
        return view('admin.employee.show')->with('employee', $employees);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employees = User::where('id', $id)->first();
        return view('admin.employee.edit', ['employees' => $employees]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(employee $request, $id)
    {
        $employees = User::find($id);
        $employees->first_name = $request->first_name;
        $employees->last_name = $request->last_name;
        $employees->role_as = $request->role_as;
        $employees->contact = $request->contact;
        $employees->alt_contact = $request->alt_contact;
        $employees->email = $request->email;
        $employees->gender = $request->gender;
        $employees->address = $request->address;
        $employees->salary = $request->salary;
        $employees->dob = $request->dob;

        //profile image update
        if ($request->profile_pic != null) {

            //delate alrady exist image
            // Storage::disk('public')->delete('profiles/'.$employees->profile_pic);

            //store image
            // $path = Storage::putFile('profiles_pic', $request->file('profile_pic'));

            $imageName = time().'.'.$request->profile_pic->getClientOriginalExtension();
            $request->profile_pic->move(public_path('profiles_pic'), $imageName);
            $employees->profile_pic = $imageName;
        } else {
            $employees->profile_pic = $request->old_imgage;
        }
        $employees->save();
        return redirect('adminpanal/employees')->with('success', 'Employee Profile Has Beed Changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $employees = User::find($id)->delete();
        if ($employees) {
            return redirect()->route('employees.index')->with('message', 'Employes Has Beed Deleted. ' . '#' . $id);
        }
    }
}
