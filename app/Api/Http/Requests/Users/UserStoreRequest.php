<?php

namespace App\Api\Http\Requests\Users;

use App\Api\Http\Requests\Request;
use Bouncer;
use Dingo\Api\Auth\Auth;

class UserStoreRequest extends Request
{
    public static $rules = [
        "email"=>"required|email|unique:email",
        "username"=>"required|min:6",
        "password"=>"required|min:6"
    ];
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Auth $auth)
    {

        if(Bouncer::allow("create-users",$auth->user())){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return static::$rules;
    }
}
