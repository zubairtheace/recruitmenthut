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
            $table->string('nic');
            $table->string('gender');
            $table->date('dob');
            $table->string('marital_status');
            $table->string('address');
            $table->integer('phone_number');
            $table->integer('mobile_number');
            $table->string('email')->unique();
            $table->text('cv');
            $table->text('certificates');
            $table->float('overall_rating')->default('0');
            $table->string('password');
            $table->integer('department_id')->unsigned()->nullable();
            $table->integer('position_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('position_id')->references('id')->on('positions');
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
