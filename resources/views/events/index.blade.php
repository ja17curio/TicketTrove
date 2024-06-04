@extends('layouts.app')

@section('content')
    <section class="event-index">
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Evenementen</h2>
                    </div>
                    <div class="pull-right mb-2">
                        @auth
                            @if (Auth::user()->is_admin)
                                <a class="event-button dark-hover" href="{{ route('events.create') }}"><x-icon
                                        icon="plus" />Nieuw evenement</a>
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
            @if (Auth::check() && Auth::user()->is_admin)
                <div class="event-list">
                    @foreach ($events as $event)
                        <a href="{{ route('events.show', $event) }}" style="cursor:pointer;" class="event">
                            <span class="event-title">{{ $event->name }}</span>
                            <span class="event-location"><x-icon icon="location" />{{ $event->location }}</span>
                            <div class="event-timewindow">
                                <x-icon icon="clock" />
                                <span class="start-time">{{ $event->start }}</span>
                                <x-icon icon="arrow-right" />
                                <span class="end-time">{{ $event->end }}</span>
                            </div>
                            <span class="event-availability"><x-icon icon="ticket" />{{ $event->availability->available }}
                                beschikbaar</span>
                            <button class="event-button buy-tickets" href="/initiate_payments/{{ $event->id }}"><x-icon
                                    icon="ticket" />Tickets kopen</button>

                            <button class="event-button edit-event" href="{{ route('events.edit', $event) }}"><x-icon
                                    icon="pen-to-square" />Bewerken</button>
                            <button class="event-button remove-event" href=" {{ route('events.destroy', $event) }}"><x-icon
                                    icon="trash-can" />Verwijderen</button>


                        </a>
                    @endforeach
                </div>
            @else
                <div class="event-overview">
                    @foreach ($events as $event)
                        <a href="{{ route('events.show', $event) }}" style="cursor: pointer;" class="event">
                            <svg class="svg">
                                <clipPath id="circle" clipPathUnits="objectBoundingBox">
                                    <path
                                        d="M 1 0 L 0.4 0 C 0 0 1 0 1 0.6 L 1 0">
                                    </path>
                                </clipPath>
                            </svg>
                            <img class="event-banner" src="{{ $event->banner_path }}">
                            <span class="event-title">{{ $event->name }}</span>
                            <span class="event-location"><x-icon icon="location" />{{ $event->location }}</span>
                            <div class="event-timewindow">
                                <x-icon icon="clock" />
                                <span class="start-time">{{ $event->start }}</span>
                                <x-icon icon="arrow-right" />
                                <span class="end-time">{{ $event->end }}</span>
                            </div>
                            <span class="event-availability"><x-icon icon="ticket" />{{ $event->availability->available }}
                                beschikbaar</span>
                            <button class="event-button buy-tickets" href="/initiate_payments/{{ $event->id }}"><x-icon
                                    icon="ticket" />Tickets kopen</button>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
