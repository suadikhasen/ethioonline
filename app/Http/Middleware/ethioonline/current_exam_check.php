<?php

namespace App\Http\Middleware\ethioonline;

use Closure;
use Auth;
use App\Organization\Exam;

class current_exam_check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $email=Auth::user()->email;
        $check_progress_existence=Exam::where([
        ['exam_owner','=',$email,],
        ['progress','=',true]

       ])->first();

        if($check_progress_existence==NULL){

          return redirect()->route('Organization.Exam_Home');
       }

        return $next($request);
    }
}
