<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });


        $data1 = array("name"=>"Face to Face");
        $data2 = array("name"=>"Video Call");
        $data3 = array("name"=>"Phone Call");
        $data4 = array("name"=>"Task Oriented");
        $data5 = array("name"=>"Competency Based");
        DB::table('interview_types')->insert(array($data1,$data2,$data3,$data4,$data5));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interview_types');
    }
}
