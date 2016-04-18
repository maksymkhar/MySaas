<?php

namespace App\Providers;

use App;
use App\HtmlProfileCreator;
use Illuminate\Support\ServiceProvider;

class ProfileProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

//        $this->app->bind(\App\Profile::class,function() {
//            return $this->app->make(HtmlProfileCreator::class);
//        });

        app::bind(\App\Profile::class, \App\HtmlProfileCreator::class);
    }
}
