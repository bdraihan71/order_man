<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->softDeletes();
            $table->text('company_name');
            $table->text('office_address');
            $table->text('trade_license_number')->nullable();
            $table->text('owner_name')->nullable();
            $table->text('owner_nid_number')->nullable();
            $table->text('owner_current_house_address')->nullable();
            $table->text('owner_contact_number_primary');
            $table->text('owner_contact_number_secondary')->nullable();
            $table->text('primary_contact_person_position');
            $table->text('primary_contact_person_number_primary');
            $table->text('primary_contact_person_number_secondary')->nullable();
            $table->text('secondary_contact_person_position')->nullable();
            $table->text('secondary_contact_person_number_primary')->nullable();
            $table->text('secondary_contact_person_number_secondary')->nullable();
            $table->text('documents_google_drive_link')->nullable();
            $table->integer('overall_review')->nullable();
            $table->integer('review_by_service')->nullable();
            $table->integer('added_by');
            $table->text('add_note')->nullable();
            $table->integer('reviewed_by')->nullable();
            $table->text('review_note')->nullable();
            $table->integer('margin');
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
        Schema::dropIfExists('vendors');
    }
}
