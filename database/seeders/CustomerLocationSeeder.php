<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = file_get_contents('storage/locations.json', 'r');
        $locations = json_decode($file, true);
        DB::table('customer_locations')->insert($locations);
    }
}
