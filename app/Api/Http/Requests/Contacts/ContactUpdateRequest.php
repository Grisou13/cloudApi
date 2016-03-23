<?php

namespace App\Api\Http\Requests\Contacts;

use App\Api\Http\Requests\Request;

class ContactUpdateRequest extends Request
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
        return ContactStoreRequest::$rules;//just keep the same rules as for storing
    }
}
