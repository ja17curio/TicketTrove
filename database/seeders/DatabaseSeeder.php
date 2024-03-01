<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(TicketTypesSeeder::class);
        $this->call(EventTicketAvailability::class);
        $this->call(OrdersSeeder::class);
    }
}
