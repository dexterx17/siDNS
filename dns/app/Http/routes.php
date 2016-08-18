<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as'=>'front.index','uses'=>'Front@index']);

Route::get('/load',['as'=>'front.load','uses'=>'Front@ejecutar']);
Route::get('registros', 'Registros@index');

Route::group(['prefix' => 'admin'],function(){
	Route::resource('dominios', 'Dominios');
	
        Route::get('dominios/{id}/destroy',[
        	'uses'=>'Dominios@destroy',
        	'as' =>'admin.dominios.destroy'
        ]);
        
        Route::get('dominios/reescribir',[
        	'uses'=>'Dominios@reescribir',
        	'as' =>'admin.dominios.reescribir'
        ]);
        
    Route::get('registros/{url}',['as'=>'admin.registros.bloquear','uses'=> 'Registros@bloquear']);
});
