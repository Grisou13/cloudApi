<?php
namespace App\Api\Http\Requests\Files;

use App\Api\Http\Requests\Request;
use Bouncer;
use Dingo\Api\Auth\Auth;

class FileStoreRequest extends Request
{
    public static $rules = [
        "filepath"=>"required|min:2|unique:files,filepath",
        "upload"=>"required"
    ];
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//everybody can upload a file
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
