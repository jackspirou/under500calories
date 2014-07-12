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
			$table->string('bitly', 30)->nullable();
			$table->string('vendor', 70)->nullable();
			$table->string('vendor_link', 255)->nullable()->unique();
			$table->string('author', 70)->nullable();
			$table->integer('yums')->default(0);
			$table->integer('calories')->nullable();
			$table->integer('servings')->nullable();
			$table->integer('total_fat')->nullable();
			$table->integer('calories_from_fat')->nullable();
			$table->integer('saturated_fat')->nullable();
			$table->integer('trans_fat')->nullable();
			$table->integer('cholesterol')->nullable();
			$table->integer('sodium')->nullable();
			$table->integer('potassium')->nullable();
			$table->integer('carbohydrates')->nullable();
			$table->integer('fiber')->nullable();
			$table->integer('sugars')->nullable();
			$table->integer('protein')->nullable();
			$table->integer('vitamin_a')->nullable();
			$table->integer('vitamin_c')->nullable();
			$table->integer('iron')->nullable();
			$table->integer('calcium')->nullable();
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
