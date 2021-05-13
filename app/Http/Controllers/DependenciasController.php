<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Dependencias;

class DependenciasController extends Controller
{
    public function index()
    {
		$dependencias = Dependencias::where('depe_tipo', '=', 0)->where('depe_estado', '=', 1)->get();
        return view('tramite.administracion.dependencias.inicio', ['dependencias'=>$dependencias]);
    }

    public function create()
    {
        return view('tramite.administracion.dependencias.nuevo');
    }

    public function store(Request $request)
    {
        try{
			DB::beginTransaction();
			
			$dependencia = new Dependencias;
			$dependencia->depe_nombre = mb_strtoupper($request->depe_nombre);
			$dependencia->depe_abreviado = mb_strtoupper($request->depe_abreviado);
			$dependencia->depe_siglaxp = mb_strtoupper($request->depe_siglaxp);
			$dependencia->depe_representante = mb_strtoupper($request->depe_representante);
			$dependencia->depe_cargo = mb_strtoupper($request->depe_cargo);
			$dependencia->depe_tipo = 0;			
			$dependencia->depe_estado = 1;			
			$dependencia->depe_idadmin = $request->depe_idadmin;			
			$dependencia->depe_fecharegistro = $request->depe_fecharegistro;			
			$dependencia->save();
			
			DB::commit();
			
			return redirect('tramite/administracion/dependencias')->with('msg', 'La Dependencia fue Guardado Satisfactoriamente.');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/administracion/dependencias')->with('error', 'Hubo un error al intentar Crear la Dependencia contactece con el Administrador del Sistema o Intente Nuevamente');
		} 
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $dependencia = Dependencias::where('iddependencia', '=', $id)->first();
        return view('tramite.administracion.dependencias.editar', ['dependencia'=>$dependencia]);
    }

    public function update(Request $request, $id)
    {
        try{
			DB::beginTransaction();
			
			$dependencia = Dependencias::find($id);
			$dependencia->depe_nombre = mb_strtoupper($request->depe_nombre);
			$dependencia->depe_abreviado = mb_strtoupper($request->depe_abreviado);
			$dependencia->depe_siglaxp = mb_strtoupper($request->depe_siglaxp);
			$dependencia->depe_representante = mb_strtoupper($request->depe_representante);
			$dependencia->depe_cargo = mb_strtoupper($request->depe_cargo);
			//$dependencia->depe_tipo = 0;			
			$dependencia->depe_estado = $request->depe_estado;			
			$dependencia->depe_idadmin = $request->depe_idadmin;						
			$dependencia->save();
			
			DB::commit();
			
			return redirect('tramite/administracion/dependencias')->with('msg', 'La Dependencia fue Editada Satisfactoriamente.');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/administracion/dependencias')->with('error', 'Hubo un error al intentar Editar la Dependencia contactece con el Administrador del Sistema o Intente Nuevamente');
		} 
    }

    public function destroy($id)
    {
        try{
			DB::beginTransaction();
			
			$dependencia = Dependencias::find($id);		
			$dependencia->depe_estado = 0;							
			$dependencia->save();
			
			DB::commit();
			
			return redirect('tramite/administracion/dependencias')->with('msg', 'La Dependencia fue Eliminado Satisfactoriamente.');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/administracion/dependencias')->with('error', 'Hubo un error al intentar Eliminar la Dependencia contactece con el Administrador del Sistema o Intente Nuevamente');
		} 
    }
}
