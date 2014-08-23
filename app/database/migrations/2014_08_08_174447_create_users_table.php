<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email')->unique();
			$table->string('password', 60)->nullable();
			$table->string('name', 200)->nullable();
			$table->boolean('gender')->nullable();
			$table->string('city', 40)->nullable();
			$table->boolean('school_college')->nullable();
			$table->string('school_college_name', 200)->nullable();
			$table->integer('std_passingout')->nullable();
			$table->string('phone', 20)->nullable();
			$table->string('fbid',20)->nullable();
			$table->timestamps();
			$table->rememberToken();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
