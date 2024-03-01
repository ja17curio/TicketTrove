<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\Order;
use App\Models\TicketType;

class TickerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = Order::inRandomOrder()->first();
        $ticketType = TicketType::inRandomOrder()->first();
        Ticket::create([
            'name' => fake()->text(),
            'is_scanned' => 0,
            'order_id' => $order->id,
            'ticket_type_id' => $ticketType->id,
        ]);
    }
}
