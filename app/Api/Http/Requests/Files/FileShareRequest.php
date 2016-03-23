<?php
/**
 * Created by PhpStorm.
 * User: thomas.ricci
 * Date: 23.03.2016
 * Time: 09:26
 */

namespace App\Api\Http\Requests\Files;


use App\Api\Http\Requests\Request;

class FileShareRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $file = $this->get("file");
        return $file->owner() == $this->user();
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