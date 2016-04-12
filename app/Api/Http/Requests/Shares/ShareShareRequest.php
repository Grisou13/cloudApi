<?php

namespace App\Api\Http\Requests\Shares;

use App\Api\Http\Requests\Request;
use Silber\Bouncer\Bouncer;

class ShareShareRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Bouncer $gate)
    {
        $share = $this->route("share");
        return $share->owner()->getResults()->id == $this->user()->id || $gate->allows("sharing",$share,$this->user());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "user"=>"required|exists:users,deleted_at,NOT_NULL"
        ];
    }
}