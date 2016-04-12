<?php

namespace App\Api\Http\Controllers;

use App\Api\Http\Requests\AuthRequest;

use App\Api\Http\Requests\LogoutTokenRequest;
use App\Api\Http\Requests\RefreshTokenRequest;
use Auth;
use Config;
use Dingo\Api\Http\Request;
use Illuminate\Support\Str;
use JWTAuth;
use MongoDB\Driver\Exception\Exception;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Tymon\JWTAuth\Exceptions\JWTException;

use Symfony\Component\HttpKernel\Exception\HttpException	;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException	;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;


class AuthController extends Controller
{
    public function __construct()
    {

        //$this->middleware("api.auth",["only"=>["jwtLogout","jwtRefresh"]]);
    }

    /**
     * <a name="auth"></a>
     * Authenticates the user with his email or username, and password. Returns a Json Web Token and it's validity delays
     *
     * + Example
     * ```
     * curl -X POST http://ricci.cpnv-es.ch/api/auth/jwt_get_token \\
     * --data "{'login':[username or email],'password':[password]}"
     * ```
     *
     * @Post("/auth/jwt/get_token")
     * @Versions({"v1"})
     * @Request({"login":"username or email":"password":"password..."})
     * @Response(200,body={"status": "ok" ,"payload" : {"token":"[jwt token]","refresh_ttl":"int value of refresh time for the token","ttl":"time in which the token is valid"}})
     *
     * + Response Errors
     * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"})
     * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"})
     *
     * @param AuthRequest $request
     * @return array
     */
    public function jwtAuth(AuthRequest $request)
    {
        $field = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([$field => $request->input('login')]);
        $credentials = $request->only($field, 'password');

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                throw new UnauthorizedHttpException('invalid credentials');
            }
        } catch (JWTException $e) {
            // something went wrong
            throw new HttpException('could not create token');
        }
        //$user = JWTAuth::toUser($token);
        //$payload = \JWTFactory::make(["username"=>$user->username]);
        //$token = JWTAuth::encode($payload);
        // if no errors are encountered we can return a JWT
        return $this->tokenResponse($token);
    }

    /**
     * <a name="refresh_auth"></a>
     * Refreshes a token from either the headers, or a query parameter
     * + Example
     * ```
     * curl -X POST http://ricci.cpnv-es.ch/api/auth/jwt_get_token \\
     * --header "Authorization: bearer <[access token](#auth)>
     * ```
     * OR
     * curl -X POST http://ricci.cpnv-es.ch/api/auth/jwt_get_token \\
     * --data "{'token':"<[access token](#auth)>"}"
     * ```
     * OR
     *
     * curl -X POST http://ricci.cpnv-es.ch/api/auth/jwt_get_token?token="<[access token](#auth)>"
     * ```
     *
     * @Post("/auth/jwt/refresh_token")
     * @Versions({"v1"})
     * @Request({"token":"[access token](#auth)"})
     * @Request({}, headers={"Authorization": "Barear <[access token](#auth)>"})
     * @Response(200,body={"status": "ok" ,"payload" : {"token":"[jwt token]","refresh_ttl":"int value of refresh time for the token","ttl":"time in which the token is valid"}})
     * @Parameter("token", description="The jwt delivered by (#auth)."),
     *
     * + Response Errors
     * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"})
     * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"})
     *
     * @param RefreshTokenRequest $request
     * @return array
     */
    public function jwtRefresh(RefreshTokenRequest $request)
    {
        $token = JWTAuth::getToken();
        if(!$token){
            throw new BadRequestHttpException('Token not provided');
        }
        try{
            $token = JWTAuth::refresh($token);
        }catch(TokenInvalidException $e){
            throw new AccessDeniedHttpException('The token is invalid');
        }
        //return a token if no errors
        return $this->tokenResponse($token);
    }

    /**
     * <a name="auth_logout"></a>
     * Invalidates a token, making it unusable again!!
     * + Example
     * ```
     * curl -X POST http://ricci.cpnv-es.ch/api/auth/jwt_get_token \\
     * --header "Authorization: bearer <[access token](#auth)>
     * ```
     * OR
     * curl -X POST http://ricci.cpnv-es.ch/api/auth/jwt_get_token \\
     * --data "{'token':"<[access token](#auth)>"}"
     * ```
     * OR
     *
     * curl -X POST http://ricci.cpnv-es.ch/api/auth/jwt_get_token?token="<[access token](#auth)>"
     * ```
     *
     * @Post("/auth/jwt/refresh_token")
     * @Versions({"v1"})
     * @Request({"token":"[access token](#auth)"})
     * @Request({}, headers={"Authorization": "Barear <[access token](#auth)>"})
     * @Response(200,body={"status": "ok" ,"payload" : {"token":"[jwt token]","refresh_ttl":"int value of refresh time for the token","ttl":"time in which the token is valid"}})
     * @Parameter("token", description="The jwt delivered by (#auth)."),
     *
     * + Response Errors
     * @Response(401, body={"status": "error","payload": "The token you provided has unauthorized access to this resource","error":"unauthorized token"})
     * @Response(401, body={"status": "error","payload": "The token could not be parsed","error":"malformed_token"})
     * @param LogoutTokenRequest|Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function jwtLogout(LogoutTokenRequest $request)
    {
        try{
            if(JWTAuth::invalidate(JWTAuth::getToken()))
                return $this->response()->noContent();
            throw new BadRequestHttpException("no token");
        }catch(JWTException $e){
            throw new HttpException("could not logout");
        }

    }

    /**
     * Creates the response to return a JWT
     * @param $token
     * @return array
     */
    protected function tokenResponse($token)
    {
        return ["token"=>$token,"ttl"=>Config::get("jwt.ttl"),"refresh_ttl"=>Config::get("jwt.refresh_ttl"),"user_id"=>JWTAuth::toUser($token)->id];
    }

    public function getCurrentUser()
    {
        return $this->user();
    }

}
