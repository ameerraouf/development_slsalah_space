<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInvestmentPortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('investment_portfolios', function (Blueprint $table) {
            // Drop the existing columns
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropForeign(['opportunity_id']);
            $table->dropColumn('opportunity_id');

            // Add new columns
            $table->unsignedBigInteger('investor_id');
            $table->foreign('investor_id')->references('id')->on('investors')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('found_round_id');
            $table->foreign('found_round_id')->references('id')->on('found_rounds')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('investment_portfolios', function (Blueprint $table) {
            // Re-add the dropped columns
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('opportunity_id');
            $table->foreign('opportunity_id')->references('id')->on('opportunities');
            
            // Drop the newly added columns
            $table->dropForeign(['investor_id']);
            $table->dropColumn('investor_id');
            $table->dropForeign(['found_round_id']);
            $table->dropColumn('found_round_id');

        });
    }
}
