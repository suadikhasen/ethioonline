<?php

namespace App\Http\Middleware\ethioonline;

use Closure;
use Auth;

class ExamTakerGuest
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

      if (Auth::guard('exam_taker')->check()) {
           return redirect()->route('Exam_Taker.Exam_Home');
         
        }
        return $next($request);
    }
}
