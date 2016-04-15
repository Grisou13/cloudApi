<?php

namespace App;

use App\Api\Repositories\FileRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use League\Flysystem\Util;

class File extends Model
{
    use SoftDeletes,ResourceModel;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = ["filename"];
    //protected $attributes = ["full_path"];//add extra attributes to the model
    protected $appends = ["type","path","storage_path","name"];//add it to the json representation
    protected $hidden = [/*"storage_path","storage","filepath"*/];



    public function folder()
    {
        return $this->belongsTo(Directory::class);
    }

    public function getPathAttribute()
    {
        $path = $this->folder()->getResults()->path;
        $path = Str::endsWith($path,"/")?$path:$path."/";
        return $path.$this->attributes["filename"];
    }
    public function getStoragePathAttribute()
    {
        $path = $this->folder()->getResults()->storage_path;
        $path = Str::endsWith($path,"/")?$path:$path."/";
        return $path.$this->attributes["filename"];
    }
    public function getNameAttribute()
    {
        return $this->attributes["filename"];
    }
    /*
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
