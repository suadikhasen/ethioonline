<?php
namespace  App\Service;
use App\Http\Controllers\CommonTask\AvailabilityController;
use App\Organization\ExamTaker;
use Auth;



class Attendance_Evaluate 
{
	
	public static function check_attendance_for_organization($username){
       $exam_code = AvailabilityController::Exam_Code();
       $check = ExamTaker::where([
        ['exam_code','=',$exam_code],

        ['username','=',$username],

        ['attendance','=',1],
       ])->get();
      

       if ($check->count() >0) {
           return false;
           // the exam taker attend the class
       }

       else 
        {
          return true;
          //the exam taker not attend the class

        }
   
	}




	
}
