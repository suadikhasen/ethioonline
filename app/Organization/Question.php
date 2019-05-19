<?php

namespace App\Organization;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $table="exam_questions";
    protected $primaryKey="exam_code";
    protected $keyType="string";
    public $incrementing = false;

    protected $fillable=[
    	'exam_code',
    	'main_question',
    	'choice_a',
    	'choice_b',
    	'choice_c',
    	'choice_d',
    	'choice_e',
    	'question_number',
    	'correct_answer',
    ];
    
    public function setCorrectAnswerAttribute($value){

    	$this->attributes['correct_answer']=strtolower($value);
    }
}
