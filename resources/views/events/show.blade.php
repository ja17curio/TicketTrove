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
                                        $total +=  (count($order->tickets) * $price);
                                    }

                                    echo $total;
                                @endphp</span>
                            </td>
                            <td>
                                <h4>Inventaris</h4>
                                <span>Nog {{ $event->availability->available }} tickets beschikbaar</span>
                            </td>
                            <td class="align-right">
                                <a href="{{ route('orders.index') }}"><i class="fa-regular fa-clipboard"></i>Naar orders</a>
                            </td>
                            <td class="align-right">
                                <a href="{{ route('events.edit', $event) }}"><i class="fa-solid fa-pen-to-square"></i>Evenement bewerken</a>
                            </td>
                        </tbody>
                    </table>
                </div>
            </section>
        @endif
    @endauth
@endsection
