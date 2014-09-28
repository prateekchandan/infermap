<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamDates extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (Schema::hasTable('exam_dates'))
		{
		    Schema::drop('exam_dates');
		}
		Schema::create('exam_dates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('eid');
			$table->date('date');
			$table->string('event',2000);
			$table->timestamps();
			$table->foreign('eid')->references('eid')->on('exam')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('exam_dates');
	}

}
