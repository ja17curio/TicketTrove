<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'location', 'start_datetime', 'end_datetime', 'description', 'creator' ];

    public function user()
    {
        return $this->belongsTo(User::class, 'creator');
    }

    public function availability()
    {
        return $this->hasOne(EventTicketsAvailability::class, 'event_id');
    }
}
