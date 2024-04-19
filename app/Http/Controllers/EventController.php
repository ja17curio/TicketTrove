<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventTicketsAvailability;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        foreach($events as $event)
        {
            $event->start = strtotime($event->start_datetime);
            $event->start = date('d F Y, H:i', $event->start);
            $event->end = strtotime($event->end_datetime);
            $event->end = date('d F Y, H:i', $event->end);
        }
        return view('events.index', compact("events"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->is_admin = 1)
            return view('home');
        else
            return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'start_datetime' => 'required',
            'end_datetime' => 'required',
            'description' => 'required',
            'creator' => 'required'
        ]);

        Event::create($request->post());

        return redirect()->route('events.index')->with('succes','Event is aangemaakt');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
//        $events = Event::find($event->id);
        return $event;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
