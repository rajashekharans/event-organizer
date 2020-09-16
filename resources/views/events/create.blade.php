@extends('layout')

@section('content')
    <div class="py-5 text-center">
        <h2>Create an Event</h2>
    </div>

    <div class="row">
        <div class="col-md-12 order-md-1">
            <h4 class="mb-3">Event Details</h4>
            <form class="needs-validation" method="post"  action="/events" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="Name">Event Name</label>
                    <input
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        id="eventName"
                        name="name"
                        placeholder=""
                        value="{{ old('name') }}"
                        required
                    >
                    <div class="invalid-feedback">
                        Valid event name is required.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description">Description</label>
                    <div class="input-group">
                        <textarea
                            class="form-control @error('description') is-invalid @enderror"
                            id="description"
                            name="description"
                            placeholder="Event Description"
                            required
                        >{{ old('description') }}</textarea>
                        <div class="invalid-feedback" style="width: 100%;">
                            Event description is required.
                        </div>
                    </div>
                </div>

                <div class=" mb-3">
                    <label for="venue">Event Type</label>
                    <select
                        class="custom-select d-block w-100 @error('event_type_id') is-invalid @enderror"
                        id="eventType"
                        name="event_type_id"
                        aria-multiselectable="true"
                        required
                    >
                        <option value="0">Choose...</option>
                        @foreach($eventTypes as $eventType)
                            <option
                                @if ($eventType->id == old('event_type_id')) selected @endif
                                value="{{ $eventType->id }}"
                            >
                                {{ $eventType->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid event type.
                    </div>
                </div>

                <div class=" mb-3">
                    <label for="venue">Organizer (Select one or more Organizers)    </label>
                    <select
                        class="custom-select d-block w-100 @error('organizers') is-invalid @enderror"
                        id="organizer"
                        name="organizers[]"
                        multiple
                        required
                    >
                        @foreach($organizers as $organizer)
                            <option
                                @if (old("organizers")) {{ (in_array($organizer->id, old("organizers")) ? "selected":"") }} @endif
                                value="{{ $organizer->id }}"
                            >
                                {{ $organizer->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid organizer.
                    </div>
                </div>

                <div class=" mb-3">
                    <label for="venue">Venue</label>
                    <select
                        class="custom-select d-block w-100 @error('venue_id') is-invalid @enderror"
                        id="venue"
                        name="venue_id"
                        required
                    >
                        <option value="0">Choose...</option>
                        @foreach($venues as $venue)
                            <option
                                @if ($venue->id == old('venue_id')) selected @endif
                                value="{{ $venue->id }}"
                            >
                                {{ $venue->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid venue.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="eventDateTime">Event Date Time</label>
                    <input
                        type="datetime-local"
                        class="form-control @error('date_time') is-invalid @enderror"
                        id="eventDateTime"
                        name="date_time"
                        placeholder=""
                        value="{{ old('date_time') }}"
                        required
                    >
                    <div class="invalid-feedback">
                        Valid event date time is required.
                    </div>
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Create Event</button>
            </form>
        </div>
    </div>
@endsection('content')
