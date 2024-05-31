@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Evenementen</h2>
            </div>
            <div class="pull-right mb-2">
                @auth
                    @if(Auth::user()->is_admin)
                        <a class="btn btn-success" href="{{ route('events.create') }}">Nieuw evenement</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Evenement</th>
                <th>Evenement naam</th>
                <th>Evenement locatie</th>
                <th>Start dag en tijd</th>
                <th>Eind dag en tijd</th>
                <th>Tickets</th>
                @auth
                    @if(Auth::user()->is_admin)
                        <th>Aangemaakt door</th>
                        <th>Actie</th>
                    @endif
                @endauth
            </tr>
        </thead>
        <tbody>
        @foreach ($events as $event)
            <tr onclick="window.location='{{ route('events.show', $event->id) }}';" style="cursor:pointer;">
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->location }}</td>
                    <td>{{ $event->start }}</td>
                    <td>{{ $event->end }}</td>
                    @if($event->availability->available != 0)
                        <td><a href="">Koop tickets</a></td>
                    @else
                        <td>Geen tickets verkrijgbaar</td>
                    @endif
                    @auth
                        @if(Auth::user()->is_admin)
                            <td>{{ $event->user->name }}</td>
                            <td>
                                <form action="{{ route('events.destroy',$event->id) }}" method="Post">
                                    <a class="btn btn-primary" href="{{ route('events.edit',$event->id) }}">Bewerk</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Verwijder</button>
                                </form>
                            </td>
                        @endif
                    @endauth
                </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
