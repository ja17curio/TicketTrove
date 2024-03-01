<?php

namespace Database\Seeders;

use App\Models\TicketType;
use Illuminate\Database\Seeder;

class TicketTypesSeeder extends Seeder
{
    public function run(): void
    {
        TicketType::create([
            'type' => 'Dit is een test typeje'
        ]);

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
