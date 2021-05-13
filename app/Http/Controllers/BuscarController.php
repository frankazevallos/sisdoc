<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dependencias;
use App\Documentos;
use App\Operacion;
use App\TipoDocumento;
use App\TipoPrioridad;
use Auth;
use DB;

class BuscarController extends Controller
{
    public function index()
    {
        $prioridades = TipoPrioridad::all();
		$tipodocs = TipoDocumento::all();
		$externas = Dependencias::where('depe_tipo', '=', 2)->where('depe_estado', '=', 1)->get();
		$internos = Dependencias::where('depe_tipo', '=', 1)->where('depe_estado', '=', 1)->get();
        return view('tramite.buscar.inicio', ['prioridades'=>$prioridades, 'externas'=>$externas, 'internos'=>$internos, 'tipodocs'=>$tipodocs]);
    }
    
    public function mostrarDoc(Request $request)
    {
        $tipoDocs = TipoDocumento::select('idtdoc as id', 'tdoc_descripcion as nombre', 'tdoc_abreviado as abreviar', 'tdoc_fecha as fecha')->get();
        return view('tramite.buscar.mostrar', ['tipoDocs'=>$tipoDocs]);
    }
    
    public function unidad($id)
    {       
        $unidad_buscados = Dependencias::where('depe_tipo', '=', $id)->select('iddependencia as id', 'depe_nombre as nombre')->get(); 
        return response()->json(array('unidad_buscados'=> $unidad_buscados), 200);
    }

    public function create()
    {
        return view('tramite.buscar.create');
    }
	
    public function documento(Request $request)
    {
		$documento = Documentos::where('iddocumento', '=', $request->buscar_doc)->first();
		$operacion = Operacion::where('oper_iddocumento', '=', $request->buscar_doc)->orderBy('oper_fecha', 'ASC')->get();
		//dd($doc);
		if(!$documento){
        	return redirect('tramite')->with('msg2', 'No se Encontro ningun Documento con ese Código.');	
		}
		else{
			return view('tramite.buscar.documento', ['documento'=>$documento, 'operacion'=>$operacion]);		
		}
    }
	
	public function documentoprint($id)
    {
		$documento = Documentos::where('iddocumento', '=', $id)->first();
		$operacion = Operacion::where('oper_iddocumento', '=', $id)->orderBy('oper_fecha', 'ASC')->get();
		//dd($doc);
		if(!$documento){
        	return redirect('externo')->with('exter', 'No se Encontro ningun Documento con ese Código.');	
		}
		else{
			return view('tramite.buscar.documentoprint', ['documento'=>$documento, 'operacion'=>$operacion]);		
		}
    }
	
    public function expedientes(Request $request)
    {
		if($request){
			$docu_detalle= trim($request->get('docu_detalle')); //Detalle             
            $docu_asunto= trim($request->get('docu_asunto')); //Asunto
			
			$where=[ ];                                   
           
            if($request->docu_idorigen >0){
                    $where[]=['docu_idorigen', '=', $request->docu_idorigen];
            }                           
            if($request->iddocumento >0){
                    $where[]=['iddocumento', '=', $request->iddocumento];
            }
            if($request->docu_fecharegistro >0){
                    $where[]=['docu_fecharegistro', '=', $request->docu_fecharegistro];
            }
            if($request->docu_iddependencia >0){
                    $where[]=['docu_iddependencia', '=', $request->docu_iddependencia];
            }
            if($request->docu_ext_iddependencia >0){
                    $where[]=['docu_iddependencia', '=', $request->docu_ext_iddependencia];
            }
            if($docu_detalle >0){
                    $where[]=['docu_detalle', '=', $docu_detalle];
            }
            if($request->docu_ext_nombre >0){
                    $where[]=['docu_ext_nombre', '=', $request->docu_ext_nombre];
            }
            if($request->docu_ext_dni >0){
                    $where[]=['docu_ext_dni', '=', $request->docu_ext_dni];
            }
            if($request->docu_idtipodocumento >0){
                    $where[]=['docu_idtipodocumento', '=', $request->docu_idtipodocumento];
            }
            if($docu_asunto >0){
                    $where[]=['docu_asunto', '=', $docu_asunto];
            }
            
			
			$documentos = Documentos::where($where)->get();
			//$doc = count($documentos);

			if(!$documentos){
				return redirect('tramite/buscar')->with('msg2', 'No se Encontro ningun Documento con los datos ingresados.');	
			}
			else{
				return view('tramite.buscar.encontrado', ['documentos'=>$documentos]);		
			}
		}
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
