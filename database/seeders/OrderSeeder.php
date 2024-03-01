<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use App\Models\Event;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $events = Event::all();

        foreach ($users as $user) {
            foreach ($events as $event) {
                Order::create([
                    'created_at' => now(),
                    'updated_at' => now(),
                    'user_id' => $user->id,
                    'event_id' => $event->id,
                ]);
            }
        }
    }
}
