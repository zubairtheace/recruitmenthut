<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->text('cv');
            $table->text('certificates');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });

        //Fill for all users with user_type_id = 1 or 2
        $data1 = array(
            "user_id"=>"1",
            "cv"=>"cv1.pdf",
            "certificates"=>"certificates1.pdf" //create sample certificates pdf with only names and data accurate, add other sample text, do this for all candidates and recruited candidates, which means certificates1, certificates2 etc.
        );

        $data2 = array(
            "user_id"=>"2",
            "cv"=>"cv2.pdf",
            "certificates"=>"certificates2.pdf"
        );

        $data3 = array(
            "user_id"=>"3",
            "cv"=>"cv3.pdf",
            "certificates"=>"certificates3.pdf"
        );

        $data4 = array(
            "user_id"=>"4",
            "cv"=>"cv4.pdf",
            "certificates"=>"certificates4.pdf"
        );

        $data5 = array(
            "user_id"=>"5",
            "cv"=>"cv5.pdf",
            "certificates"=>"certificates5.pdf"
        );

        $data6 = array(
            "user_id"=>"6",
            "cv"=>"cv6.pdf",
            "certificates"=>"certificates6.pdf"
        );

        $data7 = array(
            "user_id"=>"7",
            "cv"=>"cv7.pdf",
            "certificates"=>"certificates7.pdf"
        );

        $data8 = array(
            "user_id"=>"8",
            "cv"=>"cv8.pdf",
            "certificates"=>"certificates8.pdf"
        );

        $data9 = array(
            "user_id"=>"9",
            "cv"=>"cv9.pdf",
            "certificates"=>"certificates9.pdf"
        );

        $data10 = array(
            "user_id"=>"10",
            "cv"=>"cv10.pdf",
            "certificates"=>"certificates10.pdf"
        );

        $data11 = array(
            "user_id"=>"11",
            "cv"=>"cv11.pdf",
            "certificates"=>"certificates11.pdf"
        );

        $data12 = array(
            "user_id"=>"12",
            "cv"=>"cv12.pdf",
            "certificates"=>"certificates12.pdf"
        );

        $data13 = array(
            "user_id"=>"13",
            "cv"=>"cv13.pdf",
            "certificates"=>"certificates13.pdf"
        );

        $data14 = array(
            "user_id"=>"14",
            "cv"=>"cv14.pdf",
            "certificates"=>"certificates14.pdf"
        );

        $data15 = array(
            "user_id"=>"15",
            "cv"=>"cv15.pdf",
            "certificates"=>"certificates15.pdf"
        );

        $data16 = array(
            "user_id"=>"16",
            "cv"=>"cv16.pdf",
            "certificates"=>"certificates16.pdf"
        );

        $data17 = array(
            "user_id"=>"17",
            "cv"=>"cv17.pdf",
            "certificates"=>"certificates17.pdf"
        );

        $data18 = array(
            "user_id"=>"18",
            "cv"=>"cv18.pdf",
            "certificates"=>"certificates18.pdf"
        );

        $data19 = array(
            "user_id"=>"19",
            "cv"=>"cv19.pdf",
            "certificates"=>"certificates19.pdf"
        );

        $data20 = array(
            "user_id"=>"20",
            "cv"=>"cv20.pdf",
            "certificates"=>"certificates20.pdf"
        );


        DB::table('candidate_infos')->insert(array($data1,$data2,$data3,$data4,$data5,$data6,$data7,$data8,$data9,$data10,$data11,$data12,$data13,$data14,$data15,$data16,$data17,$data18,$data19,$data20));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_infos');
    }
}
