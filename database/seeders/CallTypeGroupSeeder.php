<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CallTypeGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ctgs = [
            ['id' => 1, 'name' => 'Product Promotion'],
            ['id' => 2, 'name' => 'Delivery and Billing'],
            ['id' => 3, 'name' => 'Errors'],
            ['id' => 4, 'name' => 'Order and Quotation'],
            ['id' => 5, 'name' => 'Other'],
        ];

        DB::table('call_type_groups')->insert($ctgs);
    }
}
