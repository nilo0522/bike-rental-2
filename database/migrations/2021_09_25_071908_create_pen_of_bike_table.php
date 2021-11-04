<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenOfBikeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pen_of_bike', function (Blueprint $table) {
            $table->id('pob_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('rental_id');
            $table->foreign('rental_id')->references('rental_id')->on('rentals');
            $table->float('penalty_amount');
            $table->integer('penalty_status');
            $table->integer('payment_type');
            $table->string('remarks');
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
        Schema::dropIfExists('pen_of_bike');
    }
}
