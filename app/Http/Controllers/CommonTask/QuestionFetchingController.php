<?php

namespace App\Http\Controllers\CommonTask;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonTask\AvailabilityController;
use App\Organization\Exam;

class QuestionFetchingController extends Controller
{
    public static function Fetch_Question(){
      $exam_code=AvailabilityController::Exam_Code();
      $questions=Exam::find($exam_code)->Question()->paginate(3);
      return $questions;

    } 
}
