<?php namespace App\ViewGenerator;

use Illuminate\Support\ServiceProvider;

class ViewGeneratorServiceProvider extends ServiceProvider {

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
        $this->app['viewgenerator'] = $this->app->share(function($app)
        {
            return new ViewGeneratorManager;
        });

        // Shortcut so developers don't need to add an Alias in app/config/app.php
        $this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('ViewGenerator', 'App\ViewGenerator\Facades\ViewGenerator');
            $loader->alias('VG', 'App\ViewGenerator\Facades\ViewGenerator');
        });
    }

}
