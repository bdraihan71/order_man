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
            'name' => 'Moba',
            'primary_contact_number' =>'56789',
            'secondary_contact_number' => '45678',
            'profession' => 'SE',
            'location_id'=> 1,
        ]);
    }
}
