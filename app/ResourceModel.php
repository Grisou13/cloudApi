<?php
/**
 * Created by PhpStorm.
 * User: thomas.ricci
 * Date: 13.04.2016
 * Time: 08:50
 */

namespace App;


use Dingo\Api\Exception\ResourceException;
use Illuminate\Support\Str;

trait ResourceModel
{
    public function shares()
    {
        return $this->morphMany(Share::class,"shareable");
    }
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeForUser($query,$user)
    {
        $id = null;
        if($user instanceof User)//TODO: not sure if this works
            $id = $user->id;
        elseif(is_int($user) ||is_string($user))
            $id = $user;
        else
            throw new ResourceException("Could not get id from {$user} in model ".get_class($this));
        return $query->where("owner_id",$id);
    }
    public function getTypeAttribute()
    {
        //idea from http://php.net/manual/en/function.get-class.php#114568
        return $this->attributes["type"]=Str::lower($this->get_class_name($this));
    }
    private function get_class_name($cls)
    {
        $cls = get_class($cls);
        if ($pos = strrpos($cls, '\\')) return substr($cls, $pos + 1);
        return $pos;
    }
}