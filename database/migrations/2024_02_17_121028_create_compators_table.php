<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compators', function (Blueprint $table) {
            $table->id();
            $table->string('companyname')->nullable();
            $table->unsignedTinyInteger('price')->default(0);
            $table->unsignedTinyInteger('quality')->default(0);
            $table->unsignedTinyInteger('tech')->default(0);
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
        Schema::dropIfExists('compators');
    }
}
