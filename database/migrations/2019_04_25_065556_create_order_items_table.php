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
            $table->integer('service_commission')->nullable();
            $table->integer('vendor_id')->nullable();
            $table->time('delivery_time');
            $table->date('delivery_date');
            $table->text('delivery_address');
            $table->text('comment_by_category_manager')->nullable();
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
