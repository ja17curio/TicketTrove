<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Order;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard(string $user)
    {
        if (Auth::user()->id = $user){
            $user = User::where('id', $user)->first();
            $orders = Order::where('user_id', $user->id)->get();
            foreach ($orders as $order)
            {
                $order->tickets = Ticket::where('order_id', $order->id)->get();
            }
            if ($user->is_admin == 1)
            {
                $eventsMade = Event::where('creator', $user->id)->get();
                foreach($eventsMade as $event)
                {
                    $event->start = strtotime($event->start_datetime);
                    $event->start = date('d F Y, H:i', $event->start);
                    $event->end = strtotime($event->end_datetime);
                    $event->end = date('d F Y, H:i', $event->end);
                }
            }else{
                $eventsMade = null;
            }
            return view('dashboard', compact('user', 'orders', 'eventsMade'));
        }
        else{
           return view('home'); 
        }
    }
}
