<?php 

namespace Ottosmops\Dbcheck;

use Illuminate\Support\ServiceProvider;

class DbcheckServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
         if ($this->app->runningInConsole()) {
            $this->commands([
                Dbcheck::class,
            ]);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}