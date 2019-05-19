<?php

namespace App\Organization;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public $table="exams";
    protected $casts=['ended_at'=>'dateTime'];
    protected $primaryKey="exam_code";
    public    $incrementing=false;
    protected $keyType="string";

    public function Question(){
    	return $this->hasMany('App\Organization\Question','exam_code','exam_code');
    }
    
}
