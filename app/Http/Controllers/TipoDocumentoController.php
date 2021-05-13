<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TipoDocumento;
use DB;

class TipoDocumentoController extends Controller
{
    public function index()
    {
        $tipoDocs = TipoDocumento::select('idtdoc as id', 'tdoc_descripcion as nombre', 'tdoc_abreviado as abreviar')->where('tdoc_estado', '=', 1)->get();
        return view('tramite.catalogos.tipodocumento.inicio', ['tipoDocs'=>$tipoDocs]);
    }

    public function create()
    {
        return view('tramite.catalogos.tipodocumento.nuevo');
    }

    public function store(Request $request)
    {
		try{
			DB::beginTransaction();
			
			$tipodoc = new TipoDocumento;
			$tipodoc->tdoc_descripcion = mb_strtoupper($request->tdoc_descripcion);
			$tipodoc->tdoc_abreviado = mb_strtoupper($request->tdoc_abreviado);
			$tipodoc->tdoc_estado = 1;
			$tipodoc->tdoc_correlativo = 0;
			$tipodoc->tdoc_fecha = date('Y-m-d');
			$tipodoc->save();
			
			DB::commit();
			
			return redirect('tramite/catalogos/tipodocumentos')->with('msg', 'El Tipo de Documento fue Guardado Satisfactoriamente.');
		}			
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/catalogos/tipodocumentos')->with('error', 'Hubo un error al intentar crear el Tipo de Documento contactece con el Administrador del Sistema o Intente Nuevamente');
		}
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $edittipodoc = TipoDocumento::select('idtdoc AS id', 'tdoc_descripcion AS nombre', 'tdoc_abreviado AS abreviado', 'tdoc_fecha AS fecha')->where('idtdoc', '=', $id)->first();
        return view('tramite.catalogos.tipodocumento.editar', ['edittipodoc'=>$edittipodoc]);
    }

    public function update(Request $request, $id)
    {
		try{
			DB::beginTransaction();
			
			$tipodoc = TipoDocumento::find($id);
			$tipodoc->tdoc_descripcion = mb_strtoupper($request->tdoc_descripcion);
			$tipodoc->tdoc_abreviado = mb_strtoupper($request->tdoc_abreviado);
			$tipodoc->save();
			
			DB::commit();
			
			return redirect('tramite/catalogos/tipodocumentos')->with('msg', 'El Tipo de Documento fue Editado Satisfactoriamente.');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/catalogos/tipodocumentos')->with('error', 'Hubo un error al intentar Editar el Tipo de Documento contactece con el Administrador del Sistema o Intente Nuevamente');
		}
    }

    public function destroy($id)
    {
		try{
			DB::beginTransaction();
			
			$tipodoc = TipoDocumento::find($id);
			$tipodoc->tdoc_estado = 0;
			$tipodoc->save();
			
			DB::commit();

			return redirect('tramite/catalogos/tipodocumentos')->with('msg', 'El Tipo de Documento fue Eliminado Satisfactoriamente');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/catalogos/tipodocumentos')->with('error', 'Hubo un error al intentar Eliminar el Tipo de Documento contactece con el Administrador del Sistema o Intente Nuevamente');
		}
    }
}
