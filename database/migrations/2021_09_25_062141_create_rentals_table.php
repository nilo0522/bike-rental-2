<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id('rental_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('bike_id');
            $table->foreign('bike_id')->references('id')->on('bike_details');
            $table->date('rent_start_date');
            $table->date('rent_end_date');
            $table->float('sub_total');
            $table->float('fullpayment');
            $table->float('total_amount');
            $table->integer('rentdays');
            $table->boolean('rent_status')->default(false);
            $table->string('remarks')->default('pending');
            $table->string('pickup');

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
        Schema::dropIfExists('rentals');
    }
}
