<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\FormaRecepcion;

class FormaRecepcionController extends Controller
{
    public function index()
    {
        $recepcions = FormaRecepcion::select('idrecepcion AS id', 'rece_descripcion AS nombre', 'rece_abreviado AS abreviado')->get();
        return view('tramite.catalogos.formarecepcion.inicio', ['recepcions'=>$recepcions]);
    }

    public function create()
    {
        return view('tramite.catalogos.formarecepcion.nuevo');
    }

    public function store(Request $request)
    {
        $recepcion = new FormaRecepcion;
        $recepcion->rece_descripcion = mb_strtoupper($request->rece_descripcion);
        $recepcion->rece_abreviado = mb_strtoupper($request->rece_abreviado);
        $recepcion->save();
        
        return redirect('tramite/catalogos/formarecepcion')->with('msg', 'La Forma de Recepción fue Guardado Satisfactoriamente.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $editreceps = FormaRecepcion::select('idrecepcion AS id', 'rece_descripcion AS nombre', 'rece_abreviado AS abreviado')->where('idrecepcion', '=', $id)->first();
        return view('tramite.catalogos.formarecepcion.editar', ['editreceps'=>$editreceps]);
    }

    public function update(Request $request, $id)
    {
        $recepcion = FormaRecepcion::find($id);
        $recepcion->rece_descripcion = mb_strtoupper($request->rece_descripcion);
        $recepcion->rece_abreviado = mb_strtoupper($request->rece_abreviado);
        $recepcion->save();
        
        return redirect('tramite/catalogos/formarecepcion')->with('msg', 'La Forma de Recepción fue Editada Satisfactoriamente.');
    }

    public function destroy($id)
    {   
        $recepcion = FormaRecepcion::find($id);
        $recepcion->delete();
        return redirect('tramite/catalogos/formarecepcion')->with('msg', 'La Forma de Recepción fue Eliminado');
    }
}
