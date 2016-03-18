<?php

namespace App;

use App\Share;
use Illuminate\Database\Eloquent\Model;

class ShareLink extends Model
{
    protected $fillable =["url","expires","token"];
    protected $dates = ["created_at"];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function share()
    {
        return $this->belongsTo(Share::class);
    }
}
