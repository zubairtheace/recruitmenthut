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
