<?php

namespace App\Http\Controllers;

use App\Client\DirectionsClient;
use App\Models\Event;
use App\Models\EventOrganizer;
use App\Models\EventType;
use App\Models\Organizer;
use App\Models\School;
use App\Models\Venue;
use Illuminate\Http\Request;
use App\Http\Resources\Event as EventResource;
use Illuminate\View\View;

class EventsController extends Controller
{
    private const DEFAULT_SCHOOL_ID = 1;
    private $directionsClient;

    public function __construct(DirectionsClient $directionsClient)
    {
        $this->directionsClient = $directionsClient;
    }

    public function index(Request $request): View
    {
        if ( null != $request->query('sortby')) {
          $events =  EventResource::collection(Event::orderBy(
              $request->query('sortby'),
              $request->query('order')?: 'asc')
              ->paginate());
        }
        else if ( null != $request->query('filter')) {
            $events =  EventResource::collection(Event::where(
                $request->query('filter'),
                $request->query('condition')?: '=',
                $request->query('filtervalue'))
                ->paginate());
        } else {
            $events = EventResource::collection(Event::paginate());
        }

        return view('events.list', [
            'events' => $events->jsonSerialize()
        ]);
    }

    public function create()
    {
        return view( 'events.create', [
            'eventTypes' => EventType::all(),
            'organizers' => Organizer::all(),
            'venues' => Venue::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date_time' => 'required',
            'event_type_id' => 'required|gt:0',
            'venue_id' => 'required|gt:0',
            'organizers' => 'required|array'
        ]);

        $result = $this->directionsClient->getDistanceAndDuration(
            'mapbox',
            Venue::find($validatedData['venue_id']),
            School::find(self::DEFAULT_SCHOOL_ID)
        );

        $event = Event::forceCreate([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'date_time' => $validatedData['date_time'],
            'event_type_id' => $validatedData['event_type_id'],
            'venue_id' => $validatedData['venue_id'],
            'distance_from_school' => $result['distance'],
            'duration_from_school' => $result['duration']
        ]);
        foreach($validatedData['organizers'] as $organizer){
            EventOrganizer::forceCreate([
                'event_id' => $event->id,
                'organizer_id' => $organizer,
            ]);
        }

        return redirect('/events');
    }


    public function show(Event $event)
    {
        return new EventResource($event);
    }

    public function edit(Event $event)
    {
        return view( 'events.edit', [
            'event' => new EventResource($event),
            'event_organizers' => EventOrganizer::where('event_id', $event->id)->pluck('id')->toArray(),
            'eventTypes' => EventType::all(),
            'organizers' => Organizer::all(),
            'venues' => Venue::all(),
        ]);
    }

    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date_time' => 'required',
            'event_type_id' => 'required|gt:0',
            'venue_id' => 'required|gt:0',
            'organizers' => 'required|array'
        ]);

        if ($event->venue_id != $validatedData['venue_id']) {
            $result = $this->directionsClient->getDistanceAndDuration(
                'mapbox',
                Venue::find($validatedData['venue_id']),
                School::find(self::DEFAULT_SCHOOL_ID)
            );
            $event->forceFill([
                'distance_from_school' => $result['distance'],
                'duration_from_school' => $result['duration']
            ]);
        }
        $event->forceFill([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'date_time' => $validatedData['date_time'],
            'event_type_id' => $validatedData['event_type_id'],
            'venue_id' => $validatedData['venue_id'],
        ])->save();

        EventOrganizer::where('event_id', $event->id)->forceDelete();

        foreach($validatedData['organizers'] as $organizer){
            EventOrganizer::forceCreate([
                'event_id' => $event->id,
                'organizer_id' => $organizer,
            ]);
        }

        return redirect('/events');
    }
}
