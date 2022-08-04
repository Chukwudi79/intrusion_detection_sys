<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Payrol;
use App\Models\Company;
use App\Models\Loginmonitor;
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
        \App\Models\Company::factory(10)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Loginmonitor::factory(10)->create();
        \App\Models\Payrol::factory(10)->create();
    }
}
