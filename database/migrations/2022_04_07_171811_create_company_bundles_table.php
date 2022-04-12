<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('company_bundles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('a_company_id')->references('id')->on('companies')->onDelete('cascade');;
            $table->foreignId('b_company_id')->references('id')->on('companies')->onDelete('cascade');;
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_bundles');
    }
};
