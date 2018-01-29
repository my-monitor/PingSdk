<?php

namespace MyMonitor\PingSdk;

use Illuminate\Support\ServiceProvider;

class PingSdkServiceProvider extends ServiceProvider {

    /**
     * Publish config file.
     *
     * @return void
     */
    public function boot()
    {
        if(! class_exists(\Laravel\Lumen\Application::class)) {
            $this->publishes([
                __DIR__ . '/../config/mymonitor-ping.php' => config_path('mymonitor-ping.php'),
            ], 'config');
        }
    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/mymonitor-ping.php', 'mymonitor-ping');
        $this->app->singleton('mymonitor-pingsdk', function ($app) {
            $config = $app['config']['mymonitor-ping'];
            $client = new \GuzzleHttp\Client([
                'base_uri' => $config['api_endpoint'],
            ]);
            return new PingSdk($client,$config['api_token']);
        });
    }

}