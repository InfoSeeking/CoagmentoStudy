<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToQuestionnaire2TestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questionnaire2_tests', function (Blueprint $table) {
            $table->integer('project_id')->unsigned();
            $table->integer('user_id')->unsigned();
            //date
            //time
            //timestamp
            $table->timestamp('added_on');
            //local_date
            //local_time
            //local_timestamp
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questionnaire2_tests', function (Blueprint $table) {
            $table->dropColumn('project_id');
            $table->dropColumn('user_id');
            $table->dropColumn('')
        });
    }
}
