<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDominiosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dominios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('url');
			$table->string('sentido');
			$table->string('tipo');
			$table->string('destino');
			$table->boolean('bloqueado');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dominios');
	}

}
