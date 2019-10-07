<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProviderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('provider', function(Blueprint $table)
		{
			$table->foreign('locale_id', 'fk_provider_locale1')->references('id')->on('locale')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('provider', function(Blueprint $table)
		{
			$table->dropForeign('fk_provider_locale1');
		});
	}

}
