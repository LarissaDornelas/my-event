<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBudgetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('budget', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->decimal('value', 10, 0);
			$table->integer('provider_id');
			$table->integer('provider_category_id');
			$table->string('name', 45);
			$table->string('description');
			$table->integer('category_id')->index('fk_budget_category1_idx');
			$table->index(['provider_id','provider_category_id'], 'fk_budget_provider1_idx');
			$table->primary(['id','category_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('budget');
	}

}
