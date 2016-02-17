<?php namespace App\FbService;

use Illuminate\Support\ServiceProvider;

class FbServiceServiceProvider extends ServiceProvider {

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
        // Register 'underlyingclass' instance container to our UnderlyingClass object
        $this->app['FbService'] = $this->app->share(function($app)
        {
            return new FbServiceManager;
        });

        // Shortcut so developers don't need to add an Alias in app/config/app.php
        $this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Fb', 'App\FbService\Facades\FbService');

        });
    }

}
