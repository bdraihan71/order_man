<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Software',
            'description' => '41 Sub Categories',
        ]);

        DB::table('categories')->insert([
            'name' => 'Cleaning',
            'description' => '72 Sub Categories',
        ]);
    }
}
