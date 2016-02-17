<?php namespace App\ViewGenerator\Facades;

use Illuminate\Support\Facades\Facade;

class ViewGenerator extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'viewgenerator';
    }

}