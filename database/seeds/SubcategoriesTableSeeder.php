<?php

use Illuminate\Database\Seeder;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategories')->insert([
            'name' => 'ERP Software',
            'description' => '4 Softwares',
            'category_id' => 1,
        ]);

        DB::table('subcategories')->insert([
            'name' => 'CRM Software',
            'description' => '3 Softwares',
            'category_id' => 1,
        ]);
    }
}
