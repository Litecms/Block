<?php

namespace Litecms\Block\Providers;

use Illuminate\Support\ServiceProvider;
use Litecms\Block\Block;

class BlockServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Load view
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'block');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'block');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        // Call pblish redources function
        $this->publishResources();

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfig();
        $this->registerFacade();
        $this->registerBindings();
        //$this->registerCommands();

        $this->app->register(\Litecms\Block\Providers\AuthServiceProvider::class);
        $this->app->register(\Litecms\Block\Providers\RouteServiceProvider::class);
        // $this->app->register(\Litecms\Block\Providers\EventServiceProvider::class);
        // $this->app->register(\Litecms\Block\Providers\WorkflowServiceProvider::class);
    }

    /**
     * Register the vault facade without the user having to add it to the app.php file.
     *
     * @return void
     */
    public function registerFacade() {
        $this->app->bind('litecms.block', function($app)
        {
            return $this->app->make(Block::class);
        });
    }

    /**
     * Register the bindings for the service provider.
     *
     * @return void
     */
    public function registerBindings() {
        // Bind Block to repository
        $this->app->bind(
            'Litecms\Block\Interfaces\BlockRepositoryInterface',
            \Litecms\Block\Repositories\Eloquent\BlockRepository::class
        );        // Bind Category to repository
        $this->app->bind(
            'Litecms\Block\Interfaces\CategoryRepositoryInterface',
            \Litecms\Block\Repositories\Eloquent\CategoryRepository::class
        );
    }


    /**
     * Merges user's and block's configs.
     *
     * @return void
     */
    protected function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/config.php', 'litecms.block'
        );
    }

    /**
     * Register scaffolding command
     */
    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Litecms\Block\Commands\Block::class,
            ]);
        }
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['litecms.block'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../../config/config.php' => config_path('litecms/block.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../../resources/views' => base_path('resources/views/vendor/block')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/block')], 'lang');

        // Publish public files and assets.
        $this->publishes([__DIR__ . '/public/' => public_path('/')], 'public');
    }
}
