<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewPubli extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (Schema::hasTable('review_publi'))
		{
		    Schema::drop('review_publi');
		}
		Schema::create('review_publi', function(Blueprint $table)
		{
			$table->integer('user_admin');
			$table->integer('user_refered');
			$table->timestamps();
			$table->primary(array('user_admin', 'user_refered'));
			$table->foreign('user_admin')->references('id')->on('users');
			$table->foreign('user_refered')->references('id')->on('users');
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
