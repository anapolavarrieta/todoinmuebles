<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('casas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('zona_id')->unsigned();
			$table->foreign('zona_id')->references('id')->on('zonas');
			$table->string ('calle');
			$table->string('numero');
			$table->string('colonia');
			$table->string('municipio');
			$table->string('cp');
			$table->string('ciudad');
			$table->string ('estado');
			$table->decimal ('precio', 12, 2);
			$table->integer ('supconst');
			$table->integer ('supterr');
			$table->string ('antiguedad');
			$table->integer ('recamara');
			$table->integer('bano');
			$table->integer('mediobano');
			$table->integer('estacionamiento');
			$table->text('descripcion');
			$table->string('estatus');
			$table->string('tipo');
			$table->string('estado_compra');
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
		Schema::table('casas', function($table) {
			$table->dropForeign('casas_zona_id_foreign'); 
		});

		Schema::drop('casas');
	}

}
