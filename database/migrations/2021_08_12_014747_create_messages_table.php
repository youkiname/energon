<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id');                           /** Отправитель */
            $table->foreignId('task_id');                           /** Задача (диалог) */
            $table->text('body');                                   /** Текст сообщения */
            $table->boolean('viewed')->default(false);        /** Просмотрено */
            $table->string('attach')->nullable();                   /** Путь к вложению (НЕ URL) */
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
        Schema::dropIfExists('messages');
    }
}
