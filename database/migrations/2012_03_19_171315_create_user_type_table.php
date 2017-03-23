<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        $data1 = array("name"=>"Candidate"); //id=1
        $data2 = array("name"=>"Recruited Candidate"); //id=2
        $data3 = array("name"=>"Interviewer"); //id=3
        $data4 = array("name"=>"Human Resource Manager"); //id=4
        DB::table('user_types')->insert(array($data1,$data2,$data3,$data4));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_types');
    }
}
