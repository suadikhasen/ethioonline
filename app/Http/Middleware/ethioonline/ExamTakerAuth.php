<?php

namespace App\Http\Middleware\ethioonline;

use Closure;
use Auth;

class ExamTakerAuth
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
        if (!(Auth::guard('exam_taker')->check())) {
             return redirect()->route('Exam_Taker_login');
           
        }
        return $next($request);
    }
}
