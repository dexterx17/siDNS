<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Registro;

class Front extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$registros = Registro::search($request->url)->orderBy('fecha','ASC')->paginate(10);
		return view('inicio')
			->with('registros',$registros);
	}
}
