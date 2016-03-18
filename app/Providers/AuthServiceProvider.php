<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\User;
use App\Calendar;
use App\Contact;
use App\Event;
use App\File;
use App\Share;

use App\Policies\UserPolicy;
use App\Policies\CalendarPolicy;
use App\Policies\ContactPolicy;
use App\Policies\EventPolicy;
use App\Policies\FilePolicy;
use App\Policies\SharePolicy;

use Bouncer;

use Dingo\Api\Auth\Auth;
use Dingo\Api\Auth\Provider\OAuth2;
use DB;
use App\ApiClient;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
//        User::class => UserPolicy::class,
//        Contact::class => ContactPolicy::class,
//        File::class => FilePolicy::class,
//        Event::class => EventPolicy::class,
//        Calendar::class => CalendarPolicy::class
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        /*register oauth2 server*/
        /*$this->app[Auth::class]->extend('oauth', function ($app) {
            $provider = new OAuth2($app['oauth2-server.authorizer']->getChecker());

            $provider->setUserResolver(function ($id) {
                return User::find($id);
                // Logic to return a user by their ID.
            });

            $provider->setClientResolver(function ($id) {
                return ApiClient::find($id);
                // Logic to return a client by their ID.
            });

            return $provider;
        });*/
        
    }
}
