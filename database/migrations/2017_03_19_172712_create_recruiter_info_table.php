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
            $table->softDeletes();
        });

        $data1 = array(
            "user_id"=>"21", //id should be relative to the table users with user_types = 3 or 4
            "position_id"=>"1" //id should be relative to the table positions
        );

        $data2 = array(
            "user_id"=>"22", //id should be relative to the table users with user_types = 3 or 4
            "position_id"=>"2" //id should be relative to the table positions
        );

        $data3 = array(
            "user_id"=>"23", //id should be relative to the table users with user_types = 3 or 4
            "position_id"=>"3" //id should be relative to the table positions
        );

        $data4 = array(
            "user_id"=>"24", //id should be relative to the table users with user_types = 3 or 4
            "position_id"=>"4" //id should be relative to the table positions
        );

        $data5 = array(
            "user_id"=>"25", //id should be relative to the table users with user_types = 3 or 4
            "position_id"=>"5" //id should be relative to the table positions
        );

        $data6 = array(
            "user_id"=>"26", //id should be relative to the table users with user_types = 3 or 4
            "position_id"=>"6" //id should be relative to the table positions
        );

        $data7 = array(
            "user_id"=>"27", //id should be relative to the table users with user_types = 3 or 4
            "position_id"=>"7" //id should be relative to the table positions
        );

        $data8 = array(
            "user_id"=>"28", //id should be relative to the table users with user_types = 3 or 4
            "position_id"=>"8" //id should be relative to the table positions
        );

        $data9 = array(
            "user_id"=>"29", //id should be relative to the table users with user_types = 3 or 4
            "position_id"=>"9" //id should be relative to the table positions
        );

        $data10 = array(
            "user_id"=>"30", //id should be relative to the table users with user_types = 3 or 4
            "position_id"=>"25" //id should be relative to the table positions
        );

        $data11 = array(
            "user_id"=>"31", //id should be relative to the table users with user_types = 3 or 4
            "position_id"=>"25" //id should be relative to the table positions
        );

        $data12 = array(
            "user_id"=>"32", //id should be relative to the table users with user_types = 3 or 4
            "position_id"=>"25" //id should be relative to the table positions
        );

        $data13 = array(
            "user_id"=>"33", //id should be relative to the table users with user_types = 3 or 4
            "position_id"=>"10" //id should be relative to the table positions
        );

        $data14 = array(
            "user_id"=>"34", //id should be relative to the table users with user_types = 3 or 4
            "position_id"=>"10" //id should be relative to the table positions
        );

        $data15 = array(
            "user_id"=>"35", //id should be relative to the table users with user_types = 3 or 4
            "position_id"=>"10" //id should be relative to the table positions
        );

        $data16 = array(
            "user_id"=>"36", //id should be relative to the table users with user_types = 3 or 4
            "position_id"=>"10" //id should be relative to the table positions
        );

        $data17 = array(
            "user_id"=>"37", //id should be relative to the table users with user_types = 3 or 4
            "position_id"=>"10" //id should be relative to the table positions
        );

        $data18 = array(
            "user_id"=>"38", //id should be relative to the table users with user_types = 3 or 4
            "position_id"=>"10" //id should be relative to the table positions
        );

        $data19 = array(
            "user_id"=>"39", //id should be relative to the table users with user_types = 3 or 4
            "position_id"=>"10" //id should be relative to the table positions
        );

        $data20 = array(
            "user_id"=>"40", //id should be relative to the table users with user_types = 3 or 4
            "position_id"=>"25" //id should be relative to the table positions
        );

        DB::table('recruiter_infos')->insert(array($data1,$data2,$data3,$data4,$data5,$data6,$data7,$data8,$data9,$data10,$data11,$data12,$data13,$data14,$data15,$data16,$data17,$data18,$data19,$data20));

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
