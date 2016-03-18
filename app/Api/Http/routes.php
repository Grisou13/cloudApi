<?php
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * @var Dingo\Api\Routing\Router $api
 */

//$api = app('Dingo\Api\Routing\Router');
//$api->group(['version'=>'v1','namespace'=>"App\\Api\\Http\\Controllers"], function ($api) {
    /*
     * Global info
     * Api version
     * Docs
     */

    $api->get("docs","DocController@showHome");
    $api->get("docs/{version}","DocController@showVersion");
    $api->group(["prefix"=>"auth"],function($api){
        $api->post('jwt/get_token', ["as"=>"api.auth.jwt.get_token","uses"=>"AuthController@jwtAuth"]);
        $api->post("jwt/refresh_token",["as"=>"api.auth.jwt.refresh_token","uses"=>"AuthController@jwtRefresh"]);
        $api->post("jwt/logout",["as"=>"api.auth.jwt.logout","uses"=>"AuthController@jwtLogout"]);
        //$api->post('session',["as"=>"api.auth.session","uses"=>"AuthController@session"]);
    });
    $api->get("/me",["as"=>"api.me","uses"=>'AuthController@getCurrentUser']);
    /*
     * V1
     * Users
     * Files
     * Shares
     * Contacts
     * Calendar
     * Auth
     */
    $api->group(["prefix"=>"/v1"],function($api) {
        /**
         * Simple ping accessor, can get the status of the api
         */
        $api->any("/ping",function(){
            return "pong!";
        });

        $api->resource("user","UserController");
        $api->resource("share","ShareController");
        $api->resource("file","FileController");
        $api->resource("calendar","CalendarController");
        $api->resource("calendar.event","CalendarEventController");
        $api->resource("contact","ContactController");
    });

//});
