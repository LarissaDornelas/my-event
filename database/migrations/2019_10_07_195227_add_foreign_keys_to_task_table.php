<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTaskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('task', function(Blueprint $table)
		{
			$table->foreign('category_id', 'fk_task_category1')->references('id')->on('category')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('task', function(Blueprint $table)
		{
			$table->dropForeign('fk_task_category1');
		});
	}

}
