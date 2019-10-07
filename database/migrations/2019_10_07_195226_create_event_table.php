<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 60)->default('Meu Evento');
			$table->dateTime('date');
			$table->string('description');
			$table->decimal('maxPrice', 10, 0);
			$table->decimal('currentPrice', 10, 0);
			$table->timestamps();
			$table->boolean('active');
			$table->integer('eventType_id')->index('fk_event_eventType1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('event');
	}

}
