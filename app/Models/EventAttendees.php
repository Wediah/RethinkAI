<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventAttendees extends Model
{
    protected $guarded = [];

    public function event()
    {
        return $this->belongsTo(Events::class);
    }
}
