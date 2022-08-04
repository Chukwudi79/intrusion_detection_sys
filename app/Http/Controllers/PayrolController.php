<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Payrol;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\LoginmonitorController;

class PayrolController extends Controller
{
    public function __construct(UserController $userData, LoginmonitorController $monitor)
    {
        $this->middleware('auth');
        $this->user = $userData;
        $this->monitor = $monitor;
    }

    public function index()
    {
        $data['user'] = $this->user->userData();
        return view('admin.payrol', compact('data'));
    }

    public function create()
    {
        return view('admin.add-payroll');
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $payroll = new Payrol;
        $payroll->name = $request->name;
        $payroll->grade_level = $request->grade_level;
        $payroll->salary = $request->salary;
        $payroll->company_id = Auth::user()->company_id;
        $payroll->employment_date = $request->employment_date;
        $payroll->created_by = Auth::user()->email;
        $payroll->updated_by = null;
        $payroll->save();

        return  redirect()->back()->withSuccess('Staff Added');
    }


    public function update(Request $request, $id)
    {
        $monitor = [];
        $this->validator($request->all())->validate();
        $payroll = Payrol::find($id);
        $oldSalary = $payroll->salary;
        $payroll->name = $request->name;
        $payroll->grade_level = $request->grade_level;
        $payroll->salary = $request->salary;
        $payroll->company_id = Auth::user()->company_id;
        $payroll->employment_date = $request->employment_date;
        $payroll->created_by = Auth::user()->email;
        $payroll->updated_by = null;
        $payroll->save();

        
        if(((int) $oldSalary > (int) $request->salary) || ((int) $oldSalary < (int) $request->salary)){
           $monitor = $this->monitor->store($request, $payroll, 'alteration', $oldSalary);
        }

        return  redirect()->back()->withSuccess('Staff updated');
    }

    public function edit($id)
    {
        $staff = Payrol::find($id);
        return view('admin.edit-payroll', compact('staff'));
    }

    public function destroy($id)
    {
        Payrol::find($id)->delete();

        return redirect()->back()->with('Staff Deleted');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'grade_level' => ['required'],
            'salary' => ['required', 'string'],
            'employment_date' => ['required', 'string'],
        ]);
    }

}
