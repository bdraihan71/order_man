<?php

use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            'name' => 'Uttara',
        ]);

        DB::table('locations')->insert([
            'name' => 'Dhanmondi',
        ]);

        DB::table('locations')->insert([
            'name' => 'Mirpur',
        ]);

        DB::table('locations')->insert([
            'name' => 'Motijheel',
        ]);
    }
}
