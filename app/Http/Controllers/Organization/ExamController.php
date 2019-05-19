<?php

namespace App\Http\Controllers\Organization;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Organization\Exam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\CommonTask\QuestionFetchingController;

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

    	if($check_progress_existence!=NULL){
    		$questions=QuestionFetchingController::Fetch_Question();
            return view('organization.exam_home')->with(['exam_available'=>$exam_available,'questions'=>$questions]);
    	}

    	else{

    		return view('organization.exam_home')->with(['exam_unavailable'=>$exam_unavailable]);
    	}

    	
    }


}
