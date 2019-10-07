<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBudgetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('budget', function(Blueprint $table)
		{
			$table->foreign('category_id', 'fk_budget_category1')->references('id')->on('category')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('provider_id', 'fk_budget_provider1')->references('id')->on('provider')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('budget', function(Blueprint $table)
		{
			$table->dropForeign('fk_budget_category1');
			$table->dropForeign('fk_budget_provider1');
		});
	}

}
