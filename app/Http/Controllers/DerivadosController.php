<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\UploadedFile;
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

class DerivadosController extends Controller
{
	public function home()
    {
        return view('tramite.documentos.home');
    }
    
    public function index()
    {
		$operaciones = Operacion::whereIn('oper_idtope', [2])->where('oper_procesado', '=', 'f')->where('oper_iddependencia', '=', Auth::user()->adm_iddependencia)->get();
		
        return view('tramite.documentos.derivados.inicio', ['operaciones'=>$operaciones]);
    }

    public function create()
    {
		//
    }

    public function store(Request $request)
    {
		try{
			DB::beginTransaction();
		
			$documento = new Documentos();
			$documento->docu_idorigen = $request->docu_idorigen;

			if($request->docu_idorigen == 1){
				$documento->docu_tipo = $request->docu_tipo;
				$documento->docu_iddependencia = $request->docu_iddependencia;
				$documento->docu_firma = mb_strtoupper($request->docu_firma);
				$documento->docu_cargo = mb_strtoupper($request->docu_cargo);
			}
			else{
				$documento->docu_iddependencia = $request->docu_ext_iddependencia;
				$documento->docu_detalle = mb_strtoupper($request->docu_detalle);
				$documento->docu_ext_nombre = mb_strtoupper($request->docu_ext_nombre);
				$documento->docu_ext_dni = $request->docu_ext_dni;
			}

			$documento->docu_forma = 0;
			$documento->docu_idtipodocumento = $request->docu_idtipodocumento;
			$documento->docu_numero_doc = $request->docu_numero_doc;
			$documento->docu_siglas_doc = $request->docu_siglas_doc;
			$documento->docu_idprioridad = $request->docu_idprioridad;
			$documento->docu_folios = $request->docu_folios;
			$documento->docu_asunto = mb_strtoupper($request->docu_asunto);
			$documento->docu_idadmin = Auth::user()->idadmin;
			$documento->docu_idusuariodependencia = Auth::user()->adm_iddependencia;
			$documento->docu_fecharegistro = $request->docu_fecharegistro;


			if ($request->hasFile('file_archivo')) {
				if ($request->file('file_archivo')->isValid()) {
					$pdf = $request->file('file_archivo');
					$file_route = time().'_'.$pdf->getClientOriginalName(); 

					Storage::disk('documentospdf')->put($file_route, file_get_contents($pdf->getRealPath() ));

					$documento->docu_archivo = $file_route;
					$documento->save();
				
					//INICIO OPERACION					
					$operacion = new Operacion();
					$operacion->oper_iddocumento = $documento->iddocumento;
					$operacion->oper_iddependencia = Auth::user()->adm_iddependencia;
					$operacion->oper_idadmin = Auth::user()->idadmin;
					$operacion->oper_idtope = 1;
					$operacion->oper_forma = 0;
					$operacion->oper_procesado = 'f';
					$operacion->oper_fecha = $documento->docu_fecharegistro;
					$operacion->save();
					// FIN OPERACION
					
					DB::commit();
					
					$derivar = Operacion::where('idoperacion', '=', $operacion->idoperacion)->first();
						
					return redirect('tramite/documentos/derivados')->with('derivar', $derivar);	
				}
				else{ return redirect('tramite/documentos/derivados')->with('error', 'Hubo un error al intentar crear el Documento intente nuevamente.'); }
			}
			else{ 
				return redirect('tramite/documentos/derivados')->with('error', 'No se encontro ningun Archivo para Guardar intente Nuevamente'); 
			}			
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/documentos/derivados')->with('error', 'Hubo un error al intentar crear el Documento contactece con el Administrador del Sistema');
		}      
        
    }

    public function aviso($id)
    {
        return view('tramite.documentos.derivados.aviso');
    }
	
	public function derivar($id)
	{
		$operacion = Operacion::where('idoperacion', '=', $id)->first();
		$organicas = Dependencias::where('depe_estado', '=', 1)->where('depe_tipo','=', 1)->get();
        return view('tramite.documentos.derivados.derivar', ['organicas'=>$organicas, 'operacion'=>$operacion]);
    }
	
	public function usuarios(Request $request){
		$usuarios_buscados = Admin::where('adm_iddependencia', '=', $request->oper_depeid_d)->orderBy('adm_nombre', 'asc')->get();
		return $usuarios_buscados;
	}
	
	public function guardarderivado(Request $request)
	{
		try{
			DB::beginTransaction();
			
			$operacion = new Operacion();
			$operacion->oper_iddocumento = $request->iddocumento;
			$operacion->oper_iddependencia = Auth::user()->adm_iddependencia;
			$operacion->oper_idadmin = Auth::user()->idadmin;
			$operacion->oper_idtope = 2;
			$operacion->oper_forma = 0;
			$operacion->oper_depeid_d = $request->oper_depeid_d;
			$operacion->oper_usuid_d = $request->oper_usuid_d;
			$operacion->oper_detalledestino = mb_strtoupper($request->oper_detalledestino);
			$operacion->oper_idprocesado = $request->idoperacion;
			$operacion->oper_procesado = 'f';
			$operacion->oper_fecha = $request->oper_fecha;
			$operacion->save();
			
			$derivado = Operacion::find($request->idoperacion);
			$derivado->oper_procesado = 't';
			$derivado->save();
			
			DB::commit();
			
			return redirect('tramite/documentos/derivados')->with('msg', 'El Documento fue Derivado Satisfactoriamente');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/documentos/derivados')->with('error', 'Hubo un error al intentar Derivar el Documento, intente nuevamente o contactece con el Administrador del Sistema');
		}
	}
	
	public function eliminarderivado(Request $request)
	{
		try{
			DB::beginTransaction();
			
			$operacion = new Operacion();
			$operacion->oper_iddocumento = $request->iddocumento;
			$operacion->oper_iddependencia = Auth::user()->adm_iddependencia;
			$operacion->oper_idadmin = Auth::user()->idadmin;
			$operacion->oper_idtope = 1;
			$operacion->oper_forma = 0;
			$operacion->oper_idprocesado = $request->idoperacion;
			$operacion->oper_procesado = 'f';
			$operacion->oper_fecha = date('Y-m-d');
			$operacion->save();
			
			$elimderivado = Operacion::find($request->idoperacion);
			$elimderivado->oper_procesado = 't';
			$elimderivado->save();
			
			DB::commit();
			
			return redirect('tramite/documentos/derivados')->with('msg', 'La Derivación fue Eliminado Satisfactoriamente');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/documentos/derivados')->with('error', 'Hubo un error al intentar eliminar la Derivación el Documento, intente nuevamente o contactece con el Administrador del Sistema');
		}
    }
	
	public function show($id)
    {
        //
    }

    public function edit($id)
    {
		$documento = Documentos::where('iddocumento', '=', $id)->first();
        $prioridades = TipoPrioridad::all();
		$tipodocs = TipoDocumento::all();
		$externas = Dependencias::where('depe_tipo', '=', 2)->get();
		$representante = Dependencias::select('depe_representante', 'depe_cargo')->where('iddependencia', '=', Auth::user()->adm_iddependencia)->first();
        return view('tramite.documentos.derivados.editar', ['prioridades'=>$prioridades, 'externas'=>$externas, 'representante'=>$representante, 'tipodocs'=>$tipodocs, 'documento'=>$documento]);
    }

    public function update(Request $request, $id)
    {
        try{
			DB::beginTransaction();
		
			$documento = Documentos::find($id);
			$documento->docu_idorigen = $request->docu_idorigen;

			if($request->docu_idorigen == 1){
				$documento->docu_tipo = $request->docu_tipo;
				$documento->docu_iddependencia = $request->docu_iddependencia;
				$documento->docu_firma = mb_strtoupper($request->docu_firma);
				$documento->docu_cargo = mb_strtoupper($request->docu_cargo);
			}
			else{
				$documento->docu_iddependencia = $request->docu_ext_iddependencia;
				$documento->docu_detalle = mb_strtoupper($request->docu_detalle);
				$documento->docu_ext_nombre = mb_strtoupper($request->docu_ext_nombre);
				$documento->docu_ext_dni = $request->docu_ext_dni;
			}
			
			//$documento->docu_forma = 0;
			$documento->docu_idtipodocumento = $request->docu_idtipodocumento;			
			$documento->docu_numero_doc = $request->docu_numero_doc;
			$documento->docu_siglas_doc = $request->docu_siglas_doc;
			$documento->docu_idprioridad = $request->docu_idprioridad;
			$documento->docu_folios = $request->docu_folios;
			$documento->docu_asunto = mb_strtoupper($request->docu_asunto);
			$documento->docu_idadmin = Auth::user()->idadmin;
			$documento->docu_idusuariodependencia = Auth::user()->adm_iddependencia;
			//$documento->docu_fecharegistro = $request->docu_fecharegistro;


			if ($request->hasFile('file_archivo')) {
				if ($request->file('file_archivo')->isValid()) {
					$pdf = $request->file('file_archivo');
					$file_route = time().'_'.$pdf->getClientOriginalName(); 

					Storage::disk('documentospdf')->put($file_route, file_get_contents($pdf->getRealPath() ));

					$documento->docu_archivo = $file_route;						
				}
			}
			
			$documento->save();								
					
			DB::commit();	
			
			return redirect('tramite/documentos/derivados')->with('msg', 'El Documento fue Editado Satisfactoriamente');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/documentos/derivados')->with('error', 'Hubo un error al intentar editar el Documento contactece con el Administrador del Sistema');
		}
    }

	public function adjuntar($id)
	{
		$operacion = Operacion::where('idoperacion', '=', $id)->first();
        return view('tramite.documentos.derivados.adjuntar', ['operacion'=>$operacion]);
    }
	
	public function guardaradjuntado(Request $request)
	{
		try{
			DB::beginTransaction();
			
			$operacion = new Operacion();
			$operacion->oper_iddocumento = $request->iddocumento;
			$operacion->oper_iddependencia = Auth::user()->adm_iddependencia;
			$operacion->oper_idadmin = Auth::user()->idadmin;
			$operacion->oper_idtope = 3;
			$operacion->oper_forma = 0;
			$operacion->oper_acciones = mb_strtoupper($request->oper_acciones);
			$operacion->oper_idprocesado = $request->idoperacion;
			$operacion->oper_expeid_adj = $request->oper_expeid_adj;
			$operacion->oper_procesado = 'f';
			$operacion->oper_fecha = date('Y-m-d');			
			$operacion->save();
			
			$adjuntado = Operacion::find($request->idoperacion);
			$adjuntado->oper_procesado = 't';
			$adjuntado->save();
			
			DB::commit();
			
			return redirect('tramite/documentos/derivados')->with('msg', 'El Documento fue Adjuntado Satisfactoriamente');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/documentos/derivados')->with('error', 'Hubo un error al intentar Adjuntar el Documento, intente nuevamente o contactece con el Administrador del Sistema');
		}
	}
	
	public function archivar($id)
	{
		$operacion = Operacion::where('idoperacion', '=', $id)->first();
		$archivadores = Archivadores::where('arch_estado', '=', 1)->orderBy('arch_periodo', 'DES')->get();
        return view('tramite.documentos.derivados.archivar', ['operacion'=>$operacion, 'archivadores'=>$archivadores]);
    }
	
	public function guardararchivado(Request $request)
	{		
		try{
			DB::beginTransaction();
			
			$operacion = new Operacion();
			$operacion->oper_iddocumento = $request->iddocumento;
			$operacion->oper_iddependencia = Auth::user()->adm_iddependencia;
			$operacion->oper_idadmin = Auth::user()->idadmin;
			$operacion->oper_idarchivador = $request->oper_idarchivador;
			$operacion->oper_idtope = 4;
			$operacion->oper_forma = 0;
			$operacion->oper_acciones = mb_strtoupper($request->oper_acciones);
			$operacion->oper_idprocesado = $request->idoperacion;
			$operacion->oper_procesado = 'f';
			$operacion->oper_tarchi_id = $request->oper_tarchi_id;
			$operacion->oper_fecha = date('Y-m-d');			
			$operacion->save();
			
			$adjuntado = Operacion::find($request->idoperacion);
			$adjuntado->oper_procesado = 't';
			$adjuntado->save();
			
			DB::commit();
			
			return redirect('tramite/documentos/derivados')->with('msg', 'El Documento fue Archivado Satisfactoriamente');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/documentos/derivados')->with('error', 'Hubo un error al intentar Archivar el Documento, intente nuevamente o contactece con el Administrador del Sistema');
		}
	}
	
    public function destroy($id)
    {
        //
    }
}
