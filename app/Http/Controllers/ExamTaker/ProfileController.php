<?php

namespace App\Http\Controllers\ExamTaker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    
    public function show_profile(){
    	return view('examtaker.profile');

    }

    
}
