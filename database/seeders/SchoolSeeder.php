<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('school')->insert([
            'name' => 'Santa Sabina School',
            'address_line_1' => '100 The Boulevarde',
            'address_line_2' => '',
            'suburb' => 'Strathfield',
            'state' => 'NSW',
            'country' => 'Australia',
            'postcode' => 2135,
            'coordinates' => '151.094862,-33.877461999999994',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
