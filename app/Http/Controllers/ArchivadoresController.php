<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dependencias;
use App\Archivadores;
use DB;
use Auth;

class ArchivadoresController extends Controller
{
    public function home()
    {
        return view('tramite.catalogos.home');
    }
    
    public function index()
    {
        $archivadores = Archivadores::where('arch_estado', '=', 1)->where('arch_iddependencia', '=', Auth::user()->adm_iddependencia)->get();
        return view('tramite.catalogos.archivadores.inicio', ['archivadores'=>$archivadores]);
    }
    
   public function create()
    {
        return view('tramite.catalogos.archivadores.nuevo');
    }

    public function store(Request $request)
    {
		try{
			DB::beginTransaction();
			
			$archivador = new Archivadores;
			$archivador->arch_iddependencia = $request->arch_iddependencia;
			$archivador->arch_idusuario = $request->arch_idusuario;
			$archivador->arch_nombre = mb_strtoupper($request->arch_nombre);
			$archivador->arch_periodo = $request->arch_periodo;
			
			if($request->personal == 1){
				$archivador->arch_idusuarioa = $request->arch_idusuarioa;				
			}
			$archivador->arch_estado = 1;
			$archivador->save();
			
			DB::commit();
        
        	return redirect('tramite/catalogos/archivadores')->with('msg', 'El Archivador fue Guardado Satisfactoriamente.');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/catalogos/archivadores')->with('error', 'Hubo un error al intentar Crear el Archivador contactece con el Administrador del Sistema o Intente Nuevamente');
		}
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $editarch = Archivadores::where('idarch', '=', $id)->first();
        return view('tramite.catalogos.archivadores.editar', ['editarch'=>$editarch]);
    }

    public function update(Request $request, $id)
    {
		try{
			DB::beginTransaction();
			
			$archivador = Archivadores::find($id);
			$archivador->arch_iddependencia = $request->arch_iddependencia;
			$archivador->arch_idusuario = $request->arch_idusuario;
			$archivador->arch_nombre = mb_strtoupper($request->arch_nombre);
			$archivador->arch_periodo = $request->arch_periodo;
			$archivador->save();
			
			DB::commit();
        
        	return redirect('tramite/catalogos/archivadores')->with('msg', 'El Archivador fue Editado Satisfactoriamente.');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/catalogos/archivadores')->with('error', 'Hubo un error al intentar Editar el Archivador contactece con el Administrador del Sistema o Intente Nuevamente');
		}
    }

    public function destroy($id)
    {   
		try{
			DB::beginTransaction();
			
			$archivador = Archivadores::find($id);
			$archivador->arch_estado = 0;
			$archivador->save();
			
			DB::commit();
			return redirect('tramite/catalogos/archivadores')->with('msg', 'El Archivador fue Eliminado');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/catalogos/archivadores')->with('error', 'Hubo un error al intentar eliminar el Archivador contactece con el Administrador del Sistema o Intente Nuevamente');
		}
    }
}
