<?php

use Illuminate\Database\Seeder;
use App\Service;

class OrderItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j < rand(1, 10); $j++) {
                $service = rand(1, count(Service::all()));
                DB::table('order_items')->insert([
                    'order_id'=> $i,
                    'service_id'=> $service,
                    'service_price'=> Service::find($service)->price,
                    'review'=> 5,
                    'service_commission'=> 500,
                    'vendor_id'=> 1,
                    'delivery_time'=> Carbon\Carbon::now(),
                    'comment_by_category_manager'=> 'djcvjdsh',
                    'type' => 'household',
                ]);
            }
        }
    }
}
