<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_banks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sell_id')->unsigned()->nullable();
            $table->foreign('sell_id')->references('id')->on('sell_products')->onDelete('cascade');
            $table->string('bankname');
            $table->string('accountname');
            $table->string('b2b');
            $table->string('accountnumber');
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
        Schema::dropIfExists('sell_banks');
    }
}
