<?php

namespace App\Http\Controllers\ExamTaker;
use App\Http\Controllers\CommonTask\QuestionFetchingController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ExamHomeController extends Controller
{
    public function __construct(){
    	$this->middleware('ExamTakerAuth');
    	
    }

    public function index(){
    	$exam_code = Auth::guard('exam_taker')->user()->exam_code;
        $questions = QuestionFetchingController::Fetch_Question($exam_code);
    	return view('examtaker.exam_home',['questions'=>$questions]);
    }

    public function Logout(){
    	Auth::guard('exam_taker')->logout();
    	return redirect()->route('Exam_Taker_login');
    }
}
