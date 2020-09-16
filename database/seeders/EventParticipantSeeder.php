<?php

namespace Database\Seeders;

use App\Models\EventParticipant;
use Illuminate\Database\Seeder;

class EventParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventParticipant::factory()->times(5000)->create();
    }
}
