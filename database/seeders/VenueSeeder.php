<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('venues')->insert([
            'name' => 'Sydney Opera House',
            'address_line_1' => 'Bennelong Pn',
            'address_line_2' => '',
            'suburb' => 'Sydney',
            'state' => 'NSW',
            'country' => 'Australia',
            'postcode' => 2000,
            'coordinates' => '151.209332, -33.868851',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('venues')->insert([
            'name' => 'State Library Of New South Wales',
            'address_line_1' => '1 Shakespeare Pl',
            'address_line_2' => '',
            'suburb' => 'Sydney',
            'state' => 'NSW',
            'country' => 'Australia',
            'postcode' => 2000,
            'coordinates' => '151.21305, -33.866496',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('venues')->insert([
            'name' => 'La Perouse Museum',
            'address_line_1' => '1542 Anzac Parade',
            'address_line_2' => '',
            'suburb' => 'La Perouse',
            'state' => 'NSW',
            'country' => 'Australia',
            'postcode' => 2036,
            'coordinates' => '151.232287, -33.988425',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('venues')->insert([
            'name' => 'Frenchmans Bay Reserve',
            'address_line_1' => '36-50R Endeavour Ave',
            'address_line_2' => '',
            'suburb' => 'La Perouse',
            'state' => 'NSW',
            'country' => 'Australia',
            'postcode' => 2036,
            'coordinates' => '151.23161, -33.986793',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('venues')->insert([
            'name' => 'Hyde Park',
            'address_line_1' => 'Hyde Park',
            'address_line_2' => '',
            'suburb' => 'Sydney',
            'state' => 'NSW',
            'country' => 'Australia',
            'postcode' => 2000,
            'coordinates' => '151.210984, -33.874297',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
