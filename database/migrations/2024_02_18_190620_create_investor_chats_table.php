<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestorChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investor_chats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chat_id')->nullable();
            $table->foreignId('user_id')->nullable()->references('id')->on('users');
            $table->foreignId('investor_id')->nullable()->references('id')->on('investors');
            $table->text('message')->nullable();
            $table->string('file')->nullable();
            $table->string('audio')->nullable();
            $table->timestamp('user_read_at')->nullable();
            $table->timestamp('investor_read_at')->nullable();
            $table->boolean('is_open');
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
        Schema::dropIfExists('investor_chats');
    }
}
