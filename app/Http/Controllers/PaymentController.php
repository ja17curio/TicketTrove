<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\StatusCode;
use App\Models\EventTicketsAvailability;
use App\Models\TicketType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class PaymentController extends Controller
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
    public function create(Request $request)
    {
        $event = Event::find($request->input('event_id'));
        $availableTicketTypes = TicketType::all();
        $availability = EventTicketsAvailability::where('event_id', '==', $request->input('event_id'))->get();

        return view('payments.create', ['event' => $event, 'ticketTypes' => $availableTicketTypes, 'availability' => $availability]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            redirect(route('403'));
        }

        $event_id = $request->input('event_id');
        $order = new Order();
        $order->event_id = $event_id;
        $order->user_id = Auth::user()->id;
        $order->save();

        $payment = new Payment();
        $payment->order_id = $order->id;
        $payment->status_id = 2;
        $payment->status_description = 'has_outstanding_bill';
        $payment->save();

        redirect()->route('payments.show', ['payment' => $payment]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
