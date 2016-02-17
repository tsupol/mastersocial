<?php namespace App\FbService\Facades;

use Illuminate\Support\Facades\Facade;

class FbService extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'FbService';
    }

}