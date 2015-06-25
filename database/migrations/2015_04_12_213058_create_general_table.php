<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create ('generales', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});

		Schema::create ('casa_general', function(Blueprint $table)
		{
			$table->integer('casa_id')->unsigned();
			$table->foreign('casa_id')->references('id')->on('casas')->onDelete('cascade');
			$table->integer('general_id')->unsigned();
			$table->foreign('general_id')->references('id')->on('generales')->onDelete('cascade');
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
		Schema::drop('casa_general');
		Schema::drop('generales');
		
	}

}
