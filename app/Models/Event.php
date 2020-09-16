<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $casts = [
        'date_time' => 'datetime',
    ];

    public function eventTypes()
    {
        return EventType::find($this->event_type_id);
    }

    public function eventOrganizers()
    {
        $organizerList = [];
        $eventOrganizers = EventOrganizer::where('event_id', $this->id)->get();

        foreach($eventOrganizers as $eventOrganizer) {
            $organizerList[] = Organizer::find($eventOrganizer->organizer_id);
        }
        return $organizerList;
    }

    public function venues()
    {
        return Venue::find($this->venue_id);
    }
}
