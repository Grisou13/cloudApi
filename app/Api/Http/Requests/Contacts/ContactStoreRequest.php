<?php

namespace App\Api\Http\Requests\Contacts;

use App\Api\Http\Requests\Request;

class ContactStoreRequest extends Request
{
    public static $rules = [
        "name"=>"required|mind:1",
        "photo"=>"sometimes|max:25000000",
        "emails"=>"sometimes",
        "addresses"=>"sometimes",
        "phoneNumbers"=>"sometimes",
        "company"=>"sometimes|min:1",
        "job_title"=>"sometimes|min:1"
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
