<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIngredientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ingredients', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 60)->unique();
			$table->integer('pic')->nullable();
			$table->integer('amount')->nullable();
			$table->string('unit', 60)->nullable();
			$table->integer('status')->default(1);
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
		Schema::drop('ingredients');
	}

}
