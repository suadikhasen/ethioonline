<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\ExamTimeService;
use Illuminate\Support\Facades\Auth;

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
    {
        ExamTimeService::Check_Exam_Expiration();

        if (Auth::check()) {
            
        }

    }
}
