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
            $table->integer('user_type_id')->unsigned()->default('1');
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
            $table->string('password');
            $table->foreign('user_type_id')->references('id')->on('user_types');
            $table->rememberToken();
            $table->timestamps();
        });
    }


    // // Table positions (40 samples of users with 10 users within each types)
    //     $data1 = array(
    //         "user_type_id"=>"1",//10 users within each types (candidate = 1, registered candidate = 2, interviewer = 3, HR = 4)
    //         "first_name"=>"Zubair",
    //         "last_name"=>"Tofy",
    //         "nic"=>"T1234567896541", // unique
    //         "gender"=>"male",//male or female
    //         "dob"=>"2017-12-31", // format is yyyy-mm-dd
    //         "marital_status"=>"single",//single or married
    //         "Address"=>"Avenue Cardinal 5,Les Guibies, Pailles",
    //         "phone_number"=>"2860480",//7 digits
    //         "phone_number"=>"59455867",//8 digits
    //         "email"=>"tofy.zubair@gmail.com",// unique
    //         "password"=>"123456"// set all password to 123456
    //     );
    //
    //     $data2 = array(
    //         "user_type_id"=>"2",
    //         "first_name"=>"Tawfeeq",
    //         "last_name"=>"Heetun",
    //         "nic"=>"T1238541896541",
    //         "gender"=>"male",
    //         "dob"=>"2017-11-31",
    //         "marital_status"=>"married",
    //         "Address"=>"La chine ou germany",
    //         "phone_number"=>"2860480",
    //         "phone_number"=>"59455867",
    //         "email"=>"heetun.tawfeeq1@gmail.com",
    //         "password"=>"123456"
    //     );
    //
    //     DB::table('users')->insert(array($data1,$data2));

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
