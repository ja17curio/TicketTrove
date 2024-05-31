<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function status()
    {
        return $this->hasOne(StatusCode::class, 'id');
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'id');
    }
}
