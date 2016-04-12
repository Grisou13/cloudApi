<?php

namespace App;

use App\Api\Repositories\FileRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use League\Flysystem\Util;

class File extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = ["filename"];
    //protected $attributes = ["full_path"];//add extra attributes to the model
    protected $appends = ["type"/*"full_path","folder","filename"*/];//add it to the json representation
    protected $hidden = [/*"storage_path","storage","filepath"*/];


    public function shares()
    {
    	return $this->morphMany("App\\Share","shareable");
    }
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
    public function folder()
    {
        return $this->belongsTo(Directory::class);
    }
    public function getTypeAttribute()
    {
        return $this->attributes["type"]="file";
    }
    /*public function getFolderAttribute()
    {
        return str_replace("\\","/",Util::pathinfo($this->folder()->getResults()->app_path)["dirname"]);
    }
    public function getFilenameAttribute()
    {
        return Util::pathinfo($this->attributes["filepath"])["basename"];
    }
    public function getFullPathAttribute()
    {
        return $this->attributes["filepath"];
    }
    public function setFilepathAttribuet($value)
    {
        return str_replace("\\","/",$value);
    }*/

}
