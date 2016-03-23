<?php
//contact management https://github.com/jeroendesloovere/vcard
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;
    protected $casts = [
        "emails"=>"object",
        "addresses"=>"object",
        "phoneNumbers"=>"object"
    ];
    protected $fillable = ["name","photo","emails","addresses","phoneNumbers","company","job_title"];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    public function shares()
    {
    	return $this->morphMany("App\\Share","shareable");
    }
    public function owner()
    {
        return $this->belongsTo("App\\Users","id","owner_id");
    }
}
