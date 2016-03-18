<?php

namespace App\Api\Http\Controllers;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller as IllumincateController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;

use JWTAuth;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException	;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException	;
use Symfony\Component\HttpKernel\Exception\GoneHttpException	;
use Symfony\Component\HttpKernel\Exception\HttpException	;

use Symfony\Component\HttpKernel\Exception\LengthRequiredHttpException	;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException	;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException	;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException	;
use Symfony\Component\HttpKernel\Exception\PreconditionFailedHttpException	;
use Symfony\Component\HttpKernel\Exception\PreconditionRequiredHttpException	;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException	;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException	;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException	;
use Symfony\Component\HttpKernel\Exception\UnsupportedMediaTypeHttpException	;

class Controller extends IllumincateController
{
    use Helpers, AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /*public function getAuthenticatedUser()
    {
        $user = false;
        $user = auth()->user();
        if($user)
            return $user;

        try {

            if (!$user = JWTAuth::parseToken()->authenticate()) {
                $user = \Illuminate\Database\Eloquent\Model::newInstance();
            }

        } catch (Exception $e) {

            $user = false;

        }
        if($user)
            return $user;

        /*$user = Authorizer::getResourceOwnerId();
        if($user)
            return $user;*

        $user = \Illuminate\Database\Eloquent\Model::newInstance();//an empty user

        
        // the token is valid and we have found the user via the sub claim
        return $user;
    }*/
}
