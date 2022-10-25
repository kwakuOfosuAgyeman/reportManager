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
        Schema::create('reports_columns_properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('report_name');

            $table->unsignedBigInteger('layout_name');
            $table->string('column_name');
            $table->string('column_positon');
            $table->string('sort_order');
            $table->integer('visibility');
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
        Schema::dropIfExists('report_columns_properties');
    }
};
