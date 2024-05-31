<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;
use App\Models\User;

class EventSeeder extends Seeder {

    public function run(): void
    {

      Event::factory(10)->create();
    }
}
