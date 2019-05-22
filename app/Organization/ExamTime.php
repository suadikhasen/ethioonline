<?php

namespace App\Organization;

use Illuminate\Database\Eloquent\Model;

class ExamTime extends Model
{
    protected $table="exam_time";
    protected $primaryKey="exam_code";
    protected $keyType="string";
    public $incrementing=false;

    public $timestamps = false;
}
