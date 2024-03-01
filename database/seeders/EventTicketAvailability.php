<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventTicketAvailability extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventTicketAvailability::create([
            'available' => '',
            'price' => 12,
            'ticket_type_id' => 1,
            'event_id' => 1,
        ]);
    }
}
Schema::create('event_tickets_availablity', function (Blueprint $table) {
    $table->id();
    $table->timestamps();
    $table->unsignedBigInteger("available");
    $table->double("price");
    $table->unsignedBigInteger("ticket_type_id");
    $table->unsignedBigInteger("event_id");

    $table->foreign("event_id")->references("id")->on("events");
    $table->foreign("ticket_type_id")->references("id")->on("ticket_types");
});