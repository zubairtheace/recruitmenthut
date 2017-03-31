<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        $data1 = array("name"=>"Technical Director");
        $data2 = array("name"=>"Managing Director");
        $data3 = array("name"=>"Web Designer");
        $data4 = array("name"=>"Front End Developer");
        $data5 = array("name"=>"Back End Developer");
        $data6 = array("name"=>"Graphic Designer");
        $data7 = array("name"=>"Digital Designer");
        $data8 = array("name"=>"Marketing Officer");
        $data9 = array("name"=>"Software Engineer");
        $data10 = array("name"=>"Human Resource Officer");
        $data11 = array("name"=>"Back End Developer Trainer");
        $data12 = array("name"=>"Front End Developer Trainer");
        $data13 = array("name"=>"Software Engineer Trainer");
        $data14 = array("name"=>"Network Technician");
        $data15 = array("name"=>"Web Analyst");
        $data16 = array("name"=>"Web Master");
        $data17 = array("name"=>"Quality Assurance Officer");
        $data18 = array("name"=>"Network Engineer");
        $data19 = array("name"=>"Marketing Director");
        $data20 = array("name"=>"Project Coordinator");
        $data21 = array("name"=>"System Analyst");
        $data22 = array("name"=>"Front End Development Team Leader");
        $data23 = array("name"=>"Back End Development Team Leader");
        $data24 = array("name"=>"Software Development Team Leader");
        $data25 = array("name"=>"Human Resource Manager");
        DB::table('positions')->insert(array($data1,$data2,$data3,$data4,$data5,$data6,$data7,$data8,$data9,$data10,$data11,$data12,$data13,$data14,$data15,$data16,$data17,$data18,$data19,$data20,$data21,$data22,$data23,$data24,$data25));


    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
    }
}
