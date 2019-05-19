<?php

namespace App\Http\Controllers\CommonTask;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class GeneratorController extends Controller
{
    public static function Username_Generater(){
      $username=Str::random(6);
    }

    public static function Password_Generater(){
    	$password=Str::random(6);

    }
}
