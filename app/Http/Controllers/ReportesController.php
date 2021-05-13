<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Dependencias;
use App\Admin;
use App\TipoDocumento;
use App\Operacion;
use App\Archivadores;

class ReportesController extends Controller
{
    public function index()
    {
		$unidades = Dependencias::where('depe_tipo', '=', 1)->where('depe_estado', '=', 1)->select('iddependencia', 'depe_nombre')->get();
		$tipodocs = TipoDocumento::where('tdoc_estado', '=', 1)->select('tdoc_descripcion', 'idtdoc')->get();
        return view('tramite.reportes.inicio', compact('unidades', 'tipodocs'));
    }
	
	public function usuarios(Request $request){
		$id = $request->en_iddependencia;	
		$usuarios_buscados = Admin::where('adm_iddependencia', '=', $id)->orderBy('adm_nombre', 'asc')->get();		
		return $usuarios_buscados;
	}
	
	/*public function archivador(Request $request){
		$id = $request->en_iddependencia;	
		$archivador_buscados = Archivadores::where('arch_iddependencia', '=', $id)->orderBy('arch_nombre', 'asc')->get();		
		return $archivador_buscados;
	}*/
	
    public function enproceso(Request $request)
    {        
			
		$idt = $request->en_idtdoc;		
			
		$where=[ 
			['oper_idtope', '=', 1],
			['oper_procesado', '=', 'f'],
		];           
	        if($request->en_iddependencia >0){
	            $where[]=['oper_iddependencia', '=', $request->en_iddependencia];
	        }          
	        if($request->en_idadmin >0){
	            $where[]=['oper_idadmin', '=', $request->en_idadmin];
	        }
		
		if ($idt != null) {
			$enprocesos = Operacion::where($where)->whereHas('getdocumento', function ($query) use($idt) {
				$query->where('docu_idtipodocumento', $idt);
			})->orderBy('oper_iddocumento', 'ASC')->get();	
		}
		else{
			$enprocesos = Operacion::where($where)->orderBy('oper_iddocumento', 'ASC')->get();
		}

		//$count = count($enprocesos);

		if($enprocesos){
			return view('tramite.reportes.rptenproceso', compact('enprocesos'));
		}
		else{
			return redirect('tramite/reportes')->with('error', 'No se encontraron Documentos: En Proceso con los datos Ingresados.');
		}	
    }
	
    public function porrecibir(Request $request)
    {        
			
		$idt = $request->en_idtdoc2;		
			
		$where=[ 
			['oper_idtope', '=', 2],
			['oper_procesado', '=', 'f'],
		];           
        if($request->en_iddependencia2 >0){
                $where[]=['oper_iddependencia', '=', $request->en_iddependencia2];
        }          
        if($request->en_idadmin2 >0){
                $where[]=['oper_idadmin', '=', $request->en_idadmin2];
        }
		
		if ($idt != null) {
			$porrecibirs = Operacion::where($where)->whereHas('getdocumento', function ($query) use($idt) {
				$query->where('docu_idtipodocumento', $idt);
			})->get();	
		}
		else{
			$porrecibirs = Operacion::where($where)->orderBy('oper_iddocumento', 'ASC')->get();
		}		

		if($porrecibirs){
			return view('tramite.reportes.rptporrecibir', compact('porrecibirs'));
		}
		else{
			return redirect('tramite/reportes')->with('error', 'No se encontraron Documento: Por Recibir con los datos Ingresados.');
		}	
    }
	
    public function archivados(Request $request)
    {        
			
		$idt = $request->en_idtdoc3;		
			
		$where=[ 
			['oper_idtope', '=', 4],
			['oper_procesado', '=', 'f'],
		];           
        if($request->en_iddependencia3 >0){
                $where[]=['oper_iddependencia', '=', $request->en_iddependencia3];
        }
        if($request->en_idadmin3 >0){
                $where[]=['oper_idadmin', '=', $request->en_idadmin3];
        }
		
		if ($idt != null) {
			$archivados = Operacion::where($where)->whereHas('getdocumento', function ($query) use($idt) {
				$query->where('docu_idtipodocumento', $idt);
			})->get();	
		}
		else{
			$archivados = Operacion::where($where)->orderBy('oper_iddocumento', 'ASC')->get();
		}		

		if($archivados){
			return view('tramite.reportes.rptarchivados', compact('archivados'));
		}
		else{
			return redirect('tramite/reportes')->with('error', 'No se encontraron Documento: Archivados con los datos Ingresados.');
		}	
    }

    
}
