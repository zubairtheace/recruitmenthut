<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('closing_date');
            $table->text('description');
            $table->timestamps();
        });

        // //15 sample vacancies
        // $data1 = array(
        //     "name"=>"Back end developper",
        //     "closing_date"=>"2017-12-31", // format is yyyy-mm-dd
        //     "description"=>"Short paragraph on job"
        // );
        //
        // $data2 = array(
        //     "name"=>"Front end developper",
        //     "closing_date"=>"2017-11-31", // format is yyyy-mm-dd
        //     "description"=>"Short paragraph on job"
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
        Schema::dropIfExists('vacancies');
    }
}
