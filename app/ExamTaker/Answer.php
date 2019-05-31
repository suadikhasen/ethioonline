<?php

namespace App\ExamTaker;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{   
   protected $fillable = [
     'username','exam_code','question_number','answer'
   ];

    public function setAnswerAttribute($value){
    	
    	$this->attributes['answer']=strtolower($value);

    }
}
