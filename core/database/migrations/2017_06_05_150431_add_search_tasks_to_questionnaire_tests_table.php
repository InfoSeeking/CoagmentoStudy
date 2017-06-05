<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSearchTasksToQuestionnaireTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questionnaire_tests', function (Blueprint $table) {
            $table->string('searchTasks') ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questionnaire_tests', function (Blueprint $table) {
            $table->dropColumn('searchTasks');
        });
    }
}
