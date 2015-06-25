<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmbienteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create ('ambientes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});

		Schema::create ('ambiente_casa', function(Blueprint $table)
		{
			$table->integer('casa_id')->unsigned();
			$table->foreign('casa_id')->references('id')->on('casas')->onDelete('cascade');
			$table->integer('ambiente_id')->unsigned();
			$table->foreign('ambiente_id')->references('id')->on('ambientes')->onDelete('cascade');
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
		Schema::drop('ambiente_casa');
		Schema::drop('ambientes');
		
	}

}
