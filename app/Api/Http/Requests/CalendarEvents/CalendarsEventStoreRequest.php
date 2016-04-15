<?php

namespace App\Api\Http\Requests\CalendarsEvent;

use App\Api\Http\Requests\Request;
use Silber\Bouncer\Bouncer;
class CalendarsEventStoreRequest extends Request
{
    public static $rules = [
        "summary"=>"required|min:1",
        "description"=>"sometimes|min:1",
        "location"=>"sometimes",
        "start_date"=>"required|date",
        "end_date"=>"required|date"

    ];
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //everybody can create a calendar event
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
