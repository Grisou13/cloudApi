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
     * Authenticates the user with his email, and password. Returns a Json Web Token
     * @param AuthRequest $request
     * @return array
     */
    public function jwtAuth(AuthRequest $request)
    {

        $credentials = $request->only('email', 'password');

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                throw new UnauthorizedHttpException('invalid credentials');
            }
        } catch (JWTException $e) {
            // something went wrong
            throw new HttpException('could not create token');
        }

        // if no errors are encountered we can return a JWT
        return $this->tokenResponse($token);
    }

    /**
     * Refreshes a token
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
        return ["token"=>$token,"ttl"=>Config::get("jwt.ttl"),"refresh_ttl"=>Config::get("jwt.refresh_ttl")];
    }

    public function getCurrentUser()
    {
        return $this->user();
    }

}
