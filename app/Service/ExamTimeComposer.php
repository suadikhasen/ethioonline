<?php
namespace App\Service;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommonTask\AvailabilityController;
use App\Organization\ExamTime;
use Illuminate\Support\Carbon;



/**
 * 
 */
class ExamTimeComposer 
{


	public function compose(View $view){


      if (Auth::check()) {
      	 /* 
           exam times that display on the view
      	 */
      	 $exam_availability_checker;
         $exam_code =AvailabilityController::Exam_Code();
         $check_running_exam=ExamTime::where([
         	['complete_status','=',0],
         	['exam_code','=',$exam_code]
         ])->first();
         
      	 if ($check_running_exam==NULL) {
      	 	$exam_availability_checker=false;
      	 	$view->with('exam_availability_checker',$exam_availability_checker);

      	 }



      	 else 
      	 {
      	 	$exam_time_variable=$check_running_exam;
      	 	$exam_availability_checker=true;

      	 	$pre_begning=Carbon::create($exam_time_variable->pre_begining);
      	 	$begning = Carbon::create($exam_time_variable->begning);
      	 	$ending = Carbon::create($exam_time_variable->ending);
             
            $diff_bet_pre_an_be = $begning->diffInSeconds($pre_begning);
   

            $now = Carbon::now()->toImmutable();

            $sub_ending = $ending->subSeconds($diff_bet_pre_an_be); 

            

      	 	  $waiting_time = $now->diffInSeconds($begning,false); 

      	 	

      	 	  $exam_time = $now->diffInSeconds($sub_ending,false);
      	 	
      	 	
      	 	
      	 	
            $view->with([
             'exam_availability_checker'=>$exam_availability_checker,
             'pre_begning'=>$waiting_time,
             'begning'=>$exam_time,
            ]);
            
           
      	 }

      }
	}
	
}