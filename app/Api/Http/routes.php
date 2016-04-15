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
//FIX FOR CORS
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT');
header("Access-Control-Allow-Headers: Authorization, X-Requested-With,  Content-Type, Accept");
/**
 * @var Dingo\Api\Routing\Router $api
 */

    /*
     * Global info
     * Api version
     * Docs
     */
    $api->get("docs","DocController@showLatest");
    $api->get("docs/{version}","DocController@showVersion");
    $api->get("docs/raw/","DocController@generateDoc");
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
        //$api->get("user/{user}/shares",["uses"=>"UserController@shares"]);
        $api->resource("share","ShareController");
        //$api->get("share/{share}/list",["as"=>"api.v1.share.list","uses"=>"ShareController@listShareable"]);
        $api->get("share/{share}/content",["as"=>"api.v1.share.content","uses"=>"ShareController@listShareable"]);

        $api->resource("file","FileController");
        $api->post("/file/{file}/share",["as"=>"api.v1.file.share","uses"=>"FileController@share"]);

        $api->resource("directory","DirectoryController");
        $api->post("directory/{directory}/share",["as"=>"api.v1.directory.share","uses"=>"DirectoryController@share"]);

        $api->get("/directory/tree",["as"=>"api.v1.file.tree","uses"=>"DirectoryController@tree"]);
        
        /*$api->get("tree",function(Request $request)
        {
            //dd($request->get("path"));
            $path = $request->get("path");
            $user = $this->user();

            $dir = \App\Directory::forUser($user)->where("path",$path)->first();
            if($dir == null)
                throw new NotFoundHttpException("could not find directory for path : {$path}");

            $children = \App\Directory::children($dir->id)->get();
            return(array_add($dir->toArray(),"children",$children));

        });*/
        $api->resource("calendar","CalendarController");
        $api->post("calendar/{calendar}/share",["as"=>"api.v1.calendar.share","uses"=>"CalendarController@share"]);

        $api->resource("calendar.event","CalendarEventController");
        $api->post("calendar/{calendar}/event/{event}/share",["as"=>"api.v1.calendar.event.share","uses"=>"CalendarEventController@share"]);
        $api->resource("contact","ContactController");
        $api->post("contact/{contact}/share",["as"=>"api.v1.contact.share","uses"=>"ContactController@share"]);
    });

