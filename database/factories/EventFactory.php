<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $creator = User::where('is_admin', 1)->inRandomOrder()->first();
        $bannerPaths = [
            '/assets/events/thunderdome.jpg',
            '/assets/events/defqon1.jpg',
            '/assets/events/intents.jpeg',
            '/assets/events/wish-outdoor.jpg'
        ];

        return [
            'name' => fake()->streetName(),
            'location' => fake()->city(),
            'start_datetime' => fake()->dateTime(),
            'end_datetime' => fake()->dateTime(),
            'description' => fake()->sentence(),
            'creator' => $creator->id,
            'banner_path' => $bannerPaths[rand(0, count($bannerPaths) - 1)],
        ];
    }
}
