@extends('layout')

@section('content')
    <div class="py-5 text-center">
        <h2>Event Organizer</h2>
    </div>
    <div class="row">
        <div class="col-md-12 order-md-1 text-center">
            <div class="mb-3"><a href="/events/create">Create an event</a></div>
            <div class="mb-3"><a href="/events">List all event</a></div>
        </div>
    </div>
@endsection('content')


