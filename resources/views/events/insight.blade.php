@extends('layouts.app')

@section('content')
    <section class="main event-insight">
        @if (Auth::check())
            @auth
                @if (Auth::user()->is_admin)
                    <div class="container">
                        <div class="col">
                            <a href="{{ route('events.show', $event) }}"><i class="fas fa-arrow-left"></i>Terug naar
                                detailpagina</a>
                        </div>
                    </div>
                    <div class="container">
                        <div class="col inventory-column">
                            <h4>Inventaris</h4>
                            <p class="big-and-bold">{{ $event->availability->available }}/100</p>
                            <p>Kaartjes beschikbaar</p>
                        </div>
                        <div class="col winnings-column">
                            <h4>Omzet</h4>
                            <p class="big-and-bold">€{{ $event->availability->available * $event->availability->price }}</p>
                            <p>{{ count($event->order) }} orders gemaakt</p>
                        </div>
                        <div class="col orders-column">
                            <h4>Orders</h4>

                            <table>
                                <thead>
                                    <th>
                                        OrderNr.
                                    </th>
                                    <th>
                                        Gebruiker
                                    </th>
                                    <th>
                                        Aantal Prod.
                                    </th>
                                    <th>
                                        Totaal
                                    </th>
                                    <th>
                                        Acties
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($event->order as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ count($order->tickets) }}</td>
                                            <td>€{{ count($order->tickets) * $event->availability->price }}</td>
                                            <td><a href="{{ route('orders.show', $order) }}"><i
                                                        class="fa-solid fa-clipboard"></i>Toon order</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="error-container">
                        <p>U heeft niet genoeg rechten om deze pagina te betreden</p>
                    </div>
                @endif
            @endauth
        @else
            <div class="container">
                <a href="{{ route('events.index') }}"><i class="fas fa-arrow-left"></i>Terug naar
                    evenementenoverzicht</a>
                <div class="error-container">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <p>U bent niet ingelogd</p>
                </div>
            </div>
        @endif
    </section>
@endsection
