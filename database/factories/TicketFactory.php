<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\TicketType;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $order = Order::inRandomOrder()->first();
        $ticketType = TicketType::inRandomOrder()->first();

        return [
            'name' => fake()->text(),
            'is_scanned' => 0,
            'order_id' => $order->id,
            'ticket_type_id' => $ticketType->id,
            'is_available' => rand(0, 1),
        ];
    }
}
