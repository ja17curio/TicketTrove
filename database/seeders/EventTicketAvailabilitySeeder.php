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
        $events = Event::all();
        $ticketTypes = TicketType::all();

        foreach ($ticketTypes as $ticketType) {
            foreach ($events as $event) {
                EventTicketsAvailability::create([
                    'available' => 100,
                    'price' => 12.50,
                    'ticket_type_id' => $ticketType->id,
                    'event_id' => $event->id,
                ]);
            }
        }
    }
}
