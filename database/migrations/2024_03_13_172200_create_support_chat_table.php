<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportChatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_chat', function (Blueprint $table) {
            $table->id();
            $table->text('chat_id')->nullable();
            $table->foreignId('sender_id')->nullable()->references('id')->on('investors')->cascadeOnDelete();
            $table->foreignId('reciver_id')->nullable()->references('id')->on('users')->cascadeOnDelete();
            $table->text('message')->nullable();
            $table->string('file')->nullable();
            $table->string('audio')->nullable();
            $table->timestamp('sender_read_at')->nullable();
            $table->timestamp('reciver_read_at')->nullable();
            $table->boolean('is_open')->default(0);
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
        Schema::dropIfExists('support_chat');
    }
}
