<?php

namespace App\Api\Http\Requests\Contacts;

use App\Api\Http\Requests\Request;
use Silber\Bouncer\Bouncer;

class ContactListViewRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Bouncer $gate)
    {

        if($gate->allows("view-others-contacts",$this->user()) || $this->route("contact")->owner()->getResults()->id == $this->user()->id){
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
