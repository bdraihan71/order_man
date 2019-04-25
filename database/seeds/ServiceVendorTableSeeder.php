<?php

use Illuminate\Database\Seeder;

class ServiceVendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_vendor')->insert([
            'service_id' => 1,
            'vendor_id' => 1,
        ]);

        DB::table('service_vendor')->insert([
            'service_id' => 2,
            'vendor_id' => 2,
        ]);
    }
}
