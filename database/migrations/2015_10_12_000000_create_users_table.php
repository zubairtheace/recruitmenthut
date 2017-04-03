<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_type_id')->unsigned()->default('1');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('nic');
            $table->string('gender');
            $table->date('dob');
            $table->string('marital_status');
            $table->string('address');
            $table->integer('phone_number');
            $table->integer('mobile_number');
            $table->string('email')->unique();
            $table->string('password');
            $table->foreign('user_type_id')->references('id')->on('user_types');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        $data1 = array(
            "user_type_id"=>"1",//10 users within each types (candidate = 1, registered candidate = 2, interviewer = 3, HR = 4)
            "first_name"=>"Zubair",
            "last_name"=>"Tofy",
            "nic"=>"T1234567896541", // unique
            "gender"=>"male",//male or female
            "dob"=>"2017-12-28", // format is yyyy-mm-dd
            "marital_status"=>"single",//single or married
            "Address"=>"Avenue Cardinal 5,Les Guibies, Pailles",
            "phone_number"=>"2860480",//7 digits
            "mobile_number"=>"59455867",//8 digits
            "email"=>"tofy.zubair@gmail.com",// unique
            "password"=>bcrypt("123456")// set all password to 123456
        );

        $data2 = array(
            "user_type_id"=>"1",//10 users within each types (candidate = 1, registered candidate = 2, interviewer = 3, HR = 4)
            "first_name"=>"Candidate",
            "last_name"=>"Example",
            "nic"=>"W1594632178563", // unique
            "gender"=>"male",//male or female
            "dob"=>"1990-12-04", // format is yyyy-mm-dd
            "marital_status"=>"married",//single or married
            "Address"=>"Port Louis",
            "phone_number"=>"2659462",//7 digits
            "mobile_number"=>"59856322",//8 digits
            "email"=>"candidate@example.com",// unique
            "password"=>bcrypt("123456")// set all password to 123456
        );

        $data3 = array(
            "user_type_id"=>"1",//10 users within each types (candidate = 1, registered candidate = 2, interviewer = 3, HR = 4)
            "first_name"=>"Adam",
            "last_name"=>"Jonny",
            "nic"=>"A7894561225854", // unique
            "gender"=>"male",//male or female
            "dob"=>"1980-02-03", // format is yyyy-mm-dd
            "marital_status"=>"single",//single or married
            "Address"=>"Bel Air",
            "phone_number"=>"8946200",//7 digits
            "mobile_number"=>"59687453",//8 digits
            "email"=>"adam@jonny.com",// unique
            "password"=>bcrypt("123456")// set all password to 123456
        );

        $data4 = array(
            "user_type_id"=>"1",//10 users within each types (candidate = 1, registered candidate = 2, interviewer = 3, HR = 4)
            "first_name"=>"Cole",
            "last_name"=>"Manny",
            "nic"=>"M1491599776633", // unique
            "gender"=>"male",//male or female
            "dob"=>"1959-01-28", // format is yyyy-mm-dd
            "marital_status"=>"married",//single or married
            "Address"=>"Terre Rouge",
            "phone_number"=>"2789321",//7 digits
            "mobile_number"=>"58654230",//8 digits
            "email"=>"cole@manny.com",// unique
            "password"=>bcrypt("123456")// set all password to 123456
        );

        $data5 = array(
            "user_type_id"=>"1",//10 users within each types (candidate = 1, registered candidate = 2, interviewer = 3, HR = 4)
            "first_name"=>"Hubert",
            "last_name"=>"Tuffy",
            "nic"=>"H2849325893002", // unique
            "gender"=>"male",//male or female
            "dob"=>"1994-03-15", // format is yyyy-mm-dd
            "marital_status"=>"single",//single or married
            "Address"=>"Moka",
            "phone_number"=>"2441100",//7 digits
            "mobile_number"=>"56552200",//8 digits
            "email"=>"hubert@tuffy.com",// unique
            "password"=>bcrypt("123456")// set all password to 123456
        );

        $data6 = array(
            "user_type_id"=>"1",//10 users within each types (candidate = 1, registered candidate = 2, interviewer = 3, HR = 4)
            "first_name"=>"Jacky",
            "last_name"=>"Copain",
            "nic"=>"X5558756645661", // unique
            "gender"=>"female",//male or female
            "dob"=>"2015-10-11", // format is yyyy-mm-dd
            "marital_status"=>"single",//single or married
            "Address"=>"Flic-en-Flac",
            "phone_number"=>"2225544",//7 digits
            "mobile_number"=>"59222254",//8 digits
            "email"=>"Jacky@Copain.com",// unique
            "password"=>bcrypt("123456")// set all password to 123456
        );

        $data7 = array(
            "user_type_id"=>"1",//10 users within each types (candidate = 1, registered candidate = 2, interviewer = 3, HR = 4)
            "first_name"=>"Lara",
            "last_name"=>"Kraff",
            "nic"=>"K1185625142595", // unique
            "gender"=>"female",//male or female
            "dob"=>"2000-12-28", // format is yyyy-mm-dd
            "marital_status"=>"married",//single or married
            "Address"=>"St Pierre",
            "phone_number"=>"2222221",//7 digits
            "mobile_number"=>"59999998",//8 digits
            "email"=>"lara@kraff.com",// unique
            "password"=>bcrypt("123456")// set all password to 123456
        );

        $data8 = array(
            "user_type_id"=>"1",//10 users within each types (candidate = 1, registered candidate = 2, interviewer = 3, HR = 4)
            "first_name"=>"Haze",
            "last_name"=>"Kibling",
            "nic"=>"K1234567899874", // unique
            "gender"=>"female",//male or female
            "dob"=>"2017-02-20", // format is yyyy-mm-dd
            "marital_status"=>"single",//single or married
            "Address"=>"Grand Baie",
            "phone_number"=>"2000002",//7 digits
            "mobile_number"=>"59555557",//8 digits
            "email"=>"haze@kibling.com",// unique
            "password"=>bcrypt("123456")// set all password to 123456
        );

        $data9 = array(
            "user_type_id"=>"1",//10 users within each types (candidate = 1, registered candidate = 2, interviewer = 3, HR = 4)
            "first_name"=>"Lucy",
            "last_name"=>"Koff",
            "nic"=>"L4745857412561", // unique
            "gender"=>"female",//male or female
            "dob"=>"2010-12-28", // format is yyyy-mm-dd
            "marital_status"=>"married",//single or married
            "Address"=>"Grand Gaube",
            "phone_number"=>"2888888",//7 digits
            "mobile_number"=>"59111101",//8 digits
            "email"=>"lucy@koff.com",// unique
            "password"=>bcrypt("123456")// set all password to 123456
        );

        $data10 = array(
            "user_type_id"=>"1",//10 users within each types (candidate = 1, registered candidate = 2, interviewer = 3, HR = 4)
            "first_name"=>"Ponny",
            "last_name"=>"Tail",
            "nic"=>"P8885552221463", // unique
            "gender"=>"female",//male or female
            "dob"=>"1998-04-15", // format is yyyy-mm-dd
            "marital_status"=>"single",//single or married
            "Address"=>"Line Barracks",
            "phone_number"=>"2999963",//7 digits
            "mobile_number"=>"59546452",//8 digits
            "email"=>"ponny@tail.com",// unique
            "password"=>bcrypt("123456")// set all password to 123456
        );

        $data11 = array(
            "user_type_id"=>"2",
            "first_name"=>"Tawfeeq",
            "last_name"=>"Heetun",
            "nic"=>"H280519944605499",
            "gender"=>"male",
            "dob"=>"1994-05-28",
            "marital_status"=>"single",
            "Address"=>"13, Imam Bacosse Sobdar Street, Port Louis",
            "phone_number"=>"2163691",
            "mobile_number"=>"59106629",
            "email"=>"heetun.tawfeeq1@gmail.com",
            "password"=>bcrypt("123456")
        );

        $data12 = array(
            "user_type_id"=>"2",
            "first_name"=>"Ivan",
            "last_name"=>"Danny",
            "nic"=>"D1444774455212",
            "gender"=>"male",
            "dob"=>"2016-11-30",
            "marital_status"=>"married",
            "Address"=>"Phoenix",
            "phone_number"=>"2000147",
            "mobile_number"=>"59335447",
            "email"=>"ivan@danny.com",
            "password"=>bcrypt("123456")
        );

        $data13 = array(
            "user_type_id"=>"2",
            "first_name"=>"Pierre",
            "last_name"=>"Rock",
            "nic"=>"P0022330011023",
            "gender"=>"male",
            "dob"=>"2014-01-28",
            "marital_status"=>"married",
            "Address"=>"Plaisance",
            "phone_number"=>"2777774",
            "mobile_number"=>"59111114",
            "email"=>"pierre@rock.com",
            "password"=>bcrypt("123456")
        );

        $data14 = array(
            "user_type_id"=>"2",
            "first_name"=>"Registered Candidate",
            "last_name"=>"Example",
            "nic"=>"J9998885556663",
            "gender"=>"male",
            "dob"=>"1999-11-30",
            "marital_status"=>"married",
            "Address"=>"Rose Hill",
            "phone_number"=>"2000003",
            "mobile_number"=>"59000001",
            "email"=>"registeredcandidate@example.com",
            "password"=>bcrypt("123456")
        );

        $data15 = array(
            "user_type_id"=>"2",
            "first_name"=>"Paul",
            "last_name"=>"Hitman",
            "nic"=>"H8786542656466",
            "gender"=>"male",
            "dob"=>"1997-04-28",
            "marital_status"=>"married",
            "Address"=>"Beau Bassin",
            "phone_number"=>"2247960",
            "mobile_number"=>"59788777",
            "email"=>"paul@hitman.com",
            "password"=>bcrypt("123456")
        );

        $data16 = array(
            "user_type_id"=>"2",
            "first_name"=>"Katie",
            "last_name"=>"Larmas",
            "nic"=>"K0036987452100",
            "gender"=>"female",
            "dob"=>"2017-11-14",
            "marital_status"=>"single",
            "Address"=>"Coromandel",
            "phone_number"=>"2222110",
            "mobile_number"=>"59265478",
            "email"=>"katie@larmas.com",
            "password"=>bcrypt("123456")
        );

        $data17 = array(
            "user_type_id"=>"2",
            "first_name"=>"Thea",
            "last_name"=>"Queen",
            "nic"=>"Q7894561228220",
            "gender"=>"female",
            "dob"=>"2017-11-28",
            "marital_status"=>"single",
            "Address"=>"Triolet",
            "phone_number"=>"2000005",
            "mobile_number"=>"59450007",
            "email"=>"thea@queen.com",
            "password"=>bcrypt("123456")
        );

        $data18 = array(
            "user_type_id"=>"2",
            "first_name"=>"Laurel",
            "last_name"=>"Lance",
            "nic"=>"L7569841230000",
            "gender"=>"female",
            "dob"=>"2017-11-28",
            "marital_status"=>"single",
            "Address"=>"Plaine Des Papayes",
            "phone_number"=>"2860011",
            "mobile_number"=>"59457777",
            "email"=>"laurel@lance.com",
            "password"=>bcrypt("123456")
        );

        $data19 = array(
            "user_type_id"=>"2",
            "first_name"=>"Moira",
            "last_name"=>"Steward",
            "nic"=>"S8525852014796",
            "gender"=>"female",
            "dob"=>"2017-11-28",
            "marital_status"=>"single",
            "Address"=>"Bassin Blanc",
            "phone_number"=>"20022001",
            "mobile_number"=>"59001144",
            "email"=>"moira@steward.com",
            "password"=>bcrypt("123456")
        );

        $data20 = array(
            "user_type_id"=>"2",
            "first_name"=>"Sara",
            "last_name"=>"Ghul",
            "nic"=>"S7777441102589",
            "gender"=>"female",
            "dob"=>"2017-11-28",
            "marital_status"=>"single",
            "Address"=>"Riviere des Galets",
            "phone_number"=>"2860410",
            "mobile_number"=>"59455967",
            "email"=>"sara@ghul.com",
            "password"=>bcrypt("123456")
        );

        $data21 = array(
            "user_type_id"=>"3",
            "first_name"=>"Interviewer",
            "last_name"=>"Example",
            "nic"=>"V1444774455212",
            "gender"=>"male",
            "dob"=>"2016-11-28",
            "marital_status"=>"married",
            "Address"=>"Cite Valleji",
            "phone_number"=>"2000147",
            "mobile_number"=>"59335447",
            "email"=>"interviewer@example.com",
            "password"=>bcrypt("123456")
        );

        $data22 = array(
            "user_type_id"=>"3",
            "first_name"=>"Collen",
            "last_name"=>"Velloo",
            "nic"=>"C1445632100000",
            "gender"=>"male",
            "dob"=>"2016-11-28",
            "marital_status"=>"married",
            "Address"=>"Vacoas",
            "phone_number"=>"2000147",
            "mobile_number"=>"59335447",
            "email"=>"collen@velloo.com",
            "password"=>bcrypt("123456")
        );

        $data23 = array(
            "user_type_id"=>"3",
            "first_name"=>"Peaufine",
            "last_name"=>"Lefils",
            "nic"=>"P88844455577774",
            "gender"=>"male",
            "dob"=>"2016-11-28",
            "marital_status"=>"married",
            "Address"=>"Quatre Bornes",
            "phone_number"=>"2000147",
            "mobile_number"=>"59335447",
            "email"=>"peaufine@lefils.com",
            "password"=>bcrypt("123456")
        );

        $data24 = array(
            "user_type_id"=>"3",
            "first_name"=>"Dev",
            "last_name"=>"Auroy",
            "nic"=>"D4445552221023",
            "gender"=>"male",
            "dob"=>"2016-11-28",
            "marital_status"=>"married",
            "Address"=>"Phoenix",
            "phone_number"=>"2000147",
            "mobile_number"=>"59335447",
            "email"=>"dev@auroy.com",
            "password"=>bcrypt("123456")
        );

        $data25 = array(
            "user_type_id"=>"3",
            "first_name"=>"Namin",
            "last_name"=>"Lam",
            "nic"=>"N5556669998887",
            "gender"=>"male",
            "dob"=>"2016-11-28",
            "marital_status"=>"married",
            "Address"=>"La Laura",
            "phone_number"=>"2000147",
            "mobile_number"=>"59335447",
            "email"=>"namin@lam.com",
            "password"=>bcrypt("123456")
        );

        $data26 = array(
            "user_type_id"=>"3",
            "first_name"=>"veena",
            "last_name"=>"Chillum",
            "nic"=>"C4565458521000",
            "gender"=>"female",
            "dob"=>"2016-11-28",
            "marital_status"=>"single",
            "Address"=>"Pont Kolvil",
            "phone_number"=>"2000147",
            "mobile_number"=>"59335447",
            "email"=>"veena@chillum.com",
            "password"=>bcrypt("123456")
        );

        $data27 = array(
            "user_type_id"=>"3",
            "first_name"=>"Shanna",
            "last_name"=>"Khabh",
            "nic"=>"K4587778963210",
            "gender"=>"female",
            "dob"=>"2016-11-28",
            "marital_status"=>"single",
            "Address"=>"La Flora",
            "phone_number"=>"2000147",
            "mobile_number"=>"59335447",
            "email"=>"shanna@khabh.com",
            "password"=>bcrypt("123456")
        );

        $data28 = array(
            "user_type_id"=>"3",
            "first_name"=>"Catrine",
            "last_name"=>"Rob",
            "nic"=>"C7589662005212",
            "gender"=>"female",
            "dob"=>"2016-11-28",
            "marital_status"=>"single",
            "Address"=>"Castel",
            "phone_number"=>"2000147",
            "mobile_number"=>"59335447",
            "email"=>"catrine@rob.com",
            "password"=>bcrypt("123456")
        );

        $data29 = array(
            "user_type_id"=>"3",
            "first_name"=>"Richa",
            "last_name"=>"Corlin",
            "nic"=>"R3322110012000",
            "gender"=>"female",
            "dob"=>"2016-11-28",
            "marital_status"=>"single",
            "Address"=>"Plaine Wilhems",
            "phone_number"=>"2000147",
            "mobile_number"=>"59335447",
            "email"=>"richa@corlin.com",
            "password"=>bcrypt("123456")
        );

        $data30 = array(
            "user_type_id"=>"3",
            "first_name"=>"Katherine",
            "last_name"=>"Mirol",
            "nic"=>"M1548967632140",
            "gender"=>"female",
            "dob"=>"2016-11-28",
            "marital_status"=>"single",
            "Address"=>"Piton",
            "phone_number"=>"2000147",
            "mobile_number"=>"59335447",
            "email"=>"katherine@mirol.com",
            "password"=>bcrypt("123456")
        );

        $data31 = array(
            "user_type_id"=>"4",
            "first_name"=>"Ezio",
            "last_name"=>"Audithore",
            "nic"=>"A2715996451455",
            "gender"=>"male",
            "dob"=>"2016-11-28",
            "marital_status"=>"single",
            "Address"=>"Curepipe",
            "phone_number"=>"2000147",
            "mobile_number"=>"59335447",
            "email"=>"ezio@audithore.com",
            "password"=>bcrypt("123456")
        );

        $data32 = array(
            "user_type_id"=>"4",
            "first_name"=>"Karim",
            "last_name"=>"Kassam",
            "nic"=>"K2522014690121",
            "gender"=>"male",
            "dob"=>"2016-11-28",
            "marital_status"=>"single",
            "Address"=>"La butte",
            "phone_number"=>"2000147",
            "mobile_number"=>"59335447",
            "email"=>"karim@kassam.com",
            "password"=>bcrypt("123456")
        );

        $data33 = array(
            "user_type_id"=>"4",
            "first_name"=>"Ken",
            "last_name"=>"Sen",
            "nic"=>"S0048967632140",
            "gender"=>"male",
            "dob"=>"2016-11-28",
            "marital_status"=>"single",
            "Address"=>"Laventure",
            "phone_number"=>"2000147",
            "mobile_number"=>"59335447",
            "email"=>"ken@sen.com",
            "password"=>bcrypt("123456")
        );

        $data34 = array(
            "user_type_id"=>"4",
            "first_name"=>"HR",
            "last_name"=>"Example",
            "nic"=>"L6622007632140",
            "gender"=>"male",
            "dob"=>"2016-11-28",
            "marital_status"=>"single",
            "Address"=>"Cotton",
            "phone_number"=>"2000147",
            "mobile_number"=>"59335447",
            "email"=>"hr@example.com",
            "password"=>bcrypt("123456")
        );

        $data35 = array(
            "user_type_id"=>"4",
            "first_name"=>"Pato",
            "last_name"=>"Mirelli",
            "nic"=>"M2154896763455",
            "gender"=>"male",
            "dob"=>"2016-11-28",
            "marital_status"=>"single",
            "Address"=>"Balfour",
            "phone_number"=>"2000147",
            "mobile_number"=>"59335447",
            "email"=>"pato@mirelli.com",
            "password"=>bcrypt("123456")
        );

        $data36 = array(
            "user_type_id"=>"4",
            "first_name"=>"Auro",
            "last_name"=>"Chevi",
            "nic"=>"A6987774100402",
            "gender"=>"male",
            "dob"=>"2016-11-28",
            "marital_status"=>"single",
            "Address"=>"Candos",
            "phone_number"=>"2000147",
            "mobile_number"=>"59335447",
            "email"=>"auro@chevi.com",
            "password"=>bcrypt("123456")
        );

        $data37 = array(
            "user_type_id"=>"4",
            "first_name"=>"Hemre",
            "last_name"=>"Bot",
            "nic"=>"B0025874563210",
            "gender"=>"male",
            "dob"=>"2016-11-28",
            "marital_status"=>"single",
            "Address"=>"Piton",
            "phone_number"=>"2000147",
            "mobile_number"=>"59335447",
            "email"=>"hemre@bot.com",
            "password"=>bcrypt("123456")
        );

        $data38 = array(
            "user_type_id"=>"4",
            "first_name"=>"Fabian",
            "last_name"=>"Kol",
            "nic"=>"K0058965412300",
            "gender"=>"male",
            "dob"=>"2016-11-28",
            "marital_status"=>"single",
            "Address"=>"Ti Verger",
            "phone_number"=>"2000147",
            "mobile_number"=>"59335447",
            "email"=>"fabian@kol.com",
            "password"=>bcrypt("123456")
        );

        $data39 = array(
            "user_type_id"=>"4",
            "first_name"=>"Audrey",
            "last_name"=>"Mikal",
            "nic"=>"A1458967563214",
            "gender"=>"female",
            "dob"=>"2016-11-28",
            "marital_status"=>"single",
            "Address"=>"Savanne",
            "phone_number"=>"2000147",
            "mobile_number"=>"59335447",
            "email"=>"audrey@mikal.com",
            "password"=>bcrypt("123456")
        );

        $data40 = array(
            "user_type_id"=>"4",
            "first_name"=>"Karene",
            "last_name"=>"Lolly",
            "nic"=>"L1589798645321",
            "gender"=>"female",
            "dob"=>"2016-11-28",
            "marital_status"=>"single",
            "Address"=>"Cassis",
            "phone_number"=>"2000147",
            "mobile_number"=>"59335447",
            "email"=>"karene@lolly.com",
            "password"=>bcrypt("123456")
        );


        DB::table('users')->insert(array($data1,$data2,$data3,$data4,$data5,$data6,$data7,$data8,$data9,$data10,$data11,$data12,$data13,$data14,$data15,$data16,$data17,$data18,$data19,$data20,$data21,$data22,$data23,$data24,$data25,$data26,$data27,$data28,$data29,$data30,$data31,$data32,$data33,$data34,$data35,$data36,$data37,$data38,$data39,$data40));

    }




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
