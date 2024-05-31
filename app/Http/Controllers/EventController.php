<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventTicketsAvailability;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        if (Auth::user()->is_admin = 0)
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
            'image' => 'required',
            'creator' => 'required'
        ]);
        // Event::create($request->post());
        $event = new event;
        $event->name = $_POST['name'];
        $event->location = $_POST['location'];
        $event->start_datetime = $_POST['start_datetime'];
        $event->end_datetime = $_POST['end_datetime'];
        $event->description = $_POST['description'];
        $event->creator = $_POST['creator'];

        $directory = public_path('eventImages');
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move($directory, $fileName);

        $event->image = 'eventImages/' . $fileName;
        $event->save();
        $eventId = $event->id;

        if(isset($_POST['earlybird'])){
            $eventtickets = new EventTicketsAvailability;
            $eventtickets->ticket_type_id = 1;
            $eventtickets->available = $_POST['earlybirdInput'];
            $eventtickets->price = $_POST['earlybirdPrice'];
            $eventtickets->event_id = $eventId;
            $eventtickets->save();
        }
        if(isset($_POST['regular'])){
            $eventtickets = new EventTicketsAvailability;
            $eventtickets->ticket_type_id = 2;
            $eventtickets->available = $_POST['regularInput'];
            $eventtickets->price = $_POST['regularPrice'];
            $eventtickets->event_id = $eventId;
            $eventtickets->save();
        }
        if(isset($_POST['vip'])){
            $eventtickets = new EventTicketsAvailability;
            $eventtickets->ticket_type_id = 3;
            $eventtickets->available = $_POST['vipInput'];
            $eventtickets->price = $_POST['vipPrice'];
            $eventtickets->event_id = $eventId;
            $eventtickets->save();
        }

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
        if($request->file('image') != null)
        {
            $directory = public_path('eventImages');
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($directory, $fileName);

            $event->image = 'eventImages/' . $fileName;
            $event->save();
        }
            

        return redirect()->route('events.index')->with('succes', 'Evenement is aangepast');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect()->route('events.index')->with('succes', 'Evenement is verwijderd');
    }
}
