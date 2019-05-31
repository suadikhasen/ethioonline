<?php

namespace App\Http\Controllers\Organization;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Organization\Exam;
use App\Organization\ExamTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\CommonTask\QuestionFetchingController;
use App\Http\Controllers\CommonTask\AvailabilityController;

class ExamController extends Controller
{   
	// show exam creation form
    public function Show_Create_Exam_Form(){
    	
    	return view('organization.creating_exam_form');

    }


    //Create Exam
    public function Create_Exam(Request $request){
      
       //validate the request
       $request->validate([
        'exam_name'=>'required|min:8',
        'no_days'=>'required|gt:0|integer',
       ]);
       
       $exam_name=$request['exam_name'];
       $length_of_day=$request['no_days'];
       $current_time=Carbon::now();
       $ended_at=$current_time->addDays($length_of_day);
       $email=Auth::user()->email;

       $check_exam_name=Exam::where([

       	['exam_owner','=',$email],
       	['exam_name','=',$exam_name],

       ])->first();
       
       $check_progress_existence=Exam::where([
        ['exam_owner','=',$email,],
        ['progress','=',true],

       ])->first();

       //check existence of exam name
       if($check_exam_name!=NULL){
       	 return back()->with('checkerror','The Exam Name Already Exist In Your Previous Exams Please Change Your Exam Name');
       }
       //check existence of progressed exam
       else if($check_progress_existence!=NULL){
          return back()->with('checkerror',' You Cant Create Exam because There Is an Exam In Progress');
       }

       $exam_code=Str::random(10);
       $exam_code_checking=Exam::find($exam_code);

       if($exam_code_checking!=NULL){
          Create_Exam();
       }

       $Create_Exam = new Exam();
       $Create_Exam->exam_code=$exam_code;
       $Create_Exam->exam_name=$exam_name;
       $Create_Exam->exam_owner=$email;
       $Create_Exam->ended_at=$ended_at;
       $save=$Create_Exam->save();
       


       if($save){
       	return redirect()->route('Organization.Exam_Home')->with('exam_success','Exam Created Successfully');
       }

       else {
       	 return back();
       }
    }


    public function Exam_Home(){

      $email=Auth::user()->email;
    	$check_progress_existence=Exam::where([
        ['exam_owner','=',$email,],
        ['progress','=',true]

       ])->first();

    	$exam_available=1;
    	$exam_unavailable=0;
      $exam_code = AvailabilityController::Exam_Code();

    	if($check_progress_existence!=NULL){
    		$questions=QuestionFetchingController::Fetch_Question($exam_code);
            return view('organization.exam_home')->with(['exam_available'=>$exam_available,'questions'=>$questions]);
    	}

    	else{

    		return view('organization.exam_home')->with(['exam_unavailable'=>$exam_unavailable]);
    	}

    	
    }

    public function Show_Start_Exam_Form(){
       $exam_available=1;
       return view('organization.show_start_exam_form',['exam_available'=>$exam_available]);
    }
   
   //function for exam time starting
    public function Start_Exam(Request $request){
       $request->validate([
        'waiting_time'=>'required|integer|gt:0',
        'exam_time_in_hour'=>'required|integer|gte:0',
        'exam_time_in_minute'=>'required|integer|gte:0',
       ]);


       $exam_code=AvailabilityController::Exam_Code();
       $waiting_time=$request['waiting_time'];
       $exam_time_in_hour=$request['exam_time_in_hour'];
       $exam_time_in_minute=$request['exam_time_in_minute'];
       

       $now =  Carbon::now()->toImmutable();
       $add_exam_time = new ExamTime();
       $add_exam_time->exam_code=$exam_code;
       $add_exam_time->pre_begining =$now;
       
       // asigning variable to begning time
       $begning_time=$now->addMinutes($waiting_time);

       //add values of time to database
       $add_exam_time->begning=$begning_time;

       
       $time_ending_hour=$begning_time->addHours($exam_time_in_hour);
       $time_ending_minute_hour=$time_ending_hour->addMinutes($exam_time_in_minute);

       $add_exam_time->ending=$time_ending_minute_hour;

       $save_exam = $add_exam_time->save();

       if ($save_exam) {
         $exam_available=1;
         return redirect()->route('Organization.Exam_Home');
          
       }

       


       
    }


}
