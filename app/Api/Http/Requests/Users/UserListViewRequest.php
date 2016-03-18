<?php

namespace App\Api\Http\Requests\Users;

use App\Api\Http\Requests\Request;
use Bouncer;

class UserListViewRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = app('Dingo\Api\Auth\Auth')->user();
        if(Bouncer::is($user)->a("admin") || Bouncer::allow("view-users",$user)){
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
        return [
            //
        ];
    }
}
