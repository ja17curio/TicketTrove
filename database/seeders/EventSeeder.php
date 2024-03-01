<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;
use App\Models\User;

class EventSeeder extends Seeder {

    public function run(): void
    {

        $creator = User::inRandomOrder()->first();

        Event::create([
            'name' => 'Test Evenementje',
            'location' => 'Oss',
            'start_datetime' => Carbon::now()->addDays(31)->toDateTimeString(),
            'end_datetime' => Carbon::now()->addDay(31)->addHours(8)->toDateTimeString(),
            'description' => 'Veel zuipen in Oss',
            'creator' => $creator->id,
        ]);
    }
}
