<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\StatusCode;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $order_id = Order::inRandomOrder()->first();
        $status_id = StatusCode::inRandomOrder()->first();

        return [
            'order_id' => $order_id,
            'status_id' => $status_id,
            'status_description' => fake()->text(20),
        ];
    }
}
