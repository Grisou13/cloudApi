<?php

namespace App;

use App\Api\Repositories\FileRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use League\Flysystem\Util;


class Directory extends Model
{
    use ResourceModel,SoftDeletes;
    protected $table = "directories";
    protected $fillable=["path"];
    //protected $attributes = ["storage_path"=>"/"];
    protected $appends = ["files","storage_path","type","name"];

    protected function buildStoragePath()
    {
        return FileRepository::buildPathForUser($this->path,$this->owner()->getResults());
    }

    public function files()
    {
        //return $this->morphedByMany(File::class,"entity");
        return $this->hasMany(File::class,"folder_id");
    }
    public function getNameAttribute()
    {
        return Util::pathinfo($this->path)["basename"];
    }
    public function parent()
    {
        return $this->belongsTo(Directory::class,"parent_id");
    }
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeChildren(Builder $query,$directory_id)
    {
        //dd($directory);
        return $query->where("parent_id",$directory_id);
    }
    /* Dynamic Attributes*/
    public function getFilesAttribute()
    {
        return $this->files()->getResults();
    }
    /*public function setStoragePathAttribute($value)
    {
        return $this->attributes["storage_path"] = $this->buildStoragePath();
    }*/
    public function getStoragePathAttribute($value)
    {
        return $this->attributes["storage_path"] = $this->buildStoragePath();
    }
    public function setAppPathAttribute($value)
    {
        return str_replace("\\","/",$value);
    }

    public function getChildrenAttribute($value)
    {
        return $this->children()->get();
    }

    /*public function getContentAttribute()
    {
        //$repo = FileRepository::instanceForUser($this->owner());
        return array_merge($this->children()->get()->toArray(),$this->files()->getResults()->toArray());
    }*/
}
