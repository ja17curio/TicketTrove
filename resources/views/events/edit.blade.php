@extends('layouts.app')
@auth
    @if(Auth::user()->is_admin)

        @section('content')
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Bewerk evenement</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('events.index') }}" enctype="multipart/form-data">
                            Back</a>
                    </div>
                </div>
            </div>

            <form action="{{ route('events.update',$event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Evenement naam:</strong>
                            <input type="text" name="name" value="{{ $event->name }}" class="form-control" placeholder="Evenement naam">
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>locatie:</strong>
                            <input type="text" name="location"  value="{{ $event->location }}" class="form-control" placeholder="adres">
                            @error('location')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Begin datum</strong>
                            <input type="datetime-local" name="start_datetime" value="{{ $event->start_datetime }}" class="form-control">
                            @error('start_datetime')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Eind datum</strong>
                            <input type="datetime-local" name="end_datetime" value="{{ $event->end_datetime }}" class="form-control">
                            @error('end_datetime')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Omschrijving</strong>
                        <textarea class="form-control" name="description">{{ $event->description }}</textarea>
                            @error('description')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    
                    <div class="col-xs-12 col-sm-12 col-md-12 pb-3">
                        <div class="form-group">
                            <strong>Evenement afbeelding</strong>
                            <input type="file"  accept=".jpg,.jpeg,.png,.pdf" class="form-control" name="image">
                            @error('image')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex flex-column">
                            <strong>Huidig Evenement afbeelding</strong>
                            <img class="w-25" src="{{asset($event->image)}}" alt="oops">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>
            </form>
        </div>
    @endif

@endauth

@endsection
