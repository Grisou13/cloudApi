<?php

namespace App\Api\Http\Requests\Shares;

use App\Api\Http\Requests\Request;
use Silber\Bouncer\Bouncer;

class ShareListViewRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Bouncer $gate)
    {
        if($gate->allows("view-others-shares",$this->user()) ||
            $this->route("share")->owner()->getResults()->id == $this->user()->id
        ){
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
