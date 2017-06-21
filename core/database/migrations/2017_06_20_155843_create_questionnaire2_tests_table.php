<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnaire2TestsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('questionnaire2_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->enum('college_year', ['freshman', 'sophomore', 'junior', 'senior']) ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('questionnaire2_tests');
    }
}
