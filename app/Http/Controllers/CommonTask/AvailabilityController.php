<?php

namespace App\Http\Controllers\CommonTask;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Organization\Exam;
use App\Organization\Question;
use Illuminate\Support\Facades\Auth;
class AvailabilityController extends Controller
{
    public static function Question_number(){
    	$email=Auth::user()->email;
    	$current_exam=Exam::where([
    		['exam_owner','=',$email],
    		['progress','=',1]
    	])->first();

        $question_number;
        $exam_code=$current_exam->exam_code;
        $check_existence =  Question::where('exam_code',$exam_code)->latest()->first();
        
        if($check_existence!=NULL){
        	$question_number=$check_existence->question_number;
        	$question_number=$question_number+1;

        }

        else{

        	$question_number=1;

        }

    	return $question_number;
    }

   public static function Exam_Code(){
   	 $email=Auth::user()->email;
    	$current_exam=Exam::where([
    		['exam_owner','=',$email],
    		['progress','=',1]
    	])->first();

        $question_number;
        $exam_code=$current_exam->exam_code;

        return $exam_code;
   }
}
