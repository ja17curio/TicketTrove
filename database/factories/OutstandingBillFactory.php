<?php

namespace Database\Factories;

use App\Models\StatusCode;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OutstandingBill>
 */
class OutstandingBillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $payment_id = Payment::inRandomOrder()->first();
        $status_id = StatusCode::inRandomOrder()->first();

        return [
            'payment_id' => $payment_id,
            'status_id' => $status_id,
            'notes' => fake()->text(),
        ];
    }
}
