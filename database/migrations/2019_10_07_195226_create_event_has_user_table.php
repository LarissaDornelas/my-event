<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventHasUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_has_user', function(Blueprint $table)
		{
			$table->integer('event_id')->index('fk_event_has_user_event1_idx');
			$table->integer('user_id')->index('fk_event_has_user_user1_idx');
			$table->primary(['event_id','user_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('event_has_user');
	}

}
