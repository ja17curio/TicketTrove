<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutstandingBill extends Model
{
    use HasFactory;

    public function payment()
    {
        return $this->hasOne(Payment::class, 'id');
    }

    public function status()
    {
        return $this->hasOne(StatusCode::class, 'id');
    }
}
