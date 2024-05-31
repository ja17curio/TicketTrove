@extends('layouts.app')
@section('content')
<div class="card-body">
    @if (session('error'))
        <div class="alert alert-warning" role="alert">
            {{ session('error') }}
        </div>
    @endif
</div>
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>gebruiker Instellingen</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('home') }}" enctype="multipart/form-data">
                            terug</a>
                    </div>
                </div>
            </div>
            <form action="{{ route('users.update', $user->id )}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Naam:</strong>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="{{ $user->name }}">
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="text" name="email"  value="{{ $user->email }}" class="form-control" placeholder="{{ $user->email }}">
                            @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nieuw Wachtwoord</strong>
                            <input type="password" name="password" value="" class="form-control">
                            @error('password')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Bevestig Nieuw wachtwoord</strong>
                            <input type="password" name="password_check" value="" class="form-control">
                            @error('password_check')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>
            </form>
        </div>
@endsection
