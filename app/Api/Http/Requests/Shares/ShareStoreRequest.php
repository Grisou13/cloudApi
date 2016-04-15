<?php

namespace App\Api\Http\Requests\Shares;

use App\Api\Http\Requests\Request;

class ShareStoreRequest extends Request
{
    public static $rules = [

    ];
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//everybody can upload a file
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
