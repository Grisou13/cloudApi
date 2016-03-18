<?php
// calnedar management : https://gist.github.com/pamelafox-coursera/5359246
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Webpatser\Uuid\Uuid;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable = ["summary","description","location","start_date","end_date","status"];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at',"start_date","end_date"];

    /**
     * Returns the owner of the event, which is the owner of the calendar
     * @return \App\User
     */
    public function owner()
    {
        return $this->calendar()->owner();
    }
    public function calendar()
    {
        return $this->belongsTo("App\\Calendar");
    }
    public function setUidAttribute($value)
    {
        return $this->attributes["uid"] = Uuid::generate();
    }
}
