<?php
// calnedar management : https://gist.github.com/pamelafox-coursera/5359246
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Webpatser\Uuid\Uuid;

class CalendarEvent extends Model
{
    use SoftDeletes;

    protected $fillable = ["summary","description","location","start_date","end_date","status"];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at', "start_date","end_date"];

    /**
     * Returns the owner of the event, which is the owner of the calendar
     * @return Model
     */
    public function owner()
    {
        return $this->calendar()->owner();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function calendar()
    {
        return $this->belongsTo(Calendar::class);
    }

    /**
     * @param $value
     * @return Uuid
     * @throws \Exception
     */
    public function setUidAttribute($value)
    {
        return $this->attributes["uid"] = Uuid::generate();
    }
}
