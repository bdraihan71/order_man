<?php

use Illuminate\Database\Seeder;

class RefTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('references')->insert([
           'name' => 'Facbook',
        ]);

        DB::table('references')->insert([
            'name' => 'Website',
         ]);
    }
}
