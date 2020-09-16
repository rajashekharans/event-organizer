@extends('layout')

@section('content')
    <div class="py-5 text-center">
        <h2>Event List</h2>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th class="th-inner-sortable both">Name</th>
                    <th>Description</th>
                    <th>Event Type</th>
                    <th>Organizers</th>
                    <th>Venue</th>
                    <th>Date Time</th>
                    <th>Distance (KM)</th>
                    <th>Duration</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)

                    <tr>
                        <td>{{ $event['id'] }}</td>
                        <td>{{ $event['name'] }}</td>
                        <td>{{ $event['description'] }}</td>
                        <td>{{ $event['event_type']->name }}</td>
                        <td>
                            @foreach($event['event_organizers'] as $organizer)
                                {{$organizer->name}}<br/>
                            @endforeach
                        </td>
                        <td>{{ $event['venue']->name }}</td>
                        <td>{{ $event['date_time'] }}</td>
                        <td>{{ $event['distance'] * 0.001 }}</td>
                        <td>{{ gmdate('H:i:s',  $event['duration']) }}</td>
                        <td><a href="/events/{{ $event['id'] }}/edit">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection('content')
