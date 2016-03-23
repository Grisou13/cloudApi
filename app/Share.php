<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Share extends Model
{
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    //
    public function shareable()
    {
    	return $this->morphTo();
    }
    public function owner()
    {
        return $this->belongsTo("App\\User");
    }
    public function participants()
    {
        return $this->belongsToMany("App\\User","user_share");
    }
    /*public function access()
    {
        return $this->hasOne("access");
    }*/
    /*public function getTypeAttribute($value)
    {
        return Str::snake(get_class($this->shareable));
    }*/
}
