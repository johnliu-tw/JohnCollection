<?php
namespace Johnliu\JohnCollection;

use Illuminate\Support\ServiceProvider;

class JohnCollectionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
          __DIR__.'/config/collection_setting.php' => config_path('collection_setting.php'),
        ]);
        $this->loadRoutesFrom(__DIR__.'/routes/john.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/collection_setting.php',
            'collection_setting'
        );

        $this->app->singleton('JohnCollection', function ($app) {
            return new JohnCollection();
        });
    }
}
