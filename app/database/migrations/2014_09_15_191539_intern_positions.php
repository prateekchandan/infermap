<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InternPositions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (Schema::hasTable('intern_positions'))
		{
		    Schema::drop('intern_positions');
		}
		Schema::create('intern_positions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('position',200);
			$table->string('type',200);
			$table->string('desc', 2000)->nullable();
			$table->string('requirement', 2000)->nullable();
			$table->string('term', 2000)->nullable();
			$table->string('link', 200);
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
		//
	}

}
