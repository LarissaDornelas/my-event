<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBudgetHasEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('budget_has_event', function(Blueprint $table)
		{
			$table->integer('budget_id')->index('fk_budget_has_event_budget1_idx');
			$table->integer('event_id')->index('fk_budget_has_event_event1_idx');
			$table->primary(['budget_id','event_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('budget_has_event');
	}

}
