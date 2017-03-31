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

        //15 samples of interviews with some pointed towards the same application
        $data1 = array(
            "application_id"=>"1", //id should be between id's in applicatoin table
            "interviewer_id"=>"20", //id should be relative to the table users with user_types = 3 or 4
            "interview_type_id"=>"1", // id should be between id's in interview_types table
            "scheduled_on"=>"2017-04-20", // format is yyyy-mm-dd //Make sure date is after that particular application has been made
            "notes"=>"Good knowledge on modern technologies.",
            "rating"=>"6" //between 1 and 10
        );

        $data2 = array(
            "application_id"=>"1", //id should be between id's in applicatoin table
            "interviewer_id"=>"20", //id should be relative to the table users with user_types = 3 or 4
            "interview_type_id"=>"2", // id should be between id's in interview_types table
            "scheduled_on"=>"2017-05-20", // format is yyyy-mm-dd //Make sure date is after that particular application has been made
            "notes"=>"Too underconfident.",
            "rating"=>"4" //between 1 and 10
        );

        $data3 = array(
            "application_id"=>"2", //id should be between id's in applicatoin table
            "interviewer_id"=>"22", //id should be relative to the table users with user_types = 3 or 4
            "interview_type_id"=>"1", // id should be between id's in interview_types table
            "scheduled_on"=>"2017-04-20", // format is yyyy-mm-dd //Make sure date is after that particular application has been made
            "notes"=>"Can do much better.",
            "rating"=>"6" //between 1 and 10
        );

        $data4 = array(
            "application_id"=>"2", //id should be between id's in applicatoin table
            "interviewer_id"=>"22", //id should be relative to the table users with user_types = 3 or 4
            "interview_type_id"=>"2", // id should be between id's in interview_types table
            "scheduled_on"=>"2017-05-27", // format is yyyy-mm-dd //Make sure date is after that particular application has been made
            "notes"=>"Has the potential.",
            "rating"=>"8" //between 1 and 10
        );

        $data5 = array(
            "application_id"=>"2", //id should be between id's in applicatoin table
            "interviewer_id"=>"22", //id should be relative to the table users with user_types = 3 or 4
            "interview_type_id"=>"3", // id should be between id's in interview_types table
            "scheduled_on"=>"2017-03-31", // format is yyyy-mm-dd //Make sure date is after that particular application has been made
            "notes"=>"Can be a good candidate for this post.",
            "rating"=>"7" //between 1 and 10
        );

        $data6 = array(
            "application_id"=>"3", //id should be between id's in applicatoin table
            "interviewer_id"=>"32", //id should be relative to the table users with user_types = 3 or 4
            "interview_type_id"=>"1", // id should be between id's in interview_types table
            "scheduled_on"=>"2017-05-01", // format is yyyy-mm-dd //Make sure date is after that particular application has been made
            "notes"=>"Has no work experice and studies does not match the field required.",
            "rating"=>"2" //between 1 and 10
        );

        $data7 = array(
            "application_id"=>"7", //id should be between id's in applicatoin table
            "interviewer_id"=>"25", //id should be relative to the table users with user_types = 3 or 4
            "interview_type_id"=>"1", // id should be between id's in interview_types table
            "scheduled_on"=>"2016-10-20", // format is yyyy-mm-dd //Make sure date is after that particular application has been made
            "notes"=>"Has good knowledge.",
            "rating"=>"10" //between 1 and 10
        );

        $data8 = array(
            "application_id"=>"7", //id should be between id's in applicatoin table
            "interviewer_id"=>"25", //id should be relative to the table users with user_types = 3 or 4
            "interview_type_id"=>"4", // id should be between id's in interview_types table
            "scheduled_on"=>"2016-11-20", // format is yyyy-mm-dd //Make sure date is after that particular application has been made
            "notes"=>"Has the sskill required for this post.",
            "rating"=>"10" //between 1 and 10
        );

        $data9 = array(
            "application_id"=>"7", //id should be between id's in applicatoin table
            "interviewer_id"=>"25", //id should be relative to the table users with user_types = 3 or 4
            "interview_type_id"=>"2", // id should be between id's in interview_types table
            "scheduled_on"=>"2016-12-01", // format is yyyy-mm-dd //Make sure date is after that particular application has been made
            "notes"=>"Has good communication skils.",
            "rating"=>"10" //between 1 and 10
        );

        $data10 = array(
            "application_id"=>"12", //id should be between id's in applicatoin table
            "interviewer_id"=>"40", //id should be relative to the table users with user_types = 3 or 4
            "interview_type_id"=>"1", // id should be between id's in interview_types table
            "scheduled_on"=>"2017-01-30", // format is yyyy-mm-dd //Make sure date is after that particular application has been made
            "notes"=>"Not too satisfied with the experince of work of candidate.",
            "rating"=>"7" //between 1 and 10
        );

        $data11 = array(
            "application_id"=>"12", //id should be between id's in applicatoin table
            "interviewer_id"=>"40", //id should be relative to the table users with user_types = 3 or 4
            "interview_type_id"=>"2", // id should be between id's in interview_types table
            "scheduled_on"=>"2017-02-20", // format is yyyy-mm-dd //Make sure date is after that particular application has been made
            "notes"=>"Certificates are good.",
            "rating"=>"7" //between 1 and 10
        );

        $data12 = array(
            "application_id"=>"12", //id should be between id's in applicatoin table
            "interviewer_id"=>"40", //id should be relative to the table users with user_types = 3 or 4
            "interview_type_id"=>"4", // id should be between id's in interview_types table
            "scheduled_on"=>"2017-03-20", // format is yyyy-mm-dd //Make sure date is after that particular application has been made
            "notes"=>"Skills is okay but can do much better.",
            "rating"=>"7" //between 1 and 10
        );

        $data13 = array(
            "application_id"=>"9", //id should be between id's in applicatoin table
            "interviewer_id"=>"27", //id should be relative to the table users with user_types = 3 or 4
            "interview_type_id"=>"1", // id should be between id's in interview_types table
            "scheduled_on"=>"2016-11-20", // format is yyyy-mm-dd //Make sure date is after that particular application has been made
            "notes"=>"Too underconfident.",
            "rating"=>"4" //between 1 and 10
        );

        $data14 = array(
            "application_id"=>"15", //id should be between id's in applicatoin table
            "interviewer_id"=>"29", //id should be relative to the table users with user_types = 3 or 4
            "interview_type_id"=>"1", // id should be between id's in interview_types table
            "scheduled_on"=>"2017-03-25", // format is yyyy-mm-dd //Make sure date is after that particular application has been made
            "notes"=>"Candidate has good education background but communication skills is not good enough.",
            "rating"=>"7" //between 1 and 10
        );

        $data15 = array(
            "application_id"=>"15", //id should be between id's in applicatoin table
            "interviewer_id"=>"29", //id should be relative to the table users with user_types = 3 or 4
            "interview_type_id"=>"1", // id should be between id's in interview_types table
            "scheduled_on"=>"2017-03-31", // format is yyyy-mm-dd //Make sure date is after that particular application has been made
            "notes"=>"Candidate was communicating better than on first interview.",
            "rating"=>"9" //between 1 and 10
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
