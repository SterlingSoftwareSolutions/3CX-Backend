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
        $this->call(CallTypeGroupSeeder::class);
        $this->call(CallTypeSeeder::class);

        \App\Models\User::factory(10)->create();
        \App\Models\Customer::factory(50)->create();
        \App\Models\CustomerAddress::factory(55)->create();
        \App\Models\Inquiry::factory(100)->create();
        \App\Models\Feedback::factory(90)->create();
        \App\Models\UserPhone::factory(15)->create();
        \App\Models\FollowUp::factory(30)->create();
        \App\Models\Call::factory(75)->create();
    }
}
