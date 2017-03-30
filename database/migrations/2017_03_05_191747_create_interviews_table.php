<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('application_id')->unsigned();
            $table->integer('interviewer_id')->unsigned();
            $table->integer('interview_type_id')->unsigned();
            $table->date('scheduled_on');
            $table->text('notes')->nullable();
            $table->float('rating')->nullable();
            $table->foreign('application_id')->references('id')->on('applications');
            $table->foreign('interviewer_id')->references('id')->on('users');
            $table->foreign('interview_type_id')->references('id')->on('interview_types');
            $table->timestamps();
        });

        // //15 samples of interviews with some pointed towards the same application
        // $data1 = array(
        //     "application_id"=>"3", //id should be between id's in applicatoin table
        //     "interviewer_id"=>"4", //id should be relative to the table users with user_types = 3 or 4
        //     "interview_type_id"=>"2", // id should be between id's in interview_types table
        //     "scheduled_on"=>"2017-11-20", // format is yyyy-mm-dd //Make sure date is after that particular application has been made
        //     "notes"=>"Sample interview Notes",
        //     "rating"=>"7" //between 1 and 10
        // );
        //
        // $data2 = array(
        //     "application_id"=>"6", //id should be between id's in applicatoin table
        //     "interviewer_id"=>"6", //id should be relative to the table users with user_types = 3 or 4
        //     "interview_type_id"=>"3", // id should be between id's in interview_types table
        //     "scheduled_on"=>"2017-10-20", // format is yyyy-mm-dd //Make sure date is after that particular application has been made
        //     "notes"=>"Sample interview Notes 2",
        //     "rating"=>"9" //between 1 and 10
        // );
        //
        // DB::table('interviews')->insert(array($data1,$data2));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interviews');
    }
}
