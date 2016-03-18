<?php
// calnedar management : https://gist.github.com/pamelafox-coursera/5359246
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Calendar extends Model
{
    use SoftDeletes;
    protected $fillable = ["title"];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    /*Relations...*/
    /**
     * Get the shares for the calendar
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function shares()
    {
    	return $this->morphMany("App\\Share","shareable");
    }
    public function events()
    {
        return $this->hasMany("App\\Event");
    }
    public function owner()
    {
        return $this->belongsTo("App\\User");
    }
    public function setTitleAttribute($value)
    {
        if(!empty($value))
            return $this->attributes["title"] = $value;
        $count = $this->all()->count()+1;
        return $this->attributes["title"] = "Calendar {$count}";
    }
}
