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
            $table->datetime('scheduled_on');
            $table->string('status')->default('Pending');
            $table->text('notes')->nullable();
            $table->float('rating')->nullable();
            $table->foreign('application_id')->references('id')->on('applications');
            $table->foreign('interviewer_id')->references('id')->on('users');
            $table->foreign('interview_type_id')->references('id')->on('interview_types');
            $table->timestamps();
            $table->softDeletes();
        });

        //15 samples of interviews with some pointed towards the same application
        $data1 = array(
            "application_id"=>"1",
            "interviewer_id"=>"20",
            "interview_type_id"=>"1",
            "scheduled_on"=>"2017-05-23 14:15:00",
            "notes"=>"Good knowledge on modern technologies.",
            "rating"=>"7",
            "status"=>"Done"
        );

        $data2 = array(
            "application_id"=>"1",
            "interviewer_id"=>"20",
            "interview_type_id"=>"2",
            "scheduled_on"=>"2017-05-23 14:25:00",
            "notes"=>"Too underconfident.",
            "rating"=>"3",
            "status"=>"Done"
        );

        $data3 = array(
            "application_id"=>"2",
            "interviewer_id"=>"22",
            "interview_type_id"=>"1",
            "scheduled_on"=>"2017-05-23 14:35:00",
            "notes"=>"Can do much better.",
            "rating"=>"4",
            "status"=>"Done"
        );

        $data4 = array(
            "application_id"=>"2",
            "interviewer_id"=>"22",
            "interview_type_id"=>"2",
            "scheduled_on"=>"2017-05-23 14:45:00",
            "notes"=>"Has the potential.",
            "rating"=>"8",
            "status"=>"Done"
        );

        $data5 = array(
            "application_id"=>"2",
            "interviewer_id"=>"22",
            "interview_type_id"=>"3",
            "scheduled_on"=>"2017-05-23 14:55:00",
            "notes"=>"Can be a good candidate for this post.",
            "rating"=>"8",
            "status"=>"Done"
        );

        $data6 = array(
            "application_id"=>"3",
            "interviewer_id"=>"32",
            "interview_type_id"=>"1",
            "scheduled_on"=>"2017-05-23 15:05:00",
            "notes"=>"Has no work experice and studies does not match the field required.",
            "rating"=>"2",
            "status"=>"Done"
        );

        $data7 = array(
            "application_id"=>"7",
            "interviewer_id"=>"25",
            "interview_type_id"=>"1",
            "scheduled_on"=>"2017-05-23 15:25:00",
            "notes"=>"Has good knowledge.",
            "rating"=>"8",
            "status"=>"Done"
        );

        $data8 = array(
            "application_id"=>"7",
            "interviewer_id"=>"25",
            "interview_type_id"=>"4",
            "scheduled_on"=>"2017-05-23 15:35:00",
            "notes"=>"Has the skills required for this post.",
            "rating"=>"9",
            "status"=>"Done"
        );

        $data9 = array(
            "application_id"=>"7",
            "interviewer_id"=>"25",
            "interview_type_id"=>"2",
            "scheduled_on"=>"2017-05-23 15:45:00",
            "notes"=>"Has good communication skills.",
            "rating"=>"8",
            "status"=>"Done"
        );

        $data10 = array(
            "application_id"=>"12",
            "interviewer_id"=>"40",
            "interview_type_id"=>"1",
            "scheduled_on"=>"2017-05-23 15:55:00",
            "notes"=>"Not too satisfied with the experince of work of candidate.",
            "rating"=>"3",
            "status"=>"Done"
        );

        $data11 = array(
            "application_id"=>"2",
            "interviewer_id"=>"22",
            "interview_type_id"=>"2",
            "scheduled_on"=>"2017-06-23 15:45:00",
            "notes"=>"",
            "rating"=>"0",
            "status"=>"Pending"
        );

        $data12 = array(
            "application_id"=>"1",
            "interviewer_id"=>"20",
            "interview_type_id"=>"4",
            "scheduled_on"=>"2017-06-24 15:45:00",
            "notes"=>"",
            "rating"=>"0",
            "status"=>"Pending"
        );

        $data13 = array(
            "application_id"=>"1",
            "interviewer_id"=>"20",
            "interview_type_id"=>"1",
            "scheduled_on"=>"2017-06-25 15:45:00",
            "notes"=>"",
            "rating"=>"0",
            "status"=>"Pending"
        );

        $data14 = array(
            "application_id"=>"2",
            "interviewer_id"=>"22",
            "interview_type_id"=>"1",
            "scheduled_on"=>"2017-06-23 15:26:00",
            "notes"=>"",
            "rating"=>"0",
            "status"=>"Pending"
        );

        $data15 = array(
            "application_id"=>"2",
            "interviewer_id"=>"22",
            "interview_type_id"=>"1",
            "scheduled_on"=>"2017-06-29 15:45:00",
            "notes"=>"",
            "rating"=>"0",
            "status"=>"Pending"
        );


        DB::table('interviews')->insert(array($data1,$data2,$data3,$data4,$data5,$data6,$data7,$data8,$data9,$data10,$data11,$data12,$data13,$data14,$data15));



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
