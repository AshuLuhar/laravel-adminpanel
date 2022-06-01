<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['companies'] = Company::orderBy('id', 'desc')->paginate(5);
        return view('companies.index', $data);


        // $companies = Company::all()->paginate(5);
        // return view('companies.index', compact('companies'));
        // $data['companies'] = Company::orderBy('id', 'desc')->paginate(5);
        // return view('company', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'logo' => 'required|mimes:jpeg,jpg,png,gif|dimensions:max_width=600,max_height=600'
        ]);

        $company = new Company;
        $company->fill($request->all());
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->logo  = request()->file('logo')->store('logo');
        $company->website = $request->input('website');
        $company->save();
        return redirect()->back()->with('status', 'Company Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {

        $companies = $company;
        return view('companies', compact('companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $companies = $company->all();
        return view('companies.edit', compact('company'));
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
        $company = Company::find($id);
        $storagePath = Storage::disk('public')->put('logo', $request->logo);
        $storageName = basename($storagePath);
        $validatedData =  [
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $storageName,
            'website' => $request->website
        ];
        $company->update($validatedData);
        return redirect('companies')->with('status', 'Company Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::destroy($id);
        return redirect('companies')->with('flash_message', 'Company deleted!');
    }
}
