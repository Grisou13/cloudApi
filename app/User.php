<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class User extends Authenticatable
{
    use HasRolesAndAbilities,SoftDeletes;


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function isSuperAdmin()
    {
       return($this->id == 1);
    }
    public function files()
    {
        return $this->hasMany(File::class,"owner_id");
    }
    public function contacts()
    {
        return $this->hasMany(Contact::class,"owner_id");
    }
    public function calendars()
    {
        return $this->hasMany(Calendar::class,"owner_id");
    }
    public function shares()
    {
        return $this->hasMany(Share::class,"owner_id");
    }


}
