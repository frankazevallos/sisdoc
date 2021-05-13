<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Operacion;
use Auth;
use DB;

class PorRecibirController extends Controller
{
    public function index()
    {
		$operaciones = Operacion::where('oper_idtope', 2)->where('oper_procesado', '=', 'f')->where('oper_usuid_d', '=', Auth::user()->idadmin)->get();
        return view('tramite.documentos.porrecibir.inicio', ['operaciones'=>$operaciones]);
    }
	
	public function recibir(Request $request)
    {
        try{
			DB::beginTransaction();
			
			$operacion = new Operacion();
			$operacion->oper_iddocumento = $request->iddocumento;
			$operacion->oper_iddependencia = Auth::user()->adm_iddependencia;
			$operacion->oper_idadmin = Auth::user()->idadmin;
			$operacion->oper_idtope = 5;
			$operacion->oper_acciones = mb_strtoupper($request->oper_acciones);
			$operacion->oper_idprocesado = $request->idoperacion;
			$operacion->oper_procesado = 'f';
			$operacion->oper_fecha = $request->oper_fecha;
			$operacion->save();
			
			$recibido = Operacion::find($request->idoperacion);
			$recibido->oper_procesado = 't';
			$recibido->save();
			
			DB::commit();
			
			return redirect('tramite/documentos/porrecibir')->with('msg', 'El Documento fue Recibido Satisfactoriamente');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/documentos/porrecibir')->with('error', 'Hubo un error al Recibir el Documento, intente nuevamente o contactece con el Administrador del Sistema');
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
