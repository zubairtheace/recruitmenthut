<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->text('cv');
            $table->text('certificates');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        // //Fill for all users with user_type_id = 1 or 2
        // $data1 = array(
        //     "user_id"=>"6", //id should be relative to the table users with user_types = 1 or 2
        //     "cv"=>"cv1.pdf", //create sample cv pdf with only names and data accurate, add other sample text, do this for all candidates and recruited candidates, which means cv1, cv2 etc.
        //     "certificate"=>"certificate1.pdf" //create sample certificate pdf with only names and data accurate, add other sample text, do this for all candidates and recruited candidates, which means certificate1, certificate2 etc.
        // );
        //
        // $data2 = array(
        //     "user_id"=>"9", //id should be relative to the table users with user_types = 1 or 2
        //     "cv"=>"cv12.pdf", //create sample cv pdf with only names and data accurate, add other sample text, do this for all candidates and recruited candidates, which means cv1, cv2 etc.
        //     "certificate"=>"certificate12.pdf" //create sample certificate pdf with only names and data accurate, add other sample text, do this for all candidates and recruited candidates, which means certificate1, certificate2 etc.
        // );
        // DB::table('candidate_infos')->insert(array($data1,$data2));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_infos');
    }
}
