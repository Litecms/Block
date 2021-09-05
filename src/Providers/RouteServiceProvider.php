<?php

namespace Litecms\Block\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Litecms\Block\Models\Block;

use Request;
use Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Litecms\Block\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param   \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot()
    {
        parent::boot();

        if (Request::is('*/block/block/*')) {
            Route::bind('block', function ($block) {
                $blockRepo = $this->app->make('Litecms\Block\Interfaces\BlockRepositoryInterface');
                return $blockRepo->findorNew($block);
            });
        }
        if (Request::is('*/block/category/*')) {
            Route::bind('category', function ($category) {
                $categoryRepo = $this->app->make('Litecms\Block\Interfaces\CategoryRepositoryInterface');
                return $categoryRepo->findorNew($category);
            });
        }

    }

    /**
     * Define the routes for the package.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();

        $this->mapApiRoutes();
    }

    /**
     * Define the "web" routes for the package.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {   
        Route::group([
            'middleware' => 'web',
            'namespace'  => $this->namespace,
        ], function ($router) {
            require (__DIR__ . '/../../routes/web.php');
        });
    }

    /**
     * Define the "api" routes for the package.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace'  => $this->namespace,
            'prefix'     => 'api',
        ], function ($router) {
            require (__DIR__ . '/../../routes/api.php');
        });
    }

}
