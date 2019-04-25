<?php

use Illuminate\Database\Seeder;

class OrderItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('order_items')->insert([
            'order_id'=> 1,
            'service_id'=> 1,
            'service_price'=> 688,
            'review'=> 5,
            'service_commission'=> 500,
            'vendor_id'=> 1,
            'delivery_time'=> Carbon\Carbon::now(),
            'comment_by_category_manager'=> 'djcvjdsh',
            'cancelled_at'=> Carbon\Carbon::now(),
            'cancellation_note'=> '123123',
            'cancelled_by'=> 2,
            'fullfilled_at'=> Carbon\Carbon::now(),
            'fullfillment_note'=> '123123',
            'fullfilled_by'=> 1,
            'type' => 'household',
            'booked_at' => Carbon\Carbon::now(),
            'booked_by' => 1,
            'booking_note' => 'Some note'
        ]);

        DB::table('order_items')->insert([
            'order_id'=> 1,
            'service_id'=> 1,
            'service_price'=> 700,
            'review'=> 4,
            'service_commission'=> 550,
            'vendor_id'=> 1,
            'delivery_time'=> Carbon\Carbon::now(),
            'comment_by_category_manager'=> 'djcvjdsh',
            'cancelled_at'=> Carbon\Carbon::now(),
            'cancellation_note'=> '123123',
            'cancelled_by'=> 2,
            'fullfilled_at'=> Carbon\Carbon::now(),
            'fullfillment_note'=> '123123',
            'fullfilled_by'=> 1,
            'type' => 'household',
            'booked_at' => Carbon\Carbon::now(),
            'booked_by' => 1,
            'booking_note' => 'Some note'
        ]);
    }
}
