<?php

namespace App\Api\Http\Requests\Users;

use App\Api\Http\Requests\Request;
use Silber\Bouncer\Bouncer;

class UserDestroyRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Bouncer $gate)
    {
        if($gate->is($this->user())->a("admin"))
            return true;
        if($this->get("user")->id == $this->user()->id)
            return true;
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
