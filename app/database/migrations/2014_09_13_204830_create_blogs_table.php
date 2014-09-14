<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (Schema::hasTable('blog_list'))
		{
		    Schema::drop('blog_list');
		}
		Schema::create('blog_list', function(Blueprint $table)
		{
			$table->increments('blog_id');
			$table->integer('user_id');
			$table->string('Title',2000);
			$table->string('link',2000);
			$table->longText('content');
			$table->string('img',200)->nullable();
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
		//
	}

}
