<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_types')->insert([
            'name' => 'Carnival or Festival',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('event_types')->insert([
            'name' => 'Family Dance',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('event_types')->insert([
            'name' => 'Multicultural Event',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('event_types')->insert([
            'name' => 'Movie Night',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('event_types')->insert([
            'name' => 'Fun Run',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('event_types')->insert([
            'name' => 'Field Day',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('event_types')->insert([
            'name' => 'Enrichment Event',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('event_types')->insert([
            'name' => 'Bingo Night',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('event_types')->insert([
            'name' => 'Inflatavles Day',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('event_types')->insert([
            'name' => 'Ice Cream Social',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('event_types')->insert([
            'name' => 'Book Fair',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
