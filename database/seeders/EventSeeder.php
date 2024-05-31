<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;
use App\Models\User;

class EventSeeder extends Seeder {

    public function run(): void
    {

        $creator = User::where('is_admin', 1)->inRandomOrder()->first();

        Event::create([
            'name' => 'Test Evenementje',
            'location' => 'Oss',
            'start_datetime' => Carbon::now()->addDays(31)->toDateTimeString(),
            'end_datetime' => Carbon::now()->addDay(31)->addHours(8)->toDateTimeString(),
            'description' => 'Veel zuipen in Oss',
            'creator' => $creator->id,
        ]);

        Event::create([
            'name' => 'Test Evenementje1',
            'location' => 'Oss',
            'start_datetime' => Carbon::now()->addDays(31)->toDateTimeString(),
            'end_datetime' => Carbon::now()->addDay(31)->addHours(8)->toDateTimeString(),
            'description' => 'Veel zuipen in Oss x2',
            'creator' => $creator->id,
        ]);

        Event::create([
            'name' => 'Test Evenementje2',
            'location' => 'Breda',
            'start_datetime' => Carbon::now()->addDays(31)->toDateTimeString(),
            'end_datetime' => Carbon::now()->addDay(31)->addHours(8)->toDateTimeString(),
            'description' => 'Veel zuipen in Breda',
            'creator' => $creator->id,
        ]);

        Event::create([
            'name' => 'Test Evenementje3',
            'location' => 'Bergen op Zoom',
            'start_datetime' => Carbon::now()->addDays(31)->toDateTimeString(),
            'end_datetime' => Carbon::now()->addDay(31)->addHours(8)->toDateTimeString(),
            'description' => 'Veel zuipen in Bergen op Zoom',
            'creator' => $creator->id,
        ]);

        Event::create([
            'name' => 'Test Evenementje4',
            'location' => 'Roosendaal',
            'start_datetime' => Carbon::now()->addDays(31)->toDateTimeString(),
            'end_datetime' => Carbon::now()->addDay(31)->addHours(8)->toDateTimeString(),
            'description' => 'Veel zuipen in Roosendaal',
            'creator' => $creator->id,
        ]);
    }
}
