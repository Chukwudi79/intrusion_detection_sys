<?php
namespace App\Mailer;

use Auth;
use App\Models\User;
use PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ConfigPhpmailer 
{
    public function __construct()
    {
        // $this->sendMail();
    }

    public function sendMail($req = null, $type)
    {

        $admin = $this->getCyberAdminer($req);
        $messageTemplate = ($type != 'intrusion') ? "an altration was dictated for this employee ({$req->name}) account" : "intrusion was dictated on this user ({$req->email}) account";
        $message = "This mail is to notify you that {$messageTemplate}";

        try{
            $mail = new \PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP();  // telling the class to use SMTP
            $mail->SMTPDebug = 2;
            $mail->Mailer = "smtp";
            $mail->Host = "mail.dsparklelinks.com.ng";
            $mail->Port = 26;
            $mail->SMTPAuth = true; // turn on SMTP authentication
            $mail->Username = "hello@dsparklelinks.com.ng"; // SMTP username
            $mail->Password = "95t_ek^g5Sy5"; // SMTP password
            $mail->Priority = 1;
            // $mail->AddAddress($admin->email, $admin->name);
            $mail->AddAddress('okoriechukwudi4@gmail.com', $admin->name);
            $mail->SetFrom('hello@dsparklelinks.com.ng', 'Intrusion System');
            // $mail->AddReplyTo($visitor_email,$name);
            $mail->Subject  = $type == 'intrusion' ? "Intrusion Alert" : 'Altration Alert';
            $mail->Body     = $message;
            if ($mail->Send()) {
                return 'Email Sent Successfully';
            } else {
                return 'Failed to Send Email';
            }
        } catch (\PHPMailer\PHPMailer\Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }    

    private function getCyberAdminer($req)
    {
        $userEmail = Auth::check() ? Auth::user()->email : $req->email;
        $user = User::whereEmail($userEmail)->first();
        $adminUser = User::whereCompanyId($user->company_id)->whereRoleId(1)->first();

        return $adminUser;
    }

}