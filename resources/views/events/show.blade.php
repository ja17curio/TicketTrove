@extends('layouts.app')

@section('content')

    @auth
        @if (Auth::user()->is_admin)
            <section class="insight">
                <div class="container">
                    <table>
                        <tbody>
                        <td>
                            <h4>Aantal orders</h4>
                            <span>{{ count($event->order) }}</span>
                        </td>
                        <td>
                            <h4>Totale omzet</h4>
                            <span>€@php
                                    $total = 0.0;
                                    $price = $event->availability->price;

                                    foreach ($event->order as $order) {
                                        $total += count($order->tickets) * $price;
                                    }

                                    echo $total;
                                @endphp</span>
                        </td>
                        <td>
                            <h4>Inventaris</h4>
                            <span>Nog {{ $event->availability->available }} tickets beschikbaar</span>
                        </td>
                        <td>
                            <div class="col align-right">
                                <a href="{{ route('orders.index') }}"><i class="fa-regular fa-clipboard"></i>Naar orders</a>

                                <a href="{{ route('events.edit', $event) }}"><i
                                        class="fa-solid fa-pen-to-square"></i>Evenement bewerken</a>
                            </div>
                        </td>

                        </tbody>
                    </table>
                </div>
            </section>
        @endif
    @endauth
    <script>
        function incrementCounter(button) {
            const counter = button.previousElementSibling;
            counter.textContent = parseInt(counter.textContent) + 1;
        }

        function decrementCounter(button) {
            const counter = button.nextElementSibling;
            const currentValue = parseInt(counter.textContent);
            if (currentValue > 0) {
                counter.textContent = currentValue - 1;
            }
        }
    </script>

    <div class="d-flex justify-content-center align-items-center flex-column">
        @isset($event)
            <img src="https://www.wearetravellers.nl/wp-content/uploads/Grootste-festivals-nederland.jpg" alt="Gecentreerde Afbeelding" class="rounded-image mx-auto d-block">
            <h1 class="mt-5">{{$event->name}}</h1>
            <div class="row text-center w-100 mt-4">
                <div class="col-4 d-flex align-items-center flex-column h-100">
                    <i class="fas fa-calendar-alt mb-2" style="font-size: 2rem;"></i>
                    <span>{{\Carbon\Carbon::parse($event->start_datetime)->format('d-m-Y')}}</span>
                </div>
                <div class="col-4 d-flex align-items-center flex-column h-100">
                    <i class="fas fa-clock mb-2" style="font-size: 2rem;"></i>
                    <span>{{\Carbon\Carbon::parse($event->start_datetime)->format('H:i')}}</span>
                </div>
                <div class="col-4 d-flex align-items-center flex-column h-100">
                    <i class="fas fa-map-marker mb-2" style="font-size: 2rem;"></i>
                    <span>{{$event->location}}</span>
                </div>
            </div>
            <p class="mt-4">{{$event->description}}</p>
            @isset($ticketTypesAvailability)
                @foreach($ticketTypesAvailability as $ticketType)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="card-text">{{$ticketType->ticketType->type}}</p>
                                    <p class="card-text">${{$ticketType->price}}</p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-secondary btn-sm mr-2" onclick="decrementCounter(this)">-</button>
                                    <span class="counter">0</span>
                                    <button class="btn btn-secondary btn-sm ml-2" onclick="incrementCounter(this)">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endisset
        @endisset

        <button class="btn btn-primary">Koop Tickets</button>
    </div>
@endsection
