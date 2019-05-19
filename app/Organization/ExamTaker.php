<?php

namespace App\Organization;

use Illuminate\Database\Eloquent\Model;

class ExamTaker extends Model
{
    protected $table="exam_taker";
    protected $primaryKey="username";
    protected $keyType="string";
    public $incrementing=false;

    protected $hidden=[
      'password',
      'username',
      'exam_code',

    ];
    
}
