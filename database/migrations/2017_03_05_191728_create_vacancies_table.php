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
            $table->softDeletes();
            //$table->string('status')->nullable()->default('visible');
        });

        $data1 = array(
            "name"=>"Back end developper",
            "closing_date"=>"2017-12-28", // format is yyyy-mm-dd
            "description"=>"Candidate will be responsible for server side web application logic and integration of the work of front end developers."
        );

        $data2 = array(
            "name"=>"Front end developper",
            "closing_date"=>"2017-11-28", // format is yyyy-mm-dd
            "description"=>"You should have a knowledge for the implementation of visual and interactive elements that users engage with when browsing the web application."
        );

        $data3 = array(
            "name"=>"Human Resource Manager",
            "closing_date"=>"2017-11-28", // format is yyyy-mm-dd
            "description"=>"The responsabilities of this post is to maintain and enhance the organisation's human resources by planning and implementing employee relations and human resources policies, programs and practices."
        );

        $data4 = array(
            "name"=>"Software Engineer",
            "closing_date"=>"2016-11-28", // format is yyyy-mm-dd
            "description"=>"Candidates will be handed the responsabilities of developing information systems by designing, developing and installing software solutions."
        );

        $data5 = array(
            "name"=>"Web Master",
            "closing_date"=>"2016-11-28", // format is yyyy-mm-dd
            "description"=>"Web masters helps in the development of a website by managing the website and perform continual maintainance such as daabase and links."
        );

        $data6 = array(
            "name"=>"Technical Director",
            "closing_date"=>"2016-11-28", // format is yyyy-mm-dd
            "description"=>"This post requires the highest level of technical skills that a company needs, candidates should be able to manage a team of developers and assits them when a critical situation arise."
        );

        $data7 = array(
            "name"=>"Network Engineer",
            "closing_date"=>"2016-11-28", // format is yyyy-mm-dd
            "description"=>"Candidates should be able to establish and maintain network performance by building net configurations and connections."
        );

        $data8 = array(
            "name"=>"Web Analyst",
            "closing_date"=>"2016-11-28", // format is yyyy-mm-dd
            "description"=>"Candidtaes should have a proper knowledge of analysis on a system to resolve application issues and to provide appropriate solutions to the problems."
        );

        $data9 = array(
            "name"=>"Graphic Designer",
            "closing_date"=>"2016-11-28", // format is yyyy-mm-dd
            "description"=>"Candidates should have a knowledge on preparing visual presentations by designing art and copy layouts."
        );

        $data10 = array(
            "name"=>"Digital Designer",
            "closing_date"=>"2016-11-28", // format is yyyy-mm-dd
            "description"=>"Candidates need to web and mobile standards, to have a good knowledge of designing techniques, interactive tools and principles, media production and brand development."
        );

        $data11 = array(
            "name"=>"Quality Assurance Officer",
            "closing_date"=>"2017-11-28", // format is yyyy-mm-dd
            "description"=>"Candidates should be able to review requirements, specifications and technical design documents to provide timely and meaningful feedback, and they should be able to fully test a problem and report any issues."
        );

        $data12 = array(
            "name"=>"Marketing Director",
            "closing_date"=>"2017-11-28", // format is yyyy-mm-dd
            "description"=>"Candidates should be able to lead a team of marketing officer and assist them if ever help is needed."
        );

        $data13 = array(
            "name"=>"Marketing Officer",
            "closing_date"=>"2017-11-28", // format is yyyy-mm-dd
            "description"=>"Candidates will be responsible for all marketing strategies and activities within the company."
        );

        $data14 = array(
            "name"=>"Project Coordinator",
            "closing_date"=>"2017-11-28", // format is yyyy-mm-dd
            "description"=>"The responsabilities of this post is to accomplish department obk=jective by meeting work and cost standards and to provide work direction to staffs."
        );

        $data15 = array(
            "name"=>"System Analyst",
            "closing_date"=>"2017-11-28", // format is yyyy-mm-dd
            "description"=>"A system analyst must implement the computer system requirements by defining and analysing system problems, designing and testing standards and solutions."
        );


        DB::table('vacancies')->insert(array($data1,$data2,$data3,$data4,$data5,$data6,$data7,$data8,$data9,$data10,$data11,$data12,$data13,$data14,$data15));


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
