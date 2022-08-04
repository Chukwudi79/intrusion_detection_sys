<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Awareness;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'company_name' => ['required','string'],
            'company_email' => ['required','string', 'email', 'max:255', 'unique:companies'],
            'description' => ['required','string'],
            'company_phone' => ['required','string'],
        ]);
    }

    public function home()
    {
        $awareness = Awareness::get();
        return view('welcome', compact('awareness'));
    }

    public function index()
    {
        $companies = Company::all();
        return view('admin.companies', compact('companies'));
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $company = new Company;

        $company->name = $request->company_name;
        $company->company_email = $request->company_email;
        $company->phone = $request->company_phone;
        $company->description = $request->description;
        $company->created_by = $request->email;
        $company->save();

        return $company;
    }

    public function destroy($id)
    {
        Company::find($id)->delete();
        return redirect()->back()->withSuccess('Company Deleted');
    }
}
