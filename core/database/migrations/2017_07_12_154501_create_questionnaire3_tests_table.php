<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnaire3TestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questionnaire3_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->enum('collegeYear', ['freshman', 'sophomore', 'junior', 'senior']) ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questionnaire3_tests', function (Blueprint $table) {
            Schema::drop('questionnaire3_tests');
        });
    }
}
