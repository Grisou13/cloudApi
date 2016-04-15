<?php

namespace App\Api\Http\Requests\Calendars;

use App\Api\Http\Requests\Request;
use Silber\Bouncer\Bouncer;
class CalendarStoreRequest extends Request
{
    public static $rules = [
        "title"=>"required|min:1"

    ];
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //everybody can create a contact
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
