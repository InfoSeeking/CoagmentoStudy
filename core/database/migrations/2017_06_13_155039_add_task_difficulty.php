<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTaskDifficulty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questionnaire_tests', function (Blueprint $table) {
            $table->enum('task_difficulty', ['not_difficult', 'somewhat_difficult', 'medium', 'very_difficult', 'extremely_difficult']) -> nullable();
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
            $table->dropColumn('task_difficulty');
        });
    }
}
