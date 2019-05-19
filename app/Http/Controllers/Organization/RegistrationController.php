<?php

namespace App\Http\Controllers\Organization;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Organization\ExamTaker;
use Illuminate\Support\Str;
use App\Http\Controllers\CommonTask\AvailabilityController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ExamTakerRegistration;
use App\Http\Controllers\CommonTask\RegistrationTool;

class RegistrationController extends Controller
{   
   public function __construct(){
    	$this->middleware('exam_created');
    }
   

    public function Registration(){
    	$exam_available=1;
        $exam_code=AvailabilityController::Exam_Code();
        $registered_user=ExamTaker::where('exam_code','=',$exam_code)->paginate(3);
        $count_registered_user=1;
    	return view('organization.registration',['exam_available'=>$exam_available,'registered_user'=>$registered_user,'count'=>$count_registered_user]);
    }
    
    public function Show_Registration_Form(){
    	$exam_available=1;
    	return view('organization.show_registration_form',['exam_available'=>$exam_available]);
    }


    public function Register(Request $request){

       $request->validate([
        'email'=>'required|email',
        'first_name'=>'required|string',
        'last_name'=>'required|string',
        'grand_name'=>'required|string',
        'gender'=>'required|string',
       ]);

       $exam_code=AvailabilityController::Exam_Code();

       $check_re_registration=ExamTaker::where([
        ['email','=',$request['email'] ],
        ['exam_code','=',$exam_code],

      ])->first();
     
       if ($check_re_registration!=NULL) {
            return redirect()->route('Organization.Show_Registration_Form')->with('double_registration','the email already exist or reregistration is prohibited');
       }

       $first_name=$request['first_name'];
       $last_name=$request['last_name'];
       $grand_name=$request['grand_name'];

       $gender=$request['gender'];
       $email=$request['email'];
       

       //username  generation

       $username=Str::random(6);
       
       $check_existence_of_username=ExamTaker::where('username',$username)->first();
       if ($check_existence_of_username!=NULL) {
           $this->Register();
       }
       
       //password generation
       $password=Str::random(6);
       
       //starting registration 

       $registration=new ExamTaker();
       $registration->first_name=$first_name;
       $registration->last_name=$last_name;
       $registration->grand_name=$grand_name;
       $registration->gender=$gender;
       $registration->exam_code=$exam_code;
       $registration->username=$username;
       $registration->password=Hash::make($password);
       $registration->email=$email;


       $save_registration=$registration->save();

       if ($save_registration) {
           RegistrationTool::Send_Email($email,$username,$password);
           return redirect()->route('Organization.Show_Registration_Form')->with('mail_success','registered successfully we send username and password successfully');
       }
       


    }


    public function Resend_Email($username){
        $Resend_Email = RegistrationTool::Resend_Email($username);
        
            return redirect()->route('Organization.Registration')->with('mail_resend_success','We Resend Username and Password');
        

        
    }
}
