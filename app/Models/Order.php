<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'order_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
