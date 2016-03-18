<?php

namespace App\Api\Http\Requests\Users;

use App\Api\Http\Requests\Request;
use Bouncer;
use Dingo\Api\Auth\Auth;

class UserShowRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = app(Auth::class)->user();
        if(Bouncer::is($user)->a("admin") ||
            $this->get("user")->id == $user->id)
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
