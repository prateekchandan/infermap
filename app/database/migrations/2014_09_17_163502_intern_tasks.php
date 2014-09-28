<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InternTasks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (Schema::hasTable('intern_tasks'))
		{
		    Schema::drop('intern_tasks');
		}
		Schema::create('intern_tasks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('position_id')->unsigned();
			$table->integer('week');
			$table->longText('ps');
			$table->string('work_status',200)->nullable();
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('position_id')->references('id')->on('intern_positions')->onDelete('cascade');

		});

		if (Schema::hasTable('intern_tasks_comment'))
		{
		    Schema::drop('intern_tasks_comment');
		}
		Schema::create('intern_tasks_comment', function(Blueprint $table)
		{
			$table->increments('comment_id');
			$table->integer('user_id');
			$table->integer('task_id')->unsigned();
			$table->longText('message');
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('task_id')->references('id')->on('intern_tasks')->onDelete('cascade');

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
