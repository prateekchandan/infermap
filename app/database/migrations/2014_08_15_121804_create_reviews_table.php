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
			$table->integer('user_id');
			$table->integer('temp_college_id')->nullable();
			$table->string('college_depts', 1000)->nullable();
			$table->string('fac_teaching', 50)->nullable();
			$table->string('research_work', 20)->mullable();
			$table->string('placement', 20)->nullable();
			$table->string('package', 20)->nullable();
			$table->string('intern', 20)->nullable();
			$table->integer('scholarship_amount')->nullable();
			$table->boolean('scholarship')->nullable();
			$table->boolean('mess_hostel')->nullable();
			$table->integer('hostel_rating')->nullable();
			$table->integer('mess_rating')->nullable();
			$table->integer('sports_rating')->nullable();
			$table->integer('co_currics_rating')->nullable();
			$table->integer('ragging')->nullable();
			$table->string('about_college', 2000)->nullable();
			$table->text('review_title')->nullable();
			$table->string('review_type', 200)->nullable();
			$table->boolean('recommend')->nullable();
			$table->string('personal_year', 20);
			$table->string('personal_dept', 200);
			$table->string('stay_con', 1000)->nullable();
			$table->integer('anonymous')->nullable()->default('0');
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('users');
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
