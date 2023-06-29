<?php

namespace Litecms\Block\Providers;

use Litepie\Foundation\Support\Providers\WorkflowServiceProvider as ServiceProvider;

class WorkflowServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function workflows()
    {
        return [
            \Litecms\Block\Models\Block::class 
                => config('litecms.block.block.workflow', [])
            ];
    }

}
