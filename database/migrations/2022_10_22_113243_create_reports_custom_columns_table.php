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
        Schema::create('reports_custom_columns', function (Blueprint $table) {
            $table->id();
            $table->string('report_name');
            $table->string('layout_name');
            $table->mediumText('custom_column');
            $table->mediumText('description');
            $table->string('type');
            $table->string('size');
            $table->integer('decimal_size');
            $table->string('formula');
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
        Schema::dropIfExists('reports_custom_columns');
    }
};
