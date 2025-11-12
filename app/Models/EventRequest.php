<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class EventRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'event_type',
        'guests',
        'date',
        'message',
    ];
}