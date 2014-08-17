<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('college_reviews', function(Blueprint $table)
		{
			$table->increments('review_id')->unique();
			$table->integer('college_id');
			$table->string('facqual', 50)->nullable();
			$table->string('class_hrs', 20)->mullable();
			$table->string('attendance', 20)->nullable();
			$table->integer('acad_quality')->nullable();
			$table->integer('acad_reputation')->nullable();
			$table->string('placement', 20)->nullable();
			$table->string('package', 20)->nullable();
			$table->boolean('intern_help')->nullable();
			$table->string('intern', 20)->nullable();
			$table->boolean('no_mess_hostel')->nullable();
			$table->integer('hostel_rating')->nullable();
			$table->integer('mess_rating')->nullable();
			$table->integer('sports_rating')->nullable();
			$table->integer('co_currics_rating')->nullable();
			$table->string('facilities', 200)->nullalbe();
			$table->string('whychoose', 1000)->nullable();
			$table->string('improve', 1000)->nullable();
			$table->boolean('recommend')->nullable();
			$table->string('personal_year', 20);
			$table->string('personal_dept', 200);
			$table->string('stay_con', 1000);
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
		Schema::drop('College_reviews');
	}

}
