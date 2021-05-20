<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pro_id')->unsigned()->nullable();
            $table->foreign('pro_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('subName');
            $table->string('subBrnad');
            $table->string('subDetail');
            $table->string('subColour');
            $table->string('subImage');
            $table->string('subMetaTitle'); //
            $table->string('subMetaDesc');  // 
            $table->string('subMetaKeyword'); //
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
        Schema::dropIfExists('sub_products');
    }
}
