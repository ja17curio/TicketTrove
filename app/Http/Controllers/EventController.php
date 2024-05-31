<?php

namespace App\Http\Controllers;

use App\Models\Event;
<<<<<<< Updated upstream
use Illuminate\Http\Request;
=======
use App\Models\EventTicketsAvailability;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
>>>>>>> Stashed changes

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Event $event)
    public function edit(string $id)
    {
        $event = Event::find($id);
        return view('events.edit', compact('event'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::find($id);

        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'start_datetime' => 'required',
            'end_datetime' => 'required',
            'description' => 'required'
        ]);

        $event->fill($request->post())->save();

        return redirect()->route('events.index')->with('succes', 'Evenement is aangepast');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = event::find($id);
        $event->delete();

        return redirect()->route('events.index')->with('succes', 'Evenement is verwijderd');
    }
}
