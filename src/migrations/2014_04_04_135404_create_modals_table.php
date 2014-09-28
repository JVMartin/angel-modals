<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('modals', function(Blueprint $table) {
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('name');
			$table->text('html');
			$table->text('plaintext');
			$table->timestamps(); // Adds `created_at` and `updated_at` columns
		});

		if (ToolBelt::mysql_greater('5.6.4')) {
			DB::statement('ALTER TABLE `modals` ADD FULLTEXT search(`name`, `plaintext`)');
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('modals');
	}

}
