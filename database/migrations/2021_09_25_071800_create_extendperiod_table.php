<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtendperiodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extendperiod', function (Blueprint $table) {
            $table->id('ext_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('rental_id');
            $table->foreign('rental_id')->references('rental_id')->on('rentals');
            $table->date('extend_start_date');
            $table->date('extend_end_date');
            $table->float('payment_amount');
            $table->integer('payment_status');
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
        Schema::dropIfExists('extendperiod');
    }
}
