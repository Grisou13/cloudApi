<?php

namespace App\Api\Http\Requests\Calendars;

use App\Api\Http\Requests\Request;
use Silber\Bouncer\Bouncer;
class CalendarsEventUpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Bouncer $gate)
    {
        if($gate->allows("update-others-events",$this->user()) || $this->route("event")->owner()->getResults()->id == $this->user()->id )
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
        return CalendarEventStoreRequest::$rules;//just keep the same rules as for storing
    }
}
