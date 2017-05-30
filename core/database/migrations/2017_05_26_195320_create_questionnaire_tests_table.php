<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnaireTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaire_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->enum('gender', ['male', 'female']);
//            $table->enum('searchSource', ['Google', 'Yahoo', 'Bing', 'Firefox']);
        });
        
//        Schema::table('questionnaire_tests', function (Blueprint $table) {
//            $table->enum('searchSource', ['Google', 'Yahoo', 'Bing', 'Firefox']);
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questionnaire_tests');
    }
}
