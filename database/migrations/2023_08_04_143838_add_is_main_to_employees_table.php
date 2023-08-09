<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('employees', 'is_main')) {
            Schema::table('employees', function (Blueprint $table) {
                $table->boolean('is_main')->default(0);
            });
        }
    }

    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            //
        });
    }
};
