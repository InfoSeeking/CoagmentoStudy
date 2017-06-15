<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSearchSourcesV2ToQuestionnaireTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('questionnaire_tests', function (Blueprint $table) {
            $table->string('search_sources_v2') -> nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('questionnaire_tests', function (Blueprint $table) {
            $table ->dropColumn('search_sources_v2');
        });
    }
}
