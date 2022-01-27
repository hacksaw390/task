<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $employees = Employee::orderBy('id', 'desc')->simplePaginate(10);
        $companies = Company::orderBy('id', 'desc')->get();
        return view('employee', compact('employees', 'companies'));
    }

    public function create()
    {
        $companies = Company::orderBy('id', 'desc')->get();
        return view('addEmployee', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'company' => 'required',
            'email' =>  ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => 'required',
            'password' => 'required',
        ]);

       $user_id = User::insertGetId([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => 2,
            'password' => Hash::make('password'),
        ]);

        Employee::create([
            'user_id' => $user_id,
            'company_id' => $request->company,

        ]);
        return back()->with('success', 'employee added!');
    }

    public function edit($id)
    {
        $employee = Employee::where('id',$id)->with('user','company')->first();
        return $employee;
    }

    public function update(Request $request)
    {
        
        
        $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'company' => 'required',
            'phone' => 'required',
        ]);

        $user_id = User::find($request->user_id)->update([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'phone' => $request->phone,
        ]);

        $data = Employee::where('id', $request->id)->first();
        $data->company_id = $request->company;
        $data->update();
        return $data;
    }
}
