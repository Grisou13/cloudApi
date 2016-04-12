<?php

namespace App\Policies;

use App\Share;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SharePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function sharing(Share $share, User $user)
    {
        //TODO IMPLEMENT ACL FOR SHARING
        //if the user is a participant
            //if the user has the abality to share this share
        //if the user is the owner of the share
        Bouncer::allows("sharing",$share)
        if($share->with("participants")->withPivot("role")->where("ability","=","share"))
            return true;
        return false;
    }
}
