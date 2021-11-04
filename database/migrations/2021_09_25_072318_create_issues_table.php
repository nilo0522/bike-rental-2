<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id('bissue_id');
            $table->unsignedBigInteger('bike_id');
            $table->foreign('bike_id')->references('id')->on('bike_details');
            $table->unsignedBigInteger('pob_id');
            $table->foreign('pob_id')->references('pob_id')->on('pen_of_bike');
            $table->string('description');
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
        Schema::dropIfExists('issues');
    }
}
