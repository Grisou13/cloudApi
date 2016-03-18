<?php

namespace App;

use App\Api\Repositories\FileRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class File extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = ["folder","filename","storage_path"];
    //protected $attributes = ["full_path"];//add extra attributes to the model
    protected $appends = ["full_path"];//add it to the json representation
    protected $hidden = ["storage_path","storage"];

    public function shares()
    {
    	return $this->morphMany("App\\Share","shareable");
    }
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
    public function setFolderAttribute($value)
    {
        $path = Str::startsWith("/",$value)?$value:"/".$value;
        //$path = Str::endsWith("/",$value)?substr($value,0,strlen($value)-1):$value;
        return $this->attributes["folder"] = $path;
    }
    public function setFilenameAttribute($value)
    {
        return $this->attributes["filename"] = basename($value);
    }
    public function getFullPathAttribute()
    {
        $path = $this->attributes["folder"];
        $path = Str::endsWith("/",$path)?substr($path,0,strlen($path)-1):$path;
        return $path."/".$this->attributes["filename"];
    }

}
