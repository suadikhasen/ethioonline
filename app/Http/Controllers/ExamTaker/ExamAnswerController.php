<?php

namespace App\Http\Controllers\ExamTaker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ExamTaker\Answer;

class ExamAnswerController extends Controller
{
    public function submit_answer(Request $request){
    	$request->validate([
          'username'=>'required',
          'exam_code'=>'required',
          'question_number'=>'required',
          'answer'=>'required',
    	]);

	    $answer = Answer::updateOrCreate(
	    	[
	         'username'=>$request->username,
	         'exam_code'=>$request->exam_code,
	         'question_number'=>$request->question_number,
	    	],

	    	[
             
              'answer'=>$request->answer,

	    	]

	    );


    }
}
