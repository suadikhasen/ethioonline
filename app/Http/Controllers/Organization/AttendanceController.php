<?php

namespace App\Http\Controllers\Organization;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Organization\ExamTaker;
use App\Http\Controllers\CommonTask\AvailabilityController;
use App\Organization\Attend;

class AttendanceController extends Controller
{  
   public $exam_code;

   public function __construct(){
   	  $this->middleware('auth');

   }



    

   // tick attendance for exam taker
    public function make_attended(Request $request,$username){
    	$exam_code = AvailabilityController::Exam_Code();
    	$attend_exam_taker = ExamTaker::where([
    		['exam_code','=',$exam_code],
    		['username','=',$username]
    	])->update(['attendance'=>true]);

    	

    	if ($attend_exam_taker) {
    		 return redirect()->route('Organization.Registration');
    	}

    	else{
    		return redirect()->route('Organization.Registration')->with('database_error','Something Went Wrong');
    	}



    }

    public function Remove_Attendance(Request $request,$username){
      $exam_code = AvailabilityController::Exam_Code();
      $attend_exam_taker = ExamTaker::where([
        ['exam_code','=',$exam_code],
        ['username','=',$username]
      ])->update(['attendance'=>false]);

      

      if ($attend_exam_taker) {
         return redirect()->route('Organization.Registration');
      }

      else{
        return redirect()->route('Organization.Registration')->with('database_error','Something Went Wrong');
      }

    }
}
