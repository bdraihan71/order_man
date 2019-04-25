<?php

use Illuminate\Database\Seeder;

class SubcategoryUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategory_user')->insert([
            'subcategory_id' => 1,
            'user_id' => 2,
        ]);
    }
}
