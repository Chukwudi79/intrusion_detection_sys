<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth\RegisterController;

class UserController extends Controller
{
    public function __construct(RegisterController $adminRegister)
    {
        $this->adminRegister = $adminRegister;
    }

    public function index()
    {
        $data['users'] = User::whereCompanyId(Auth::user()->company_id)
                                        ->whereNotIn('role_id', [3])
                                        ->with('role')
                                        ->get();
        return view('admin.users', compact('data'));
    }

    public function userData()
    {
        return User::with(['staffs', 'company'])->whereId(Auth::user()->id)->first();
    }

    public function create()
    {
        $roles = Role::whereNotIn('id', [3])->get();

        return view('admin.add-user', compact('roles'));
    }

    public function store(Request $request)
    {
        return $this->adminRegister->register($request);
    }

    public function edit($user)
    {
        $roles = Role::whereNotIn('id', [3])->get();
        $user = User::find($user);
        return view('admin.edit-user', compact(['roles', 'user']));
    }

    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->has('password')){
            $user->login_attempt = 0;
            $user->login_status = 0;
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return  redirect()->back()->withSuccess('User Updated');
    }
 
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->back()->withSuccess('User deleted');
    }
}
