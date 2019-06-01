<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@amarsheba.com',
            'email_verified_at' => new DateTime,
            'password' => bcrypt('bangladesh'),
            'role_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Sansa',
            'email' => 'sansa@amarsheba.com',
            'email_verified_at' => new DateTime,
            'password' => bcrypt('bangladesh'),
            'role_id' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'Tasnim',
            'email' => 'tasnim@amarsheba.com',
            'email_verified_at' => new DateTime,
            'password' => bcrypt('bangladesh'),
            'role_id' => 2,
        ]);
    }
}
