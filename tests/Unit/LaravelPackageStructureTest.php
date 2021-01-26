<?php

namespace TheTestCoder\LaravelPackageStructure\Tests\Unit;

use TheTestCoder\LaravelPackageStructure\LaravelPackageStructure;
use TheTestCoder\LaravelPackageStructure\Tests\TestCase;


class LaravelPackageStructureTest extends TestCase
{
    /** @test */
    public function function_should_return_true()
    {
        $package = new LaravelPackageStructure();
        $this->assertTrue($package->returnTrue());
    }
}
