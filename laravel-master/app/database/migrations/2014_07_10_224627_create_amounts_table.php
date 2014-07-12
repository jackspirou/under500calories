<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAmountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('amounts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ingredient_id');
			$table->string('amount', 70)->nullable();
			$table->string('unit', 70)->nullable();
			$table->string('remainder')->nullable();
			$table->integer('recipe_id');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('amounts');
	}

}
