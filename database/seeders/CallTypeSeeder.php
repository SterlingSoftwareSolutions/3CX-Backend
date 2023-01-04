<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CallTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $call_types = [
            [
                'name' => 'Product Inquiry',
                'call_type_group_id' => 1
            ],
            [
                'name' => 'Special Daily/Weekend Promotion',
                'call_type_group_id' => 1
            ],
            [
                'name' => 'Delivery Status',
                'call_type_group_id' => 2
            ],
            [
                'name' => 'Delivery Complaint',
                'call_type_group_id' => 2
            ],
            [
                'name' => 'AC Installation',
                'call_type_group_id' => 2
            ],
            [
                'name' => 'Refund',
                'call_type_group_id' => 2
            ],
            [
                'name' => 'E-Invoice',
                'call_type_group_id' => 2
            ],
            [
                'name' => 'DOA',
                'call_type_group_id' => 2
            ],
            [
                'name' => 'Warranty Claim',
                'call_type_group_id' => 2
            ],
            [

                'name' => 'Payment Error',
                'call_type_group_id' => 3
            ],
            [

                'name' => 'Site Error',
                'call_type_group_id' => 3
            ],
            [

                'name' => 'Order Confirmation',
                'call_type_group_id' => 4
            ],
            [

                'name' => 'Quotation Inquiry',
                'call_type_group_id' => 4
            ],
            [

                'name' => 'Service Inquiry',
                'call_type_group_id' => 5
            ],
            [

                'name' => 'Showroom Inquiry',
                'call_type_group_id' => 5
            ],
            [

                'name' => 'Hire Purchasing',
                'call_type_group_id' => 5
            ],
            [

                'name' => 'Cash On delivery',
                'call_type_group_id' => 5
            ],
            [

                'name' => 'Installments plan Inquiry',
                'call_type_group_id' => 5
            ],
            [

                'name' => 'Wrong Number',
                'call_type_group_id' => 5
            ],

        ];

        DB::table('call_types')->insert($call_types);
    }
}
