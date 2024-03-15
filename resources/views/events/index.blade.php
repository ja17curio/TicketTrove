@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
<table>
    <thead>
        <tr>
            <th>Naam</th>
            <th>Locatie</th>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
            <tr>
                <td>{{$event->name}}</td>
                <td>{{$event->location}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

                        <table>
                            <thead>
                            <tr>
                                <th>Naam</th>
                                <th>Locatie</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($events2 as $event)
                                <tr>
                                    <td>{{$event->name}}</td>
                                    <td>{{$event->location}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
