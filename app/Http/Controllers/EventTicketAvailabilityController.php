<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventTicketsAvailability;
use App\Models\TicketType;
use Illuminate\Http\Request;

class EventTicketAvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(EventTicketsAvailability $event)
    {
        return view('event_tickets_availability.index')->with('availability', $event->first());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EventTicketsAvailability $eventTicketAvailability)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventTicketsAvailability $eventTicketAvailability)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventTicketsAvailability $eventTicketAvailability)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventTicketsAvailability $eventTicketAvailability)
    {
        //
    }
}
