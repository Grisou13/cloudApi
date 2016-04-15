<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
class Share extends Model
{
    use ResourceModel,SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    //
    public function shareable()
    {
    	return $this->morphTo();
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
