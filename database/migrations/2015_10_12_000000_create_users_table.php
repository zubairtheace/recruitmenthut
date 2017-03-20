<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('user_type_id')->unsigned()->default('1');
            $table->string('nic');
            $table->string('gender');
            $table->date('dob');
            $table->string('marital_status');
            $table->string('address');
            $table->integer('phone_number');
            $table->integer('mobile_number');
            $table->string('email')->unique();
            $table->string('password');
            $table->foreign('user_type_id')->references('id')->on('user_types');
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
