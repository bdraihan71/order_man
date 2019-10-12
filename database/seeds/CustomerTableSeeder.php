<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('customers')->insert([
            'name' => 'Monzu',
            'primary_contact_number' =>'56789',
            'secondary_contact_number' => '45678',
            'profession' => 'Bogi',
            'location_id'=> 2,
        ]);

        DB::table('customers')->insert([
            'name' => 'Prince',
            'primary_contact_number' =>'01708517954',
            'secondary_contact_number' => '01674983245',
            'profession' => 'Student',
            'location_id'=> 1,
            'channel_id' => 1,
        ]);
    }
}
