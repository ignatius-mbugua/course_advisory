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
        'App\Model' => 'App\Policies\ModelPolicy',
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
        Gate::define('not_taken_test', function($user){
            return $user->personality_id === NULL;
        });

        Gate::define('taken_test', function($user){
            return $user->personality_id !== NULL;
        });

        Gate::define('entered_aggregate', function($user){
            return $user->aggregate()->count() > 0;
        });
    }
}
