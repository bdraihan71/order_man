<?php

use Illuminate\Database\Seeder;

class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('channels')->insert([
            'name' => 'Facebook',
        ]);

        DB::table('channels')->insert([
            'name' => 'Twitter',
        ]);

        DB::table('channels')->insert([
            'name' => 'Web',
        ]);
    }
}
