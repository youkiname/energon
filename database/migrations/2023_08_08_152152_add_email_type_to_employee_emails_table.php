<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('employee_emails', function (Blueprint $table) {
            $table->foreignId('email_type_id')->references('id')->on('employee_email_types')->onDelete('NO ACTION')->default(1);
        });
    }

    public function down()
    {
        Schema::table('employee_emails', function (Blueprint $table) {
            //
        });
    }
};
