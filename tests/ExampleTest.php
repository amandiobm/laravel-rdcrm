<?php

namespace Thiagovictorino\LaravelRdcrm\Tests;

use Orchestra\Testbench\TestCase;
use Thiagovictorino\LaravelRdcrm\LaravelRdcrmServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LaravelRdcrmServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
