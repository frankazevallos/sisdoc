<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dependencias;
use DB;

class EntidadesExtController extends Controller
{
    public function home()
    {
        return view('tramite.administracion.home');
    }
    
    public function index()
    {
		$entidades = Dependencias::where('depe_tipo', '=', 2)->where('depe_estado', '=', 1)->get();
        return view('tramite.administracion.entidadesexternas.inicio', ['entidades'=>$entidades]);
    }

    public function create()
    {
        return view('tramite.administracion.entidadesexternas.nuevo');
    }

    public function store(Request $request)
    {		
        try{
			DB::beginTransaction();
			
			$entidad = new Dependencias;
			$entidad->depe_nombre = mb_strtoupper($request->depe_nombre);
			$entidad->depe_abreviado = mb_strtoupper($request->depe_abreviado);
			$entidad->depe_siglaxp = mb_strtoupper($request->depe_siglaxp);
			$entidad->depe_representante = mb_strtoupper($request->depe_representante);
			$entidad->depe_cargo = mb_strtoupper($request->depe_cargo);
			$entidad->depe_tipo = 2;			
			$entidad->depe_estado = 1;			
			$entidad->depe_idadmin = $request->depe_idadmin;			
			$entidad->depe_fecharegistro = $request->depe_fecharegistro;			
			$entidad->save();
			
			DB::commit();
			
			return redirect('tramite/administracion/entidadesext')->with('msg', 'La Entidad Externa fue Guardado Satisfactoriamente.');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/administracion/entidadesext')->with('error', 'Hubo un error al intentar Crear la Entidad Externa contactece con el Administrador del Sistema o Intente Nuevamente');
		} 
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $entidad = Dependencias::where('iddependencia', '=', $id)->first();
        return view('tramite.administracion.entidadesexternas.editar', ['entidad'=>$entidad]);
    }

    public function update(Request $request, $id)
    {
        try{
			DB::beginTransaction();
			
			$entidad = Dependencias::find($id);
			$entidad->depe_nombre = mb_strtoupper($request->depe_nombre);
			$entidad->depe_abreviado = mb_strtoupper($request->depe_abreviado);
			$entidad->depe_siglaxp = mb_strtoupper($request->depe_siglaxp);
			$entidad->depe_representante = mb_strtoupper($request->depe_representante);
			$entidad->depe_cargo = mb_strtoupper($request->depe_cargo);
			//$entidad->depe_tipo = 2;			
			$entidad->depe_estado = $request->depe_estado;			
			$entidad->depe_idadmin = $request->depe_idadmin;						
			$entidad->save();
			
			DB::commit();
			
			return redirect('tramite/administracion/entidadesext')->with('msg', 'La Entidad Externa fue Editada Satisfactoriamente.');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/administracion/entidadesext')->with('error', 'Hubo un error al intentar Editar la Entidad Externa contactece con el Administrador del Sistema o Intente Nuevamente');
		}
    }

    public function destroy($id)
    {
        try{
			DB::beginTransaction();
			
			$entidad = Dependencias::find($id);		
			$entidad->depe_estado = 0;							
			$entidad->save();
			
			DB::commit();
		
			return redirect('tramite/administracion/entidadesext')->with('msg', 'La Entidad Externa fue Eliminado Satisfactoriamente.');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/administracion/entidadesext')->with('error', 'Hubo un error al intentar Eliminar la Entidad Externa contactece con el Administrador del Sistema o Intente Nuevamente');
		}
    }
}
