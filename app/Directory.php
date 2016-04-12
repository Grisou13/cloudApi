<?php

namespace App;

use App\Api\Repositories\FileRepository;
use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
    protected $table = "directories";
    protected $fillable=["path"];
    protected $appends = ["content"];
    public function getContentAttribute()
    {
        $repo = FileRepository::instance($this->owner());
        return array_merge($repo->directories($this->attributes["path"]),$repo->files($this->attributes["path"]));
    }
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
    public function files()
    {
        return $this->hasMany(File::class);
    }
}
