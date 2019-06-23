<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            [
                'name' => 'Monthly',
                'slug' => 'monthly',
                'gateway_id' => 'month_1',
                'price' => 69,
                'active' => true,
                'teams_enabled' => false,
                'teams_limit'  => null
                ],
            [
                'name' => 'Yearly',
                'slug' => 'yearly',
                'gateway_id' => 'year_60',
                'price' => 468,
                'active' => true,
                'teams_enabled' => false,
                'teams_limit'  => null
                ],
            [
                'name' => 'Six months',
                'slug' => 'six-month',
                'gateway_id' => 'month_6',
                'price' => 294,
                'active' => true,
                'teams_enabled' => false,
                'teams_limit'  => null
                ],
        ];

        Plan::insert($plans);
    }
}
