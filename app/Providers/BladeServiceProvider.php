<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Organization\ExamTaker;
use App\Service\Attendance_Evaluate;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {    

        Blade::if('attendance_organization',function($username){
          return Attendance_Evaluate::check_attendance_for_organization($username); 
        });

        


    }
}
