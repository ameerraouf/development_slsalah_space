<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('themes', function (Blueprint $table) {
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
            // $table->string('image6')->nullable();
            // $table->string('image7')->nullable();
            // $table->string('image8')->nullable();
            // $table->string('image9')->nullable();
            // $table->string('image10')->nullable();
            // $table->string('image11')->nullable();
            // $table->string('image12')->nullable();
            // $table->string('image13')->nullable();
            // $table->string('image14')->nullable();
            // $table->string('image15')->nullable();
            // $table->string('image16')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('themes', function (Blueprint $table) {
            //
        });
    }
}
