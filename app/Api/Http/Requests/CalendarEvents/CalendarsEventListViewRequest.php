<?php

namespace App\Api\Http\Requests\CalendarsEvent;

use App\Api\Http\Requests\Request;
use Silber\Bouncer\Bouncer;
class CalendarsEventListViewRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Bouncer $gate)
    {
        return true;

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
