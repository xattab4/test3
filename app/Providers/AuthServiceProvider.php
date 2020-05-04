<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport; 

use Validator;

class AuthServiceProvider extends ServiceProvider
{

    private $allowedDomains = ['mail.ru'];

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
        Validator::extend('allowed_domain', function($attribute, $value, $parameters, $validator) {
            return !in_array(explode('@', $value)[1], $this->allowedDomains);
        }, 'Domain not valid for registration or logon now.');

        $this->registerPolicies();
        Passport::routes();
    }
}
