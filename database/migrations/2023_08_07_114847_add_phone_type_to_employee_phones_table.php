<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('employee_phones', 'phone_type_id')) {
            Schema::table('employee_phones', function (Blueprint $table) {
                $table->foreignId('phone_type_id')->references('id')->on('employee_phone_types')->onDelete('NO ACTION')->default(1);
            });
        }
    }

    public function down()
    {
        Schema::table('employee_phones', function (Blueprint $table) {
            //
        });
    }
};
