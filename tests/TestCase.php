<?php


namespace TheTestCoder\LaravelPackageStructure\Tests;


use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use TheTestCoder\LaravelPackageStructure\LaravelPackageStructureServiceProvider;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            function (string $modelName) {
                return 'TheTestCoder\\LaravelPackageStructure\\Database\\Factories\\' . class_basename($modelName) . 'Factory';
            }
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelPackageStructureServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        /*
        include_once __DIR__.'/../database/migrations/create_skeleton_table.php.stub';
        (new \CreatePackageTable())->up();
        */
    }
}
