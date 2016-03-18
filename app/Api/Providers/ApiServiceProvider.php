<?php

namespace App\Api\Providers;

use Dingo\Api\Routing\Router;
use Illuminate\Routing\Router as IlluminateRouter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Exception\HttpResponseException;
use Response;
class ApiServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Api\Http\Controllers';
    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    public function boot(IlluminateRouter $router)
    {
        parent::boot($router);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    /**
     * Define the routes for the application.
     *
     * @param  \Dingo\Api\Routing\Router  $router
     * @return void
     */
    public function map(Router $api)
    {
        $api->group(['version'=>'v1','namespace' => $this->namespace], function ($api) {
            require app_path('Api/Http/routes.php');
        });
    }

}
