<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dependencias;
use DB;

class UnidadesOrgController extends Controller
{
    public function index()
    {
        $unidadesorg = Dependencias::where('depe_tipo', '=', 1)->where('depe_estado', '=', 1)->get();
        return view('tramite.administracion.unidadesorganicas.inicio', ['dependencias'=>$unidadesorg]);
    }

    public function create()
    {
		$dependencias = Dependencias::where('depe_tipo', '=', 0)->where('depe_estado', '=', 1)->get();
        return view('tramite.administracion.unidadesorganicas.nuevo', ['dependencias'=>$dependencias]);
    }

    public function store(Request $request)
    {
        try{
			DB::beginTransaction();
			
			$unidadesorg = new Dependencias;
			$unidadesorg->depe_nombre = mb_strtoupper($request->depe_nombre);
			$unidadesorg->depe_abreviado = mb_strtoupper($request->depe_abreviado);
			$unidadesorg->depe_siglaxp = mb_strtoupper($request->depe_siglaxp);
			$unidadesorg->depe_representante = mb_strtoupper($request->depe_representante);
			$unidadesorg->depe_cargo = mb_strtoupper($request->depe_cargo);
			$unidadesorg->depe_depende = $request->depe_depende;
			$unidadesorg->depe_tipo = 1;			
			$unidadesorg->depe_estado = 1;			
			$unidadesorg->depe_idadmin = $request->depe_idadmin;			
			$unidadesorg->depe_fecharegistro = $request->depe_fecharegistro;			
			$unidadesorg->save();
			
			DB::commit();
			
			return redirect('tramite/administracion/unidadesorg')->with('msg', 'La Unidad Orgánica fue Guardado Satisfactoriamente.');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/administracion/unidadesorg')->with('error', 'Hubo un error al intentar Crear la Unidad Orgánica contactece con el Administrador del Sistema o Intente Nuevamente');
		} 
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
		$dependencias = Dependencias::where('depe_tipo', '=', 0)->where('depe_estado', '=', 1)->get();
        $unidadesorg = Dependencias::where('iddependencia', '=', $id)->first();
        return view('tramite.administracion.unidadesorganicas.editar', ['unidadesorg'=>$unidadesorg, 'dependencias'=>$dependencias]);
    }

    public function update(Request $request, $id)
    {
        try{
			DB::beginTransaction();
			
			$unidadesorg = Dependencias::find($id);
			$unidadesorg->depe_nombre = mb_strtoupper($request->depe_nombre);
			$unidadesorg->depe_abreviado = mb_strtoupper($request->depe_abreviado);
			$unidadesorg->depe_siglaxp = mb_strtoupper($request->depe_siglaxp);
			$unidadesorg->depe_representante = mb_strtoupper($request->depe_representante);
			$unidadesorg->depe_cargo = mb_strtoupper($request->depe_cargo);
			$unidadesorg->depe_depende = $request->depe_depende;
			//$unidadesorg->depe_tipo = 1;			
			$unidadesorg->depe_estado = $request->depe_estado;			
			$unidadesorg->depe_idadmin = $request->depe_idadmin;					
			$unidadesorg->save();
			
			DB::commit();
			
			return redirect('tramite/administracion/unidadesorg')->with('msg', 'La Unidad Orgánica fue Editada Satisfactoriamente.');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/administracion/unidadesorg')->with('error', 'Hubo un error al intentar Editar la Unidad Orgánica contactece con el Administrador del Sistema o Intente Nuevamente');
		}
    }

    public function destroy($id)
    {
        try{
			DB::beginTransaction();
			
			$unidadesorg = Dependencias::find($id);		
			$unidadesorg->depe_estado = 0;							
			$unidadesorg->save();
			
			DB::commit();
			
			return redirect('tramite/administracion/unidadesorg')->with('msg', 'La Unidad Orgánica fue Eliminado Satisfactoriamente.');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/administracion/unidadesorg')->with('error', 'Hubo un error al intentar Eliminar la Unidad Orgánica contactece con el Administrador del Sistema o Intente Nuevamente');
		} 
    }
}