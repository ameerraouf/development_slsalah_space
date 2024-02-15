<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionsColumnsToInvestorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('investors', function (Blueprint $table) {
            $table->integer('companies_count');
            $table->decimal('invest_from', 18,2,true);
            $table->decimal('invest_to', 18,2,true);
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('investors', function (Blueprint $table) {
            $table->dropColumn('companies_count');
            $table->dropColumn('invest_from');
            $table->dropColumn('invest_to');
            $table->dropColumn('remember_token');
        });
    }
}
