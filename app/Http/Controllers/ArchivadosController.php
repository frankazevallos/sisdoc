<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dependencias;
use App\Admin;
use App\Documentos;
use App\TipoPrioridad;
use App\TipoDocumento;
use App\Operacion;
use App\Archivadores;
use Storage;
use Auth;
use DB;

class ArchivadosController extends Controller
{
    public function index()
    {
		$archivados = Operacion::where('oper_idtope', 4)->where('oper_procesado', '=', 'f')->where('oper_iddependencia', '=', Auth::user()->adm_iddependencia)->get();
		
        return view('tramite.documentos.archivados.inicio', ['archivados'=>$archivados]);
    }

    public function devolver(Request $request)
    {
        try{
			DB::beginTransaction();
			
			$operacion = new Operacion();
			$operacion->oper_iddocumento = $request->iddocumento;
			$operacion->oper_iddependencia = Auth::user()->adm_iddependencia;
			$operacion->oper_idadmin = Auth::user()->idadmin;
			$operacion->oper_idtope = 7;
			$operacion->oper_forma = 0;
			$operacion->oper_idprocesado = $request->idoperacion;
			$operacion->oper_procesado = 'f';
			$operacion->oper_fecha = date('Y-m-d');
			$operacion->save();
			
			$devolver = Operacion::find($request->idoperacion);
			$devolver->oper_procesado = 't';
			$devolver->save();
			
			DB::commit();
			
			return redirect('tramite/documentos/archivados')->with('msg', 'El documento volvio a estar EN PROCESO !!');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/documentos/archivados')->with('error', 'Hubo un error al intentar DEVOLVER EN PROCESO el Documento, intente nuevamente o contactece con el Administrador del Sistema');
		}
    }
	
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
