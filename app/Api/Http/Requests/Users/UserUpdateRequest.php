<?php

namespace App\Api\Http\Requests\Users;

use App\Api\Http\Requests\Request;
use Bouncer;

class UserUpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        /*$user = app("Dingo\\Api\\Auth\\Auth")->user();
        if(Bouncer::allow("update-user",$user) || $this->route("user")->id == $user->id){
            return true;
        }
        return false;*/
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return UserStoreRequest::$rules;//just keep the same rules as for storing
    }
}
