@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Evenementen</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('example.create') }}">Nieuw evenement</a>
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
                <th>Naam</th>
                <th>Start datum</th>
                <th>Eind datum</th>
                <th>Aangemaakt door</th>
                <th>Actie</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($events as $event)
            <tr>
                <td>{{ $event->id }}</td>
                <td>{{ $event->name }}</td>
                <td>{{ $event->start_datetime }}</td>
                <td>{{ $event->end_datetime }}</td>
                <td>{{ $event->creator }}</td>
                <td>
                    <form action="{{ route('example.destroy',$event->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('example.edit',$event->id) }}">Bewerk</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Verwijder</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
