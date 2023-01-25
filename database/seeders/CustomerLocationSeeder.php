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
        $file = file("storage/locations.txt", FILE_IGNORE_NEW_LINES);
        $index = 0;
        $locations = [];

        foreach($file as $location){
            $locations[$index] = [
                'name' => $location
            ];
            $index++;
        }

        DB::table('customer_locations')->insert($locations);
    }
}
