<?php

namespace App\Api\Http\Requests\Calendars;

use App\Api\Http\Requests\Request;
use Silber\Bouncer\Bouncer;
class CalendarDestroyRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->route("contact")->owner()->getResults()->id == $this->user()->id;
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
