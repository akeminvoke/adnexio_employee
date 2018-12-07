<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldDeletedAtPersonalities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personalities', function ($table) {
			$table->string('action_taker')->after('assessment_id');
			$table->string('analyzer')->after('action_taker');
			$table->string('inventor')->after('analyzer');
			$table->string('mentor')->after('inventor');
			$table->string('naturalist')->after('mentor');
			$table->string('planner')->after('naturalist');
			$table->string('visionary')->after('planner');
            $table->string('deleted_at')->after('visionary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personalities', function ($table) {
			$table->dropColumn('action_taker');
			$table->dropColumn('analyzer');
			$table->dropColumn('inventor');
			$table->dropColumn('mentor');
			$table->dropColumn('naturalist');
			$table->dropColumn('planner');
        	$table->dropColumn('visionary');
        	$table->dropColumn('deleted_at');			
        });
    }
}
