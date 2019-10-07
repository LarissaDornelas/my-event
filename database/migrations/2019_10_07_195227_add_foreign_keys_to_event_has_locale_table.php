<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEventHasLocaleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('event_has_locale', function(Blueprint $table)
		{
			$table->foreign('event_id', 'fk_event_has_locale_event1')->references('id')->on('event')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('locale_id', 'fk_event_has_locale_locale1')->references('id')->on('locale')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('event_has_locale', function(Blueprint $table)
		{
			$table->dropForeign('fk_event_has_locale_event1');
			$table->dropForeign('fk_event_has_locale_locale1');
		});
	}

}
