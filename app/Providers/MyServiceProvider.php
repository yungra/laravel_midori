<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->singleton('myservice',
        'App\MyClasses\PowerMyService');
        app()->singleton('App\MyClasses\MyServiceInterface',
        'App\MyClasses\PowerMyService');
        // echo '<b>&lt;MyServiceProvider/register&gt;</b><br>';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // echo "<b>&lt;MyServiceProvider/boot&gt;</b><br>";
    }
}
