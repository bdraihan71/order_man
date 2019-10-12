<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([RolesTableSeeder::class,
            UsersTableSeeder::class,
            VendorsTableSeeder::class,
            CategoriesTableSeeder::class,
            SubcategoriesTableSeeder::class,
            SubcategoryUserTableSeeder::class,
            ServicesTableSeeder::class,
            ServiceVendorTableSeeder::class,
            LocationTableSeeder::class,
            CustomerTableSeeder::class,
            OrdersTableSeeder::class,
            OrderItemsTableSeeder::class,
            RefTableSeeder::class,
            ChannelTableSeeder::class,
            ]);
    }
}
