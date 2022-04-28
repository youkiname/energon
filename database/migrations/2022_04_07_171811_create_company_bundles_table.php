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
            $table->foreignId('creator_id')->references('id')->on('users');
            $table->foreignId('a_company_id')->references('id')->on('companies')->onDelete('cascade');;
            $table->foreignId('b_company_id')->references('id')->on('companies')->onDelete('cascade');;
            $table->foreignId('status_id')->nullable()->references('id')->on('company_bundle_statuses')->onDelete('set null')->default(1);;
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_bundles');
    }
};
