<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id');
            $table->timestamp('booked_at')->nullable();
            $table->integer('booked_by')->nullable();
            $table->text('booking_note')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->text('cancellation_note')->nullable();
            $table->integer('cancelled_by')->nullable();
            $table->timestamp('fullfilled_at')->nullable();
            $table->text('fullfillment_note')->nullable();
            $table->integer('fullfilled_by')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
