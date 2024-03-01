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
        $users = User::inRandomOrder()->first();
        $events = Event::inRandomOder()->first();

       
        Order::create([

            'user_id' => $user->id,
            'event_id' => $event->id,
        ]);
    }
}
