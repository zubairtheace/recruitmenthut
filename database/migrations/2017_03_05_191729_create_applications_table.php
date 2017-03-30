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

        // // 15 sample applications
        // $data1 = array(
        //     "candidate_id"=>"1", //id should be relative to the table users with user_types = 1 or 2
        //     "vacancy_id"=>"2", // id should be between id's in vacancy table
        //     "date_applied"=>"2017-11-31", // format is yyyy-mm-dd //Make sure date is before closing date of that particular vacancy
        //     "overall_rating"=>"5" // between 1 and 10
        // );
        //
        // $data2 = array(
        //     "candidate_id"=>"3", //id should be relative to the table users with user_types = 1 or 2
        //     "vacancy_id"=>"5", // id should be between id's in vacancy table
        //     "date_applied"=>"2017-11-20", // format is yyyy-mm-dd //Make sure date is before closing date of that particular vacancy
        //     "overall_rating"=>"7" // between 1 and 10
        // );
        //
        // DB::table('vacancies')->insert(array($data1,$data2));
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
