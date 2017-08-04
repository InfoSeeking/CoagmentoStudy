<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnaire2TestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('questionnaire2_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->enum('gender', ['male', 'female']);
            //search sources
            $table->string('search_sources_v2') -> nullable();
           
            //language used
            $table->string('language') ->nullable();
            
            //tasks
            $table->string('searchTasks') ->nullable();
            
            //college year
            
            
            //difficulty
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('questionnaire_tests');
    }
}
