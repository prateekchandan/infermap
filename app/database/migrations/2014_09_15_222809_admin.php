<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Admin extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (Schema::hasTable('admin'))
		{
		    Schema::drop('admin');
		}
		Schema::create('admin', function(Blueprint $table)
		{
			$table->integer('id');
			$table->timestamps();
			$table->primary(array('id'));
			$table->foreign('id')->references('id')->on('users');

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
