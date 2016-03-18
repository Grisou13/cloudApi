<?php
/**
 * Created by PhpStorm.
 * User: thomas.ricci
 * Date: 11.03.2016
 * Time: 08:15
 */

namespace App\Api\Auth;
use Auth;
//use Illuminate\Contracts\Validation\UnauthorizedException;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Route;
use Dingo\Api\Contract\Auth\Provider;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

/**
 * Class LaravelProvider
 * @package App\Api\Auth
 */
class LaravelProvider implements Provider
{

    /**
     * Authenticate the request and return the authenticated user instance.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Dingo\Api\Routing\Route $route
     *
     * @return mixed
     */
    public function authenticate(Request $request, Route $route)
    {
        //TODO: Try and figure why the session is not remembering the user
        if(Auth::check())
            return Auth::user();
        /*if(Auth::attempt($request->only("email","password")))
            return Auth::user();*/
        throw new UnauthorizedHttpException("Invalid credentials");
    }
}