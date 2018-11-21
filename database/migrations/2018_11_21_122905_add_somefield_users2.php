<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomefieldUsers2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
			$table->string('address1')->after('address');
			$table->string('city')->after('address1');
			$table->string('postal_code')->after('city');
			$table->string('state')->after('postal_code');
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
        	$table->dropColumn('address1');
			$table->dropColumn('city');
			$table->dropColumn('postal_code');
			$table->dropColumn('state');
        });
    }
}
