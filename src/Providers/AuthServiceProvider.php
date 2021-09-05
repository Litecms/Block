<?php

namespace Litecms\Block\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the package.
     *
     * @var array
     */
    protected $policies = [
        // Bind Block policy
        \Litecms\Block\Repositories\Eloquent\BlockRepository::class 
        => \Litecms\Block\Policies\BlockPolicy::class,// Bind Category policy
        \Litecms\Block\Repositories\Eloquent\CategoryRepository::class 
        => \Litecms\Block\Policies\CategoryPolicy::class,
    ];

    /**
     * Register any package authentication / authorization services.
     *
     * @param \Illuminate\Contracts\Auth\Access\Gate $gate
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);
    }
}
