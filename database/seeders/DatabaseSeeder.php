<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(TicketTypesSeeder::class);
        $this->call(EventTicketAvailability::class);
        $this->call(OrdersSeeder::class);
        // orders
        // ticket availability
        // tickets
    }
}
