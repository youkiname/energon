<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('company_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->string('filename');
            $table->boolean('is_main')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_images');
    }
};
