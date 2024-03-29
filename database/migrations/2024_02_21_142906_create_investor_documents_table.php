<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestorDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investor_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('workspace_id');
            $table->uuid('uuid');
            $table->unsignedInteger('investor_id');
            $table->string('related_to')->nullable();
            $table->unsignedInteger('related_id')->default(0);
            $table->string('name')->nullable();
            $table->string('path');
            $table->unsignedInteger('size')->default(0);
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
        Schema::dropIfExists('investor_documents');
    }
}
