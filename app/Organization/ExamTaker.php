<?php

namespace App\Organization;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\ExamTaker\Answer;

class ExamTaker extends Authenticatable
{   
    protected $guards = "exam_taker";

    protected $table="exam_taker";
    protected $primaryKey="exam_code";
    protected $keyType="string";
    public $incrementing=false;

    protected $hidden=[
      'password',
      'username',
      'exam_code',
  
    ];
  
    public function Answer(){
       return $this->belongsToMany(Answer::class,'exam_questions','exam_code','exam_code','exam_code','exam_code');
    }
  


    
}
