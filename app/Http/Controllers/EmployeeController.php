<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('id', 'desc')->paginate(5);
        $company = Company::all();
        return view('employees.index', compact('employees', 'company'));
    }
    public function create(Company $company)
    {
        $company = Company::all();
        return view('employees.create')->with('companies', $company);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|between:9,11'
        ]);

        $employee = new Employee;
        $employee->fill($request->all());
        $employee->company_id = $request->input('company_id');
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->save();
        return redirect()->back()->with('status', 'Employee Added Successfully');
    }

    public function show(Company $company, Employee $employee)
    {
        $employees = $employee::paginate(5);
        return view('employees', compact('employees'));
    }

    public function edit(Company $company, Employee $employee)
    {
        $companies = $company->all()->sortBy('name');
        return view('employees.edit', compact('employee', 'companies'));
        // $employee = Employee::all();
        // return view('employees.edit')->with('employees', $employee);
    }


    public function update(Request $request,$id)
    {

        $Employee = Employee::find($id);
        $input = $request->all();
        $Employee->update($input);
        return redirect('employees')->with('status', 'Employee Updated!');
        //$employee->update($request->validated());

        // return redirect()->route('employees.index')
        //     ->with('success', 'Employee successfully updated!');
    }
    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect('employees')->with('flash_message', 'Employee deleted!');
    }
}
