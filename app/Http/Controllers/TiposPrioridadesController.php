<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TipoPrioridad;
use DB;

class TiposPrioridadesController extends Controller
{
    public function index()
    {
        $prioridades = TipoPrioridad::select('idprioridad AS id', 'prio_descripcion AS nombre', 'prio_abreviado AS abreviado')->where('prio_estado', '=', 1)->get();
        return view('tramite.catalogos.tipoprioridad.inicio', ['prioridades'=>$prioridades]);
    }

    public function create()
    {
        return view('tramite.catalogos.tipoprioridad.nuevo');
    }

    public function store(Request $request)
    {
		try{
			DB::beginTransaction();
			$prioridad = new TipoPrioridad;
			$prioridad->prio_descripcion = mb_strtoupper($request->prio_descripcion);
			$prioridad->prio_abreviado = mb_strtoupper($request->prio_abreviado);
			$prioridad->prio_estado = 1;
			$prioridad->save();
			
			DB::commit();
			
			return redirect('tramite/catalogos/tipoprioridad')->with('msg', 'El Tipo de Prioridad fue Guardado Satisfactoriamente.');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/catalogos/tipoprioridad')->with('error', 'Hubo un error al intentar Crear el Tipo de Prioridad contactece con el Administrador del Sistema o Intente Nuevamente');
		} 
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $edittipoprio = TipoPrioridad::select('idprioridad AS id', 'prio_descripcion AS nombre', 'prio_abreviado AS abreviado')->where('idprioridad', '=', $id)->first();
        return view('tramite.catalogos.tipoprioridad.editar', ['edittipoprio'=>$edittipoprio]);
    }

    public function update(Request $request, $id)
    {
		/*try{
			DB::beginTransaction();*/
		
			$prioridad = TipoPrioridad::find($id);			
			$prioridad->prio_descripcion = mb_strtoupper($request->prio_descripcion);
			$prioridad->prio_abreviado = mb_strtoupper($request->prio_abreviado);
			$prioridad->save();
			
			/*DB::commit();*/
			
			return redirect('tramite/catalogos/tipoprioridad')->with('msg', 'El Tipo de Prioridad fue Editado Satisfactoriamente.');
		/*}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/catalogos/tipoprioridad')->with('error', 'Hubo un error al intentar editar el Tipo de Prioridad contactece con el Administrador del Sistema o Intente Nuevamente');
		} */
    }

    public function destroy($id)
    {
		try{
			DB::beginTransaction();

			$prioridad = TipoPrioridad::find($id);
			$prioridad->prio_estado = 0;
			$prioridad->save();
			
			DB::commit();
			
			return redirect('tramite/catalogos/tipoprioridad')->with('msg', 'El Tipo de Prioridad fue Eliminado');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/catalogos/tipoprioridad')->with('error', 'Hubo un error al intentar eliminar el Tipo de Prioridad contactece con el Administrador del Sistema o Intente Nuevamente');
		} 
			
    }
}
