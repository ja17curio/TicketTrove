@extends('layouts.app')

@section('content')
    <section class="payment">
        <div class="container">
            <h2>Nieuwe bestelling</h2>
        </div>
        <form action="{{ route('payments.store') }}" method="POST">
            <div class="container">
                <h4><x-icon icon="arrow-right" />Ticketoverzicht</h4>

            </div>
            <div class="container">
                <h4><x-icon icon="arrow-right" />Algemene gegevens</h4>
                <div class="form-input">
                    <label for="first-name" class="input-title">Voornaam</label>
                    <input class="input-value" type="text" name="first-name" id="first-name">
                    <label for="last-name" class="input-title">Achternaam</label>
                    <input class="input-value" type="text" name="last-name" id="last-name">
                </div>
                <div class="form-input">
                    <label for="email-address" class="input-title">Emailadres</label>
                    <input type="email" class="input-value" name="email-address" id="email-address">
                </div>
                <div class="form-input">
                    <label for="phone-number" class="input-title">Telefoon.Nr</label>
                    <input type="email" class="input-value" name="phone-number" id="phone-number">
                </div>
            </div>
            <div class="container">
                <h4><x-icon icon="arrow-right" />Betaling</h4>
            </div>
        </form>
    </section>
@endsection
