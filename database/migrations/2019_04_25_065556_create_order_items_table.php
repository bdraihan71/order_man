<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_id');
            $table->integer('service_id');
            $table->integer('service_price');
            $table->integer('review')->nullable();
            $table->integer('service_commission');
            $table->integer('vendor_id')->nullable();
            $table->dateTime('delivery_time');
            $table->text('comment_by_category_manager')->nullable();
            $table->timestamp('booked_at')->nullable();
            $table->integer('booked_by')->nullable();
            $table->text('booking_note')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->text('cancellation_note')->nullable();
            $table->integer('cancelled_by')->nullable();
            $table->timestamp('fullfilled_at')->nullable();
            $table->text('fullfillment_note')->nullable();
            $table->integer('fullfilled_by')->nullable();
            $table->text('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
