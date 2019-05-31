<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\ExamTimeService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ExamTimeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {  /*
        check exam time expiration and and expire before laravell loads the examif any

        */
        
        ExamTimeService::Check_Exam_Expiration();
        // show time for all admin views
        view::composer('organization.*','App\Service\ExamTimeComposer');
    }
}
