<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRecipesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recipes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 60);
			$table->integer('pic')->nullable();
			$table->string('link', 255)->nullable();
			$table->string('vendor', 70)->nullable();
			$table->string('author', 70)->nullable();
			$table->integer('calories')->nullable();
			$table->integer('servings')->nullable();
			$table->integer('fat')->nullable();
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
		Schema::drop('recipes');
	}

}
