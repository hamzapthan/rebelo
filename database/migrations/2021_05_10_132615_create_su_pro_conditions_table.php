<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuProConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_pro_conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subpro_id')->unsigned()->nullable();
            $table->foreign('subpro_id')->references('id')->on('sub_products')->onDelete('cascade');
            $table->string('condition');
            $table->string('price');
            $table->integer('status');
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
        Schema::dropIfExists('su_pro_conditions');
    }
}
