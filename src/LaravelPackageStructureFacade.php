<?php

namespace TheTestCoder\LaravelPackageStructure;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Thetestcoder\LaravelPackageStructure\LaravelPackageStructure
 */
class LaravelPackageStructureFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-package-structure';
    }
}
