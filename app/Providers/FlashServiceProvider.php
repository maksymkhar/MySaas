<?php

namespace App\Providers;

use App\Http\Flash;
use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('flash',function() {
            return $this->app->make(Flash::class);
        });
    }
}