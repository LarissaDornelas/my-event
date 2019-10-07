<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProviderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('provider', function(Blueprint $table)
		{
			$table->integer('id');
			$table->string('name', 60);
			$table->string('phone', 45);
			$table->integer('locale_id')->index('fk_provider_locale1_idx');
			$table->primary(['id','locale_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('provider');
	}

}
