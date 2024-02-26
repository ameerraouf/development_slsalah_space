<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequiredInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('required_investments', function (Blueprint $table) {
            $table->id();
            $table->integer('required_investment_size')->default(0);
            $table->integer('investment_technology')->default(0);
            $table->integer('investment_team')->default(0);
            $table->integer('resarch_and_development')->default(0);
            $table->integer('investment_marketing')->default(0);
            $table->enum('required_investment_unit',['million','thousand'])->default('thousand');
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
        Schema::dropIfExists('required_investments');
    }
}
