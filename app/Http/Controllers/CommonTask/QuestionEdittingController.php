<?php

namespace App\Http\Controllers\CommonTask;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Organization\Question;

class QuestionEdittingController extends Controller
{
    

    public static function Delete_Question($exam_code,$question_number){
      $max=Question::where('exam_code','=',$exam_code)->max('question_number');


	  $Delete_Question = Question::where([
	   	['exam_code','=', $exam_code],

	   	['question_number','=',$question_number],

	   ])->delete();
       
       if($Delete_Question){
       	  if ($question_number!=$max) {
       	  	$decrement_question_number=Question::where([
       	  		['exam_code','=',$exam_code],
       	  		['question_number','>',$question_number],
       	  		
       	  	])->decrement('question_number');
       	  	 
       	  }
       	  
       	  	return true;
       	  
       }

       else
       {
       	  return false;
       }
    }
}
