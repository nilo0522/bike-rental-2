<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->string('role')->default('user')->comment('user/admin')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('number');
            $table->string('street');
            $table->string('gender');
            $table->string('city');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
