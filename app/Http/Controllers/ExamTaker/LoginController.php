<?php

namespace App\Http\Controllers\ExamTaker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{    
     public function __construct(){
          $this->middleware('ExamTakerGuest');
     }

     public function index(){
        return view('examtaker.login');
     }


     public function authentication(Request $request){
          $request->validate([
          	'username'=>'required|string',
          	'password'=>'required|string',
               'exam_code'=>'required|string',
          ]);

          $credential = $request->only('username','password','exam_code');

          if (Auth::guard('exam_taker')->attempt($credential)) {
          	 return redirect()->route('Exam_Taker.Exam_Home');
          }

          else
          {
          	return redirect()->back()->withInput($request->flashExcept('password'))->with('login_error','Invalid Username , Password or exam_code');
          }


     }
}
