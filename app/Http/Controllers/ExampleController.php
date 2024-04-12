<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view ('example.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('example.create');
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

        return redirect()->route('example.index')->with('succes','Event is aangemaakt');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
        dd($event);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
//        public function edit(Event $event)
    {
        $event = Event::find($id);
        return view('example.edit', compact('event'));
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

        return redirect()->route('example.index')->with('succes', 'Evenement is aangepast');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect()->route('example.index')->with('succes', 'Evenement is verwijderd');
    }

    //test function
    public function testfunctie()
    {
        dd('test functie');
    }

    //parameter is een int
    public function testfunctie2(int $event) {
        dd($event);
    }

    //parameter wordt gelijk omgezet naar een event
    public function testfunctie3(Event $event) {
        dd($event);
    }

//https://laravel.com/docs/10.x/eloquent
//https://laravel.com/docs/10.x/queries
//https://laravel.com/docs/10.x/eloquent-relationships

    public function testfunctie4() {
        // haal alle events op
//        $events = Event::all();

        // query builder
//        $events = Event::where('location', 'Breda')->orderBy('name')->take(1)->get();

        // get first event
//        $event = Event::first();
//
        // find event based on primary key
//        $event = Event::find(1);

        // relation in event
//        $events = Event::find(1)->user;

        //alt
//        $event = Event::where('id', 1)->first();

        //aggr functions (count, max, min, avg, sum)
//        $events = Event::count();

        //events with users
        $events = Event::with('user')->get();

        dd($events);
    }
}
