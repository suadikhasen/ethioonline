<?php
namespace App\Service;
use App\Organization\ExamTime;
use Illuminate\Support\Carbon;
use App\Http\Controllers\CommonTask\AvailabilityController;

/**
 * 
 */
class  ExamTimeService
{
	/*check exam expiration-----------------------------------------------
	 *since if there is the exam which was running and to make it complete
	 * 0 values in the database is online exam and 1 is completed exam
	 
    */
	public static function Check_Exam_Expiration()
	{
	   	$check_exam_expired=ExamTime::where([
	   		['complete_status','=',0],

	   		['ending','<=',Carbon::now()],
	   	])->update(['complete_status'=>1]);

	   	$time=ExamTime::where('complete_status','=',1)->first();
	   	
	}
    /*check if there is running exam 
     *if there is exam share variable to the view 
     *on the exam service provider
     
    */
	public static function Check_Existence_Of_Running_Exam(){
        $exam_code=AvailabilityController::ExamCode();
        $running_exam=ExamTime::where('complete_status','=',0)->first();
        if ($running_exam==NULL) {
            return false;
        	
        }

        else{
        	return true;
        }
      

	}

    public static function Exam_Time_Variables(){
    	$all_times=ExamTime::where('complete_status','=',0)->first();
    	return $all_times;
    } 


}