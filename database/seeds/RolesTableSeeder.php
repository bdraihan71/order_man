<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(['id' => 1, 'name' => "admin", 'display_name' => "Admin"]);
        DB::table('roles')->insert(['id' => 2, 'name' => "category_manager", 'display_name' => "Category Manager"]);
    }
}
