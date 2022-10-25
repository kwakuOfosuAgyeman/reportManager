<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_columns_rules', function (Blueprint $table) {
            $table->id();
            $table->string('report_name');
            $table->string('layout_name');
            $table->string('column_name');
            $table->string('match');
            $table->string('match_value');
            $table->string('source_column');
            $table->string('source_constant');
            $table->string('custom_column');
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
        Schema::dropIfExists('report_columns_rules');
    }
};
