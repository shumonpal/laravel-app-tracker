<?php

namespace Shumonpal\LaravelAppTracker;

use Illuminate\Support\ServiceProvider;

class LaravelAppTrackerServiceProvider extends ServiceProvider
{

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__. '/routes/web.php');
        $this->loadRoutesFrom(__DIR__. '/routes/api.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->mergeConfigFrom(
            __DIR__.'/../config/tracker.php', 'shumonpal'
        );
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'shumonpal');

        $this->publishes([
            __DIR__.'/../config/tracker.php' => config_path('project-tracker.php'),
        ]);
        
        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/shumonpal'),
        ]);

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/shumonpal'),
        ]);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->booting(function () {            
        //     Event::listen(Login::class , NotifyIfNotLicencedListener::class);
        // });
    }


}