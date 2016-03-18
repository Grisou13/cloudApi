<?php
/**
 * Created by PhpStorm.
 * User: thomas.ricci
 * Date: 10.03.2016
 * Time: 08:50
 */

namespace App\Api\Models\Transformers;

use App\User;
use Dingo\Api\Http\Request;
use Dingo\Api\Transformer\Binding;
use Dingo\Api\Contract\Transformer\Adapter;
use Illuminate\Support\Str;

class ShareMutator implements Adapter
{

    /**
     * Transform a response with a transformer.
     *
     * @param mixed $response
     * @param object $transformer
     * @param \Dingo\Api\Transformer\Binding $binding
     * @param \Dingo\Api\Http\Request $request
     *
     * @return array
     */
    public function transform($response, $transformer, Binding $binding, Request $request)
    {
        //TODO: Finish the mutator with the user access writes
        /**
         * @var \App\Share
         */
        $share = $request->route("share");
        $share->load("participants");
        return [
            "id"=>$share->id,
            "owner"=>$share->owner()->id,
            "type"=>Str::snake(get_class($share->shareable)),
            "users"=>$share->participants()->withPivot("access")->each(function(User $user){
                $abilities = $user->getAbilities();//....
                return $user->id;
            })
        ];
    }
}