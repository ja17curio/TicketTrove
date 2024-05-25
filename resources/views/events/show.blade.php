@extends('layouts.app')

@section('content')
    <section class="main event-insight">
        @if (Auth::user()->is_admin)
            <div class="container">
                <div class="col inventory-column">
                    <h4>Inventaris</h4>
                    <p class="big-and-bold">{{ $event->availability->available }}/100</p>
                    <p>Kaartjes beschikbaar</p>
                </div>
                <div class="col winnings-column">
                    <h4>Omzet</h4>
                    <p class="big-and-bold">€{{ $event->availability->available * $event->availability->price }}</p>
                </div>
                <div class="col orders-column">
                    <h4>Orders</h4>

                    @foreach ($event->order as $order)
                        <p>{{ $order->id }}</p>
                    @endforeach
                </div>
            </div>
        @endif
    </section>
@endsection
