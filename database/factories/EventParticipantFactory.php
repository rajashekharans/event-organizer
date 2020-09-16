<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use App\Models\EventParticipant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventParticipantFactory extends Factory
{
    protected $model = EventParticipant::class;

    public function definition(): array
    {
        return [
            'event_id' => $this->faker->numberBetween(1,10),
            'user_id' => $this->faker->numberBetween(1,500),
            'paid' => $this->faker->numberBetween(0,1),
            'attended' => $this->faker->numberBetween(0,1)
        ];
    }
}
