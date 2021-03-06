<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\BlogModel' => 'App\Policies\BlogPolicy',
        'App\Models\CommentModel' => 'App\Policies\CommentPolicy',
        'App\Models\TeamModel' => 'App\Policies\TeamPolicy',
        'App\Models\MainModel' => 'App\Policies\MainPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
