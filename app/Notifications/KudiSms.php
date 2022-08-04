<?php
namespace App\Notifications;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class KudiSms
{
    public function __construct()
    {
        // $this->send();
    }

    public function send($req = null, $type = null)
    {
        $admin = $this->getCyberAdminer($req);
        $phone = '234' . substr($admin->phone, 1, 11);
        $username = 'flawless';
        $password = 'gbogo251coma153';
        $sender = 'Tour Guide';
        $mobiles = $phone; //$admin->phone; //'234009133807007';
        $msgTemplate = ($type == "intrusion") 
        ? "Intrusion Alert! Multiple login attempt was noticed from this user ({$req->email})" 
        : "Alteration Alert! Altration was dictated for this employee ({$req->name}) account";
        
        $url = "https://account.kudisms.net/api/?username={$username}&password={$password}&message={$msgTemplate}&sender={$sender}&mobiles={$mobiles}";

        $response = Http::get($url);

        return $response;

    }

    private function getCyberAdminer($req)
    {
        $userEmail = Auth::check() ? Auth::user()->email : $req->email;
        $user = User::whereEmail($userEmail)->first();
        $adminUser = User::whereCompanyId($user->company_id)->whereRoleId(1)->first();

        return $adminUser;
    }
}