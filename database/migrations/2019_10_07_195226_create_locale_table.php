<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocaleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('locale', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('name', 100);
			$table->string('street', 45);
			$table->string('city', 45);
			$table->string('cep', 10);
			$table->string('neighborhood', 45);
			$table->integer('number');
			$table->string('complement', 10);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('locale');
	}

}
