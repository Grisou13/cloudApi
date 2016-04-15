<?php

namespace App\Api\Http\Requests\Contacts;

use App\Api\Http\Requests\Request;

class ContactStoreRequest extends Request
{
    public static $rules = [
        "name"=>"required|min:1",
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
    public function authorize()
    {
        return true; //everybody can create a contact
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
