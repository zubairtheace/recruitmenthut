<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruiterInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruiter_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('position_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('position_id')->references('id')->on('positions');
            $table->timestamps();
        });

        // //Fill for all users with user_type_id = 3 or 4
        // $data1 = array(
        //     "user_id"=>"15", //id should be relative to the table users with user_types = 3 or 4
        //     "position_id"=>"1" //id should be relative to the table positions
        // );
        //
        // $data2 = array(
        //     "user_id"=>"16", //id should be relative to the table users with user_types = 3 or 4
        //     "position_id"=>"5" //id should be relative to the table positions
        // );
        // DB::table('recruiter_infos')->insert(array($data1,$data2));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruiter_infos');
    }
}
