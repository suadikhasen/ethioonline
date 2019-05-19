<?php

namespace App\Http\Controllers\Organization;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\Organization\Exam;
use App\Organization\Question;
use App\Http\Controllers\CommonTask\AvailabilityController;
use App\Http\Controllers\CommonTask\QuestionEdittingController;
class QuestionController extends Controller
{   
    public function __construct(){
    	$this->middleware('exam_created');
    }



    public function index(){

    	$question_number=AvailabilityController::Question_number();
    	$exam_code=AvailabilityController::Exam_Code();
        $exam_available=1;
        

    	
        return view('organization.create_question_form')->with(
        	[
        		'exam_available'=>$exam_available,
        		'question_number'=>$question_number,
        		'exam_code'=>$exam_code,
        	]);
    }



    public function Add_Question(Request $request){
       $validator=Validator::make($request->all(),[
        'main_question'=>'required',
        'choice_a'=>'required',
        'choice_b'=>'required',
        'choice_c'=>'required',
        'choice_d'=>'required',
        'answer'=>'required|string|size:1',
       ]);

       if($validator->fails()){
       	  return back()->withErrors($validator)->withInput();
       }



       $main_question=$request['main_question'];
       $choice_a=$request['choice_a'];
       $choice_b=$request['choice_b'];
       $choice_c=$request['choice_c'];
       $choice_d=$request['choice_d'];
       $correct_answer=$request['answer'];
       $exam_code=AvailabilityController::Exam_Code();
       $question_number=AvailabilityController::Question_number();



       $Add_Question=new Question();
       

       $Add_Question->main_question=$main_question;
       $Add_Question->choice_a = $choice_a;
       $Add_Question->choice_b = $choice_b;
       $Add_Question->choice_c = $choice_c;
       $Add_Question->choice_d = $choice_d;
       $Add_Question->exam_code = $exam_code;
       $Add_Question->question_number=$question_number;
       $Add_Question->correct_answer=$correct_answer;


       if($request->has('choice_e')){
       	  $Add_Question->choice_e = $request['choice_e'];
       }

       $Save_Question = $Add_Question->save();

       
       

       if ($Save_Question) {
       	 return redirect()->route('Organization.Show_Create_Question_Form')->with('question_added_successfully','Question Added question_added_successfully');
       }

       else {
       	 return back();
       }
    }


    public function Show_Edit_Form($exam_code,$question_number){
       $question=Question::where([
       	['exam_code','=',$exam_code],

       	['question_number','=',$question_number],

       ])->first();

       return view('organization.question_editting_form',['question'=>$question]);
    }


    public function Edit_Question(Request $request, $exam_code,$question_number){
    	$validators=Validator::make($request->all(),[
         'main_question'=>'required|string',
         'choice_a'=>'required|string',
         'choice_b'=>'required|string',
         'choice_c'=>'required|string',
         'choice_d'=>'required|string',
         'correct_answer'=>'required|char|size:1',
    	]);
       
    	$main_question=$request['main_question'];
    	$choice_a=$request['choice_a'];
    	$choice_b=$request['choice_b'];
    	$choice_c=$request['choice_c'];
    	$choice_d=$request['choice_d'];
    	$correct_answer=$request['correct_answer'];


        
        $update_question=Question::where([
         ['exam_code','=',$exam_code],

         ['question_number','=',$question_number],

        ])->first();

        
        
        $update_question->main_question=$main_question;
        $update_question->choice_a=$choice_a;
        $update_question->choice_b=$choice_b;
        $update_question->choice_c=$choice_c;
        $update_question->choice_d=$choice_d;
        $update_question->correct_answer=$correct_answer;

        if($request->has('choice_e')){
        	$update_question->choice_e=$request['choice_e'];

        }

        $save_update=$update_question->save();

        if($save_update){ 
        	return redirect()->route('Organization.Show_Edit_Form',['exam_code'=>$exam_code,'question_number'=>$question_number])->with('Editing_Success','Question number '.$question_number.' Editted Successfully');
        }

        else{
        	return back();
        }
    }


    public function Delete_Question($exam_code,$question_number){
       $Delete_Question=QuestionEdittingController::Delete_Question($exam_code,$question_number);
       if ($Delete_Question) {
       	 return redirect()->route('Organization.Exam_Home')->with('Delete_Success','Question Deleted Successfully');
       }

       return back();
    }
}
