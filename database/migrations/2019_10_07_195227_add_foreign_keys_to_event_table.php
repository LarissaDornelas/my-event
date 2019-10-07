<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('event', function(Blueprint $table)
		{
			$table->foreign('eventType_id', 'fk_event_eventType1')->references('id')->on('eventType')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('event', function(Blueprint $table)
		{
			$table->dropForeign('fk_event_eventType1');
		});
	}

}
