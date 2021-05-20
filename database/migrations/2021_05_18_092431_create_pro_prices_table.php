<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->unsigned()->nullable();
            $table->foreign('store_id')->references('id')->on('storages')->onDelete('cascade');
            $table->string('new');
            $table->string('working');
            $table->string('dead');
            $table->string('prob1');
            $table->string('prob2');
            $table->string('prob3');
            $table->string('prob4');
            $table->string('prob5');
            $table->string('prob6');
            $table->string('prob7');
            $table->string('prob8');
            $table->string('prob9');
            $table->string('prob10');
            $table->string('prob11');
            $table->string('prob12');
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
        Schema::dropIfExists('pro_prices');
    }
}
