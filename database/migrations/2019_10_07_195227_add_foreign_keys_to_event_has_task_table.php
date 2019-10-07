<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEventHasTaskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('event_has_task', function(Blueprint $table)
		{
			$table->foreign('event_id', 'fk_event_has_task_event1')->references('id')->on('event')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('task_id', 'fk_event_has_task_task1')->references('id')->on('task')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('event_has_task', function(Blueprint $table)
		{
			$table->dropForeign('fk_event_has_task_event1');
			$table->dropForeign('fk_event_has_task_task1');
		});
	}

}
