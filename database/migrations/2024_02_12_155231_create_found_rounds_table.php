<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoundRoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('found_rounds', function (Blueprint $table) {
            $table->id();
            $table->decimal('round_amount');
            $table->boolean('share_round')->default(0);
            $table->boolean('share_plan')->default(0);
            $table->boolean('share_profile')->default(0);
            $table->unsignedBigInteger('business_pioneer_id');
            $table->foreign('business_pioneer_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('found_rounds');
    }
}
