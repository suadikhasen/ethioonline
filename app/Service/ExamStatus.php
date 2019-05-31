<?php
namespace App\Service;
/**
 * 
 */
use Auth;
use App\Organization\Exam;
use App\Organization\ExamTime;
use Illuminate\Support\Carbon;
class ExamStatus 
{
	
	public function online(){
		$exam_code = Auth::guard('exam_taker')->user()->exam_code;
		$now = Carbon::now();
		$time_active = ExamTime::where([
			['exam_code','=',$exam_code],
			['begning','<=',$now],
			['ending','>',$now],
		])->first();

		if ($time_active == NULL) {
			return false;
		}

		else{
			return true;
		}

    }



	public function progress(){
		$exam_code = Auth::guard('exam_taker')->user()->exam_code;
		$exam = Exam::where([
         ['exam_code','=',$exam_code],
         ['progress','=',1],
		]);
        
		if ($exam->count() == 1) {
			
			return true;
		}

		else{
			return false;
		}


	}

}