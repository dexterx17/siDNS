<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registros2', function(Blueprint $table)
		{
			$table->increments('id');
		//	$table->timestamps();
			$table->string('fecha');
			$table->string('hora');
			$table->string('origen');
			$table->string('url');
			$table->string('dir')->nullable();
			$table->string('tipo');
			$table->string('destino');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('registros2');
	}

}
