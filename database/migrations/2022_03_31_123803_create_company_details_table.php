<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->references('id')->on('companies')->onDelete('cascade');;
            $table->string('contract_number');
            $table->integer('specification_number');
            $table->string('request_number');
            $table->string('order_number');
            $table->date('order_date')->nullable();
            $table->integer('order_sum');
            $table->integer('manager_premium');
            $table->integer('working_hours');
            $table->string('equipment_type');
            $table->string('delivery_place');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_details');
    }
};
