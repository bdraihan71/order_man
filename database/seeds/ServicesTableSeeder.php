<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'title' => 'Law Firm Information Management System',
            'description' => 'We are offering innovative business management solutions that help you spend more time growing your business in Bangladesh. ',
            'subcategory_id' => 1,
            'price' => '70000',
        ]);

        DB::table('services')->insert([
            'title' => 'Customer Relationship Management System',
            'description' => 'Helps you understand your customers so that you can focus on your potential customers and give them the best customer service.',
            'subcategory_id' => 1,
            'price' => '80000',
        ]);
    }
}
