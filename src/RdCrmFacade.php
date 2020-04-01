<?php

namespace Victorino\RdCrm;

use Illuminate\Support\Facades\Facade;

/**
 * @see thiagovictorino\RdCrm\Skeleton\SkeletonClass
 */
class RdCrmFacade extends Facade
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
