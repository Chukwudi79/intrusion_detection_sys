<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Loginmonitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserController $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['intruders'] = $this->countIntrusions();
        $data['alterators'] = $this->countAlterations();
        $data['user'] = $this->user->userData();
        $data['users'] = $this->users();
        $data['companies'] = Company::all();
        return view('admin.dashboard', compact('data'));
    }

    private function countIntrusions()
    {
        $companyId = Auth::user()->company_id; 
        return Loginmonitor::whereLogType('intrusion')->whereCompanyId($companyId)->count();
    }

    private function countAlterations()
    {
        $companyId = Auth::user()->company_id; 
        return Loginmonitor::whereLogType('alteration')->whereCompanyId($companyId)->count();
    }

    private function users()
    {
        $companyId = Auth::user()->company_id; 
        return User::whereCompanyId($companyId)->whereNotIn('role_id', [3])->paginate(5);
    }

}
