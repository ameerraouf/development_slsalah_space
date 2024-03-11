<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportedInvestorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imported_investors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('number_of_investment')->nullable();
            $table->string('number_of_exits')->nullable();
            $table->string('location')->nullable();
            $table->string('monthly_visits')->nullable();
            $table->string('investor_type')->nullable();
            $table->string('investor_stage')->nullable();
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
        Schema::dropIfExists('imported_investors');
    }
}
