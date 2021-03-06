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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('creator_id')->references('id')->on('users');
            $table->foreignId('target_user_id')->nullable()->references('id')->on('users');
            $table->string('name');
            $table->string('ssn', 13)->unique();
            $table->string('legal');
            $table->string('city');
            $table->string('address');
            $table->foreignId('company_type_id');
            $table->foreignId('company_purchase_id');
            $table->foreignId('company_status_id');
            $table->foreignId('company_potentiality_id');
            $table->text('description');
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
        Schema::dropIfExists('companies');
    }
};
