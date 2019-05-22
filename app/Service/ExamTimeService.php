<?php
namespace App\Service;
use App\Organization\ExamTime;
use Illuminate\Support\Carbon;

/**
 * 
 */
class  ExamTimeService
{
	
	public static function Check_Exam_Expiration()
	{
	   	$check_exam_expired=ExamTime::where([
	   		['complete_status','=',0],

	   		['ending','<=',Carbon::now()],
	   	])->update(['complete_status'=>1]);
	}

	public function Organization_Exam_Time_Provider(){
        


	}
}