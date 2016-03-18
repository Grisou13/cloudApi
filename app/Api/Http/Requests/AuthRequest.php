<?php

namespace App\Api\Http\Requests;

class AuthRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {

        return true;//everybody can authenticate....

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "email"=>"required",
            "password"=>"required"
        ];
    }
}
