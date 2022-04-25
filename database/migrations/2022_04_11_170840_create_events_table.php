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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->references('id')->on('companies')->onDelete('cascade');;
            $table->foreignId('creator_id')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->foreignId('target_user_id')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->foreignId('event_type_id')->nullable()->references('id')->on('event_types')->onDelete('set null');
            $table->string('title');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('events');
    }
};
