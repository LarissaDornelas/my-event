<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBudgetHasEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('budget_has_event', function(Blueprint $table)
		{
			$table->foreign('budget_id', 'fk_budget_has_event_budget1')->references('id')->on('budget')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('event_id', 'fk_budget_has_event_event1')->references('id')->on('event')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('budget_has_event', function(Blueprint $table)
		{
			$table->dropForeign('fk_budget_has_event_budget1');
			$table->dropForeign('fk_budget_has_event_event1');
		});
	}

}
