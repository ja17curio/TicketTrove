<?php

namespace Database\Seeders;

use App\Models\TicketType;
use Illuminate\Database\Seeder;

class TicketTypesSeeder extends Seeder
{
    public function run(): void
    {

        TicketType::create([
            'type' => 'Early bird'
        ]);

        TicketType::create([
            'type' => 'Normal'
        ]);

        TicketType::create([
            'type' => 'VIP'
        ]);
    }
}
