<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Dominio;


class Dominios extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$dominios = Dominio::orderBy('id','ASC')->paginate(10);
		return view('dominios.index',['dominios'=>$dominios]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('dominios.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$dominio = new Dominio($request->all());
		$dominio->save();
		flash("Dominio $dominio->url registrado correctamente","success");
		return redirect()->route('admin.dominios.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$dominio = Dominio::find($id);
		return view('dominios.edit',['dominio',$dominio]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$dominio = Dominio::find($id);
		$dominio->fill($request->all());
		$dominio->save();
		
		flash("Dominio $dominio->url actualizado correctamente",'success');
		return redirect()->route('admin.dominios.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$dominio = Dominio::find($id);
		$dominio->delete();
		flash("Dominio $dominio->url eliminado correctamente","success");
		return redirect()->route('admin.dominios.index');
	}

}
