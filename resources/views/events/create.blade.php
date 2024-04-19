@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Nieuw evenement</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('events.index') }}" enctype="multipart/form-data">
                    Terug</a>
            </div>
        </div>
    </div>

    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Evenement naam:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Evenement Name">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Locatie:</strong>
                    <input type="text" name="location" class="form-control" placeholder="Location">
                    @error('location')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Aanvang</strong>
                    <input type="datetime-local" name="start_datetime" class="form-control" placeholder="Start Datetime">
                    @error('start_datetime')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Einde</strong>
                    <input type="datetime-local" name="end_datetime" class="form-control" placeholder="End Datetime">
                    @error('end_datetime')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Omschrijving</strong>
                    <textarea class="form-control" name="description" placeholder="Omschrijving"></textarea>
                    @error('description')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <input type="hidden" name="creator" value="{{Auth::user()->id}}">

            <button type="submit" class="btn btn-primary ml-3">Submit</button>

        </div>
    </form>
</div>
@endsection