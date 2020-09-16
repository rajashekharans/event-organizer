<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SchoolSeeder::class,
            UserTypeSeeder::class,
            UserSeeder::class,
            VenueSeeder::class,
            OrganizerSeeder::class,
            EventTypeSeeder::class
        ]);
    }
}
