<?php

namespace App\Http\Middleware\ethioonline;
use App\Http\Controllers\CommonTask\AvailabilityController;
use App\Organization\ExamTime;

use Closure;

class start_exam_control
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   $exam_code=AvailabilityController::Exam_Code();
        $check_progress_exam=ExamTime::where([
            ['exam_code','=',$exam_code],
            ['complete_status','=',0],

        ])->first();

        if ($check_progress_exam!=NULL) {
           return redirect()->route('Organization.Exam_Home')->with('exam_started','Exam Already Started');   
        }

        return $next($request);
    }
}
