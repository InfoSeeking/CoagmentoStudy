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
    public function up()
    {
        Schema::table('questionnaire_tests', function (Blueprint $table) {
//            $table->implode(',', Input::get('search_sources_v2[]'));
//            $table->save();
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
            $table ->dropColumn('search_sources_v2[]');
        });
    }
}
