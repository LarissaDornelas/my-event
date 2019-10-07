<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('task', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 60);
			$table->string('description')->nullable();
			$table->date('date');
			$table->integer('category_id')->index('fk_task_category1_idx');
			$table->string('priority', 45);
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
		Schema::drop('task');
	}

}
