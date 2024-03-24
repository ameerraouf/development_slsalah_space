<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyRoundAmountColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('found_rounds', function (Blueprint $table) {
            DB::statement("ALTER TABLE found_rounds MODIFY round_amount DECIMAL(15,2)");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('found_rounds', function (Blueprint $table) {
            //
        });
    }
}
