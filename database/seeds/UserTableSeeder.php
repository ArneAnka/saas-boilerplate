<?php

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'firstname' => 'Tester',
                'lastname' => 'Aswesome',
                'slug' => 'tester.awesome',
                'email' => 'example@example.com',
                'password' => bcrypt('secret'),
                'gender' => 'male',
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'firstname' => 'two',
                'lastname' => 'one',
                'slug' => 'two.one',
                'email' => 'test@test.com',
                'password' => bcrypt('secret'),
                'gender' => 'female',
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        User::insert($users);
    }
}
