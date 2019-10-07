<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventHasTaskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_has_task', function(Blueprint $table)
		{
			$table->integer('event_id')->index('fk_event_has_task_event1_idx');
			$table->integer('task_id')->index('fk_event_has_task_task1_idx');
			$table->primary(['event_id','task_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('event_has_task');
	}

}
