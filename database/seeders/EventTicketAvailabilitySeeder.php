<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\TicketType;
use App\Models\EventTicketsAvailability;
use Illuminate\Database\Seeder;

class EventTicketAvailabilitySeeder extends Seeder
{

    public function run(): void
    {
        $tickettype = TicketType::inrandomorder()->first();
        $events = Event::all();

        foreach ($events as $event) {
            EventTicketsAvailability::create([
                'available' => 100,
                'price' => 12.50,
                'ticket_type_id' => $tickettype->id,
                'event_id' => $event->id,
            ]);
        }
    }
}
