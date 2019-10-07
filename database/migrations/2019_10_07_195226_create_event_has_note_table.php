<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventHasNoteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_has_note', function(Blueprint $table)
		{
			$table->integer('event_id')->index('fk_event_has_note_event1_idx');
			$table->integer('note_id')->index('fk_event_has_note_note1_idx');
			$table->primary(['event_id','note_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('event_has_note');
	}

}
