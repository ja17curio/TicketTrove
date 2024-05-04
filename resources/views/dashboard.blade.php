@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ __('Welcome') }} {{$user->name}}!</p>
                    <div>
                        @isset($orders)
                            <table class="table table-bordered">
                                @foreach($orders as $order)
                                    @php
                                        $price = 0;
                                        foreach ($order->tickets as $ticket)
                                        {
                                            $price += $order->event->availability->price;
                                        }
                                    @endphp
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Evenement</th>
                                            <th colspan="2" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prijs</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{$order->id}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{$order->event->name}}</td>
                                            <td colspan="2" class="px-6 py-4 whitespace-nowrap">{{$price}}</td>
                                        </tr>
                                    </tbody>
                                    <thead>
                                        <tr class="bg-red">
                                            <th class="px-6 py-4 whitespace-nowrap text-gray-500 uppercase">Ticket</td>
                                            <th class="px-6 py-4 whitespace-nowrap text-gray-500 uppercase">Ticketnaam</td>
                                            <th class="px-6 py-4 whitespace-nowrap text-gray-500 uppercase">Type ticket</td>
                                            <th class="px-6 py-4 whitespace-nowrap text-gray-500 uppercase">Gebruikt?</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->tickets as $ticket)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">{{$ticket->id}}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{$ticket->name}}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{$ticket->ticketType->type}}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{$ticket->is_scanned == 1 ? 'ja' : 'nee'}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    @endforeach
                            </table>
                        @endisset
                        @if($eventsMade != null)
                            <table class="table table-bordered">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Evenement</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Evenement naam</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Evenement locatie</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start dag en tijd</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Eind dag en tijd</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ticketprijs</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tickets</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @php
                                        $count = 0
                                    @endphp
                                    @foreach($eventsMade as $event)
                                        <?php
                                            $count += 1;
                                        ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $count}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $event->name}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $event->location }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $event->start }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $event->end }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $event->availability->price}}</td>
                                            @if($event->availability->available != 0)
                                                <td class="px-6 py-4 whitespace-nowrap">nog {{$event->availability->available}} tickets verkrijgbaar</td>
                                            @else
                                                <td>Alle tickets zijn uitverkocht</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
