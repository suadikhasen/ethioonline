<?php

namespace App\Http\Controllers\Organization;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Organization\ExamTaker;
use App\Http\Controllers\CommonTask\AvailabilityController;
class ScoreBoardController extends Controller
{
    public function index(){
    	$exam_code = AvailabilityController::Exam_Code();
        $score = ExamTaker::where('exam_code',$exam_code)->get();
    	$exam_available=1;
    	return view('organization.show_score_board',['exam_available'=>$exam_available,'score'=>$score]);
    }
}
