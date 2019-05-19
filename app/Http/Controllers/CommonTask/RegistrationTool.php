<?php

namespace App\Http\Controllers\CommonTask;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ExamTakerRegistration;
use Illuminate\Support\Facades\Mail;
use App\Organization\ExamTaker;

class RegistrationTool extends Controller
{
    public  static function Send_Email($email,$username,$password){
      Mail::to($email)->send(new ExamTakerRegistration($username,$password));   
     }

    public static function Resend_Email($username){
       $registered_user=ExamTaker::find($username);
       $user_username=$registered_user->username;
       $user_password=$registered_user->password;
       $email=$registered_user->email;
       $Resend_Email=Mail::to($email)->send(new ExamTakerRegistration($user_username,$user_password));

    }
}
