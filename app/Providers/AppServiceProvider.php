<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
     public function register()
     {
       // System
       require_once app_path() . '/Helpers/System/Default.php';
     }

     /**
      * Bootstrap any application services.
      *
      * @return void
      */
     public function boot()
     {
         date_default_timezone_set('Asia/Jakarta');
     }
}
