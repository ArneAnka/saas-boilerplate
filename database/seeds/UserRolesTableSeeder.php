<?php

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
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
                'user_id' => 1, // First user in `users` table
                'role_id' => 1 // admin
            ],
            [
                'user_id' => 1, // First user in `users` table
                'role_id' => 2 // moderator
            ],
        ];
        DB::table('role_user')->insert($users);
    }
}
