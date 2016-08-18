<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model {

	//
	protected $table = "registros";

	protected $fillable = [ 
		'fecha','hora','origen','url','dir','tipo','destino'
	];
	
	public function scopeSearch($query,$url)
   	{
        	return $query->where('url','LIKE',"%$url%");
    	}

}
