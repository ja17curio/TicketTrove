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
        $this->call(OrderSeeder::class);
        $this->call(EventTicketAvailabilitySeeder::class);
        $this->call(TicketSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(OutstandingBillSeeder::class);
    }
}
