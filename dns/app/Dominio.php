<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Dominio extends Model {

	protected $table = "dominios";
	
	protected $fillable = [
		'url','sentido','tipo','destino','bloqueado'
	];

}
