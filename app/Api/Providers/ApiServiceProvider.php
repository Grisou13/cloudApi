<?php

namespace App\Api\Providers;

use Dingo\Api\Routing\Router;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Routing\Router as IlluminateRouter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Exception\HttpResponseException;
use Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ApiServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Api\Http\Controllers';
    protected $version = "v1";
    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    public function boot(IlluminateRouter $router)
    {
        parent::boot($router);
        app('Dingo\Api\Exception\Handler')->register(function (ModelNotFoundException $exception) {
            throw new NotFoundHttpException($exception->getMessage(),$previous = $exception);
        });
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
        $api->group(['version'=>$this->version,'namespace' => $this->namespace], function ($api) {
            require app_path('Api/Http/routes.php');
        });
    }

}
