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
            'id' => 1,
            'name' => 'Uttara',
        ]);

        DB::table('locations')->insert([
            'id' => 2,
            'name' => 'Dhanmondi',
        ]);

        DB::table('locations')->insert([
            'id' => 3,
            'name' => 'Mirpur',
        ]);

        DB::table('locations')->insert([
            'id' => 4,
            'name' => 'Motijheel',
        ]);
    }
}
