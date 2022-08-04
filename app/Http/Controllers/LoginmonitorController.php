<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Loginmonitor;
use Illuminate\Http\Request;
use App\Notifications\KudiSms;
use App\Mailer\ConfigPhpmailer;
use App\Http\Controllers\UserController;

class LoginmonitorController extends Controller
{
    public function __construct(UserController $userData, ConfigPhpmailer $mail, KudiSms $sms)
    {
        $this->middleware('auth');
        $this->user = $userData;
        $this->mail = $mail;
        $this->sms = $sms;
    }

    public function index()
    {
        $data['intruders'] = $this->intruders();
        $data['user'] =  $this->user->userData();
        return view('admin.intruders', compact('data'));
    }

    public function intruders()
    {
        return Loginmonitor::whereCompanyId(Auth::user()->company_id)->with('user')->get();
    }

    public function store($request, $user, $type, $oldSalary = null)
    {
        $alert = new Loginmonitor;
        $alert->user_id = Auth::user()->id;
        $alert->log_attempt = null;
        $alert->type = ($type == 'alteration') ? $this->altrationType($request, $user, $type, $oldSalary) : null;
        $alert->log_type = ($type == 'alteration') ? 'alteration' : 'intrusion';
        $alert->ip_address = request()->ip();
        $alert->company_id = Auth::user()->company_id;
        $alert->device_type = request()->header('user-agent');
        $alert->browser_type = request()->header('user-agent');
        $alert->state = null;
        $alert->save();
        
        $sms = $this->sms->send($request, 'alteration');
        $sendmail = $this->mail->sendMail($request, 'alteration');
        // print_r($sendmail);

        return true;
    }

    private function altrationType($request, $user, $type, $oldSalary = false)
    {
        if($type == 'alteration'){
            return "ALTERATION! The salary of {$user->name} was changed from $oldSalary to $request->salary";
        }
    }

}
