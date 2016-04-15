<?php

namespace App\Api\Http\Requests\Shares;

use App\Api\Http\Requests\Request;
use Silber\Bouncer\Bouncer;
use Silber\Bouncer\Database\Role;

class ShareAclUpdateRequest extends Request
{
    public function __construct(array $query, array $request, array $attributes, array $cookies, array $files, array $server, $content,Bouncer $gate)
    {
        parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);
        $this->gate = $gate;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        return $this->route("share")->owner()->getResults()->id == $this->user()->id || $this->route("user")->allows("update-acl",$this->route("share"));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "ability"=>"required|exists:abilities,name",
            "user"=>"required|exists:users"
        ];
    }
}
