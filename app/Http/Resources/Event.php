<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Event extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'event_type' => $this->eventTypes(),
            'event_organizers' => $this->eventOrganizers(),
            'venue' => $this->venues(),
            'date_time' => $this->date_time->format('d/m/y g:i A'),
            'distance' => $this->distance_from_school,
            'duration' => $this->duration_from_school
        ];
    }
}
