<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // protected $fillable = [
    //     'eventName', 'venue', 'date', 'eventType', 'description',
    // ];

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
