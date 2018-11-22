<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('profile_id');
			$table->integer('user_id')->nullable();;
            $table->string('ic_no')->nullable();;
			$table->string('contact_no')->nullable();;
			$table->string('address')->nullable();;
			$table->string('address1')->nullable();;
			$table->string('city')->nullable();;
			$table->integer('postal_code')->nullable();;
			$table->string('state')->nullable();;
			$table->string('country')->nullable();;
			$table->string('dob')->nullable();;
			$table->string('gender')->nullable();;			
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
