<?php
/**
 * Created by PhpStorm.
 * User: thomas.ricci
 * Date: 08.03.2016
 * Time: 14:55
 */

namespace App\Api\Http\Requests;


use Dingo\Api\Exception\ValidationHttpException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

abstract class Request extends FormRequest
{
    /**
     * Override to match the Dingo exceptions
     */
    protected function failedAuthorization()
    {
        throw new UnauthorizedHttpException("Unauthorized");
    }

    /**
     * Override to match the Dingo exceptions
     * @param Validator $validator
     * @return mixed|void
     */
    protected function failedValidation(Validator $validator)
    {
        //dd($validator);
        throw new ValidationHttpException($validator->errors());
    }
}
