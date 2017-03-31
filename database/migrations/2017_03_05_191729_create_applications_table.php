<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('candidate_id')->unsigned();
            $table->integer('vacancy_id')->unsigned();
            $table->date('date_applied');
            $table->float('overall_rating')->default('0');
            $table->foreign('vacancy_id')->references('id')->on('vacancies');
            $table->foreign('candidate_id')->references('id')->on('users');
            $table->timestamps();
        });

        $data1 = array(
            "candidate_id"=>"1", //id should be relative to the table users with user_types = 1 or 2
            "vacancy_id"=>"1", // id should be between id's in vacancy table
            "date_applied"=>"2017-02-11", // format is yyyy-mm-dd //Make sure date is before closing date of that particular vacancy
            "overall_rating"=>"5" // between 1 and 10
        );

        $data2 = array(
            "candidate_id"=>"2", //id should be relative to the table users with user_types = 1 or 2
            "vacancy_id"=>"2", // id should be between id's in vacancy table
            "date_applied"=>"2017-03-20", // format is yyyy-mm-dd //Make sure date is before closing date of that particular vacancy
            "overall_rating"=>"7" // between 1 and 10
        );

        $data3 = array(
            "candidate_id"=>"3", //id should be relative to the table users with user_types = 1 or 2
            "vacancy_id"=>"3", // id should be between id's in vacancy table
            "date_applied"=>"2017-01-19", // format is yyyy-mm-dd //Make sure date is before closing date of that particular vacancy
            "overall_rating"=>"2" // between 1 and 10
        );

        $data4 = array(
            "candidate_id"=>"4", //id should be relative to the table users with user_types = 1 or 2
            "vacancy_id"=>"4", // id should be between id's in vacancy table
            "date_applied"=>"2016-05-20", // format is yyyy-mm-dd //Make sure date is before closing date of that particular vacancy
            "overall_rating"=>"4" // between 1 and 10
        );

        $data5 = array(
            "candidate_id"=>"5", //id should be relative to the table users with user_types = 1 or 2
            "vacancy_id"=>"5", // id should be between id's in vacancy table
            "date_applied"=>"2016-03-02", // format is yyyy-mm-dd //Make sure date is before closing date of that particular vacancy
            "overall_rating"=>"8" // between 1 and 10
        );

        $data6 = array(
            "candidate_id"=>"6", //id should be relative to the table users with user_types = 1 or 2
            "vacancy_id"=>"6", // id should be between id's in vacancy table
            "date_applied"=>"2016-08-25", // format is yyyy-mm-dd //Make sure date is before closing date of that particular vacancy
            "overall_rating"=>"9" // between 1 and 10
        );

        $data7 = array(
            "candidate_id"=>"7", //id should be relative to the table users with user_types = 1 or 2
            "vacancy_id"=>"7", // id should be between id's in vacancy table
            "date_applied"=>"2016-09-10", // format is yyyy-mm-dd //Make sure date is before closing date of that particular vacancy
            "overall_rating"=>"10" // between 1 and 10
        );

        $data8 = array(
            "candidate_id"=>"8", //id should be relative to the table users with user_types = 1 or 2
            "vacancy_id"=>"8", // id should be between id's in vacancy table
            "date_applied"=>"2016-07-27", // format is yyyy-mm-dd //Make sure date is before closing date of that particular vacancy
            "overall_rating"=>"9" // between 1 and 10
        );

        $data9 = array(
            "candidate_id"=>"9", //id should be relative to the table users with user_types = 1 or 2
            "vacancy_id"=>"9", // id should be between id's in vacancy table
            "date_applied"=>"2016-10-20", // format is yyyy-mm-dd //Make sure date is before closing date of that particular vacancy
            "overall_rating"=>"4" // between 1 and 10
        );

        $data10 = array(
            "candidate_id"=>"10", //id should be relative to the table users with user_types = 1 or 2
            "vacancy_id"=>"10", // id should be between id's in vacancy table
            "date_applied"=>"2016-04-20", // format is yyyy-mm-dd //Make sure date is before closing date of that particular vacancy
            "overall_rating"=>"6" // between 1 and 10
        );

        $data11 = array(
            "candidate_id"=>"11", //id should be relative to the table users with user_types = 1 or 2
            "vacancy_id"=>"11", // id should be between id's in vacancy table
            "date_applied"=>"2017-02-10", // format is yyyy-mm-dd //Make sure date is before closing date of that particular vacancy
            "overall_rating"=>"3" // between 1 and 10
        );

        $data12 = array(
            "candidate_id"=>"12", //id should be relative to the table users with user_types = 1 or 2
            "vacancy_id"=>"12", // id should be between id's in vacancy table
            "date_applied"=>"2017-01-20", // format is yyyy-mm-dd //Make sure date is before closing date of that particular vacancy
            "overall_rating"=>"7" // between 1 and 10
        );

        $data13 = array(
            "candidate_id"=>"13", //id should be relative to the table users with user_types = 1 or 2
            "vacancy_id"=>"13", // id should be between id's in vacancy table
            "date_applied"=>"2017-02-01", // format is yyyy-mm-dd //Make sure date is before closing date of that particular vacancy
            "overall_rating"=>"5" // between 1 and 10
        );

        $data14 = array(
            "candidate_id"=>"14", //id should be relative to the table users with user_types = 1 or 2
            "vacancy_id"=>"14", // id should be between id's in vacancy table
            "date_applied"=>"2017-01-28", // format is yyyy-mm-dd //Make sure date is before closing date of that particular vacancy
            "overall_rating"=>"10" // between 1 and 10
        );

        $data15 = array(
            "candidate_id"=>"15", //id should be relative to the table users with user_types = 1 or 2
            "vacancy_id"=>"15", // id should be between id's in vacancy table
            "date_applied"=>"2017-03-20", // format is yyyy-mm-dd //Make sure date is before closing date of that particular vacancy
            "overall_rating"=>"8" // between 1 and 10
        );


        DB::table('applications')->insert(array($data1,$data2,$data3,$data4,$data5,$data6,$data7,$data8,$data9,$data10,$data11,$data12,$data13,$data14,$data15));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
