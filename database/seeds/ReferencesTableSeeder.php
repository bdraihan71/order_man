<?php

use Illuminate\Database\Seeder;

class ReferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('references')->insert([
           'id' => 1,
           'name' => 'Facbook',
        ]);

        DB::table('references')->insert([
            'id' => 2,
            'name' => 'Website',
         ]);
    }
}
