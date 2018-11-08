<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomefieldUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('ic_no')->after('remember_token');
			$table->string('contact_no')->after('ic_no');
			$table->string('address')->after('contact_no');
			$table->string('dob')->after('address');
			$table->string('gender')->after('dob');
			$table->string('nationality')->after('gender');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
        	$table->dropColumn('ic_no');
			$table->dropColumn('contact_no');
			$table->dropColumn('address');
			$table->dropColumn('dob');
			$table->dropColumn('gender');
			$table->dropColumn('nationality');
        });
    }
}
