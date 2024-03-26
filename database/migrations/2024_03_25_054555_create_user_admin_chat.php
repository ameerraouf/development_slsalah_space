<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAdminChat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_admin_chat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->nullable()->references('id')->on('users');
            $table->foreignId('user_id')->nullable()->references('id')->on('users');
            $table->text('message')->nullable();
            $table->string('file')->nullable();
            $table->string('audio')->nullable();
            $table->enum('sender_type', ['admin', 'user']);
            $table->timestamp('admin_read_at')->nullable();
            $table->timestamp('user_read_at')->nullable();
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
        Schema::dropIfExists('user_admin_chat');
    }
}
