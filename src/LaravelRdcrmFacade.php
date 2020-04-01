<?php

namespace Thiagovictorino\LaravelRdcrm;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Thiagovictorino\LaravelRdcrm\Skeleton\SkeletonClass
 */
class LaravelRdcrmFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-rdcrm';
    }
}
