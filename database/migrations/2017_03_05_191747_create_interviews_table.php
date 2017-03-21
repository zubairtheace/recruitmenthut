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
            $table->text('notes');
            $table->date('scheduled_on');
            $table->float('rating');
            $table->integer('interview_type_id')->unsigned();
            $table->integer('candidate_id')->unsigned();
            $table->integer('recruiter_id')->unsigned();
            $table->integer('vacancy_id')->unsigned();
            $table->foreign('interview_type_id')->references('id')->on('interview_types');
            $table->foreign('candidate_id')->references('id')->on('users');
            $table->foreign('recruiter_id')->references('id')->on('users');
            $table->foreign('vacancy_id')->references('id')->on('vacancies');
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
        Schema::dropIfExists('interviews');
    }
}
