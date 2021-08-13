<?php

namespace Antron\Ipa;

use Illuminate\Support\ServiceProvider;

class IpaServiceProvider extends ServiceProvider
{

    public function boot()
    {

        include __DIR__ . '/../routes/web.php';

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ipa');
        
        $this->publishes([
            __DIR__ . '/../config/ipa.php' => config_path('ipa.php'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\Commands\CountCommand::class,
                Console\Commands\LoadCommand::class,
            ]);
        }

        Models\IpaOct2::observe(Observers\IpaOct2Ovserver::class);

        Models\IpaOct3::observe(Observers\IpaOct3Ovserver::class);

        Models\IpaOct4::observe(Observers\IpaOct4Ovserver::class);
    }

    public function register()
    {
        $this->app->singleton('ipa', function($app) {
            return new Ipa;
        });
    }

    public function provides()
    {
        return ['ipa'];
    }

}
