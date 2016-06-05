<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InternApplication extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (Schema::hasTable('intern_application'))
		{
		    Schema::drop('intern_application');
		}
		Schema::create('intern_application', function(Blueprint $table)
		{
			$table->integer('user_id');
			$table->integer('position_id')->unsigned();
			$table->string('resume_link',500);
			$table->string('resume_path',500);
			$table->integer('accept')->default(0);
			$table->timestamps();
			$table->primary(array('user_id', 'position_id'));
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('position_id')->references('id')->on('intern_positions')->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
