<?php

namespace Modules\Test2\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Test2\Events\Handlers\RegisterTest2Sidebar;

class Test2ServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterTest2Sidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('entity_test1s', array_dot(trans('test2::entity_test1s')));
            $event->load('entity_test2s', array_dot(trans('test2::entity_test2s')));
            // append translations


        });
    }

    public function boot()
    {
        $this->publishConfig('test2', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Test2\Repositories\Entity_test1Repository',
            function () {
                $repository = new \Modules\Test2\Repositories\Eloquent\EloquentEntity_test1Repository(new \Modules\Test2\Entities\Entity_test1());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Test2\Repositories\Cache\CacheEntity_test1Decorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Test2\Repositories\Entity_test2Repository',
            function () {
                $repository = new \Modules\Test2\Repositories\Eloquent\EloquentEntity_test2Repository(new \Modules\Test2\Entities\Entity_test2());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Test2\Repositories\Cache\CacheEntity_test2Decorator($repository);
            }
        );
// add bindings


    }
}
