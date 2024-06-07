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

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Evenement afbeelding</strong>
                    <input type="file"  accept=".jpg,.jpeg,.png,.pdf" class="form-control" name="image">
                    @error('image')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ticket Types en Hoeveelheid</strong><br>
                    <input type="checkbox" id="earlybirdCheckbox" @if(old('earlybird')) checked @endif name="earlybird"> Early Bird<br>
                    <div class="col-xs-4 col-sm-4 col-md-4" id="earlybirdInputContainer" style="display: none;">
                        <div class="form-group">
                            <label for="earlybirdInput">Early Bird aantal tickets:</label>
                            <input type="number" id="earlybirdInput" class="form-control" name="earlybirdInput">
                        </div>
                        <div class="form-group">
                            <label for="earlybirdInput">Early Bird prijs in €:</label>
                            <input type="number" id="earlybirdInput" class="form-control" name="earlybirdPrice" step="0.01">
                        </div>
                    </div>
                    <input type="checkbox" id="regularCheckbox" @if(old('regular')) checked @endif name="regular"> Regular<br>
                    <div class="col-xs-4 col-sm-4 col-md-4" id="regularInputContainer" style="display: none;">
                        <div class="form-group">
                            <label for="regularInput">Normaal aantal tickets:</label>
                            <input type="number" id="regularInput" class="form-control" name="regularInput">
                        </div>
                        <div class="form-group">
                            <label for="regularInput">Normaal prijs in €:</label>
                            <input type="number" id="regularInput" class="form-control" name="regularPrice" step="0.01">
                        </div>
                    </div>
                    <input type="checkbox" id="vipCheckbox" @if(old('vip')) checked @endif name="vip"> VIP<br>
                    <div class="col-xs-4 col-sm-4 col-md-4" id="vipInputContainer" style="display: none;">
                        <div class="form-group">
                            <label for="vipInput">VIP aantal tickets:</label>
                            <input type="number" id="vipInput" class="form-control" name="vipInput">
                        </div>
                        <div class="form-group">
                            <label for="vipInput">VIP prijs in €:</label>
                            <input type="number" id="vipInput" class="form-control" name="vipPrice" step="0.01">
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="creator" value="{{Auth::user()->id}}">

            <button type="submit" class="btn btn-primary ml-3">Submit</button>

        </div>
    </form>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = [
            { checkbox: document.getElementById('earlybirdCheckbox'), container: document.getElementById('earlybirdInputContainer') },
            { checkbox: document.getElementById('regularCheckbox'), container: document.getElementById('regularInputContainer') },
            { checkbox: document.getElementById('vipCheckbox'), container: document.getElementById('vipInputContainer') },
        ];

        // Show or hide the input based on the checkbox state on page load
        checkboxes.forEach(item => {
            if (item.checkbox.checked) {
                item.container.style.display = 'block';
            }
        });

        // Add event listeners to toggle the input fields
        checkboxes.forEach(item => {
            item.checkbox.addEventListener('change', function () {
                if (item.checkbox.checked) {
                    item.container.style.display = 'block';
                } else {
                    item.container.style.display = 'none';
                }
            });
        });
    });
</script>