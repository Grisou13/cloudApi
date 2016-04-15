<?php
namespace App\Api\Http\Requests\Files;

use Bouncer;
use App\Api\Http\Requests\Request;

class FileUpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        /*$user = app("Dingo\\Api\\Auth\\Auth")->user();
        if(Bouncer::allow("update-user",$user) || $this->route("user")->id == $user->id){
            return true;
        }
        return false;*/
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return ["upload"=>FileStoreRequest::$rules["upload"]];//just keep the same rules as for storing
    }
}
