<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Dependencias;
use Illuminate\Support\Facades\Hash;
use DB;
use Validator;
use Auth;

class UsuariosController extends Controller
{
    public function index()
    {
		$users = Admin::where('adm_estado', '=', 1)->get();
        return view('tramite.administracion.usuarios.inicio', ['users'=>$users]);
    }
	
    public function create()
    {
		$dependencias = Dependencias::where('depe_tipo', '=', 1)->where('depe_estado', '=', 1)->get();
        return view('tramite.administracion.usuarios.nuevo', ['dependencias'=>$dependencias]);
    }
	
    public function store(Request $request)
    {
		try{
			DB::beginTransaction();
			
			$usuario = new Admin;
			$usuario->adm_nombre = mb_strtoupper($request->adm_nombre);
			$usuario->adm_apellido = mb_strtoupper($request->adm_apellido);
			$usuario->adm_inicial = mb_strtoupper($request->adm_inicial);
			$usuario->adm_dni = $request->adm_dni;
      $usuario->adm_cumpleanos = $request->adm_cumpleanos;
			$usuario->adm_telefono = $request->adm_telefono;
			$usuario->adm_iddependencia = $request->adm_iddependencia;
			$usuario->adm_sisgedo = $request->adm_sisgedo;
			$usuario->password = Hash::make($request->password);
			$usuario->adm_estado = 1;
			$usuario->adm_cargo = mb_strtoupper($request->adm_cargo);
			$usuario->adm_tipousuario = 2;
			$usuario->adm_email = $request->adm_email;
			$usuario->save();
						
			DB::commit();
			
			return redirect('tramite/administracion/usuarios')->with('msg', 'El Usuario fue Guardado Satisfactoriamente.');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/administracion/usuarios')->with('error', 'Hubo un error al intentar crear el Usuario contactece con el Administrador del Sistema o Intente Nuevamente');
		}        
    }
	
	public function show($id)
    {
        //
    }

    public function edit($id)
    {
		$dependencias = Dependencias::all();
        $users = Admin::where('idadmin', '=', $id)->first();
		return view('tramite.administracion.usuarios.editar', ['users'=>$users, 'dependencias'=>$dependencias]);
    }

    public function update(Request $request, $id)
    {
        try{
			DB::beginTransaction();
			
			$usuario = Admin::find($id);
			$usuario->adm_nombre = mb_strtoupper($request->adm_nombre);
			$usuario->adm_apellido = mb_strtoupper($request->adm_apellido);
			$usuario->adm_inicial = mb_strtoupper($request->adm_inicial);
			$usuario->adm_dni = $request->adm_dni;
      $usuario->adm_cumpleanos = $request->adm_cumpleanos;
			$usuario->adm_telefono = $request->adm_telefono;
			$usuario->adm_iddependencia = $request->adm_iddependencia;
			$usuario->adm_sisgedo = $request->adm_sisgedo;
			if($request->password != ""){
				$usuario->password = Hash::make($request->password);				
			}
			$usuario->adm_estado = $request->adm_estado;
			$usuario->adm_cargo = mb_strtoupper($request->adm_cargo);
			//$usuario->adm_tipousuario = 2;
			$usuario->adm_email = $request->adm_email;
			$usuario->save();
						
			DB::commit();
			
			return redirect('tramite/administracion/usuarios')->with('msg', 'El Usuario fue Editado satisfactoriamente.');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/administracion/usuarios')->with('error', 'Hubo un error al intentar Editar el Usuario contactece con el Administrador del Sistema o Intente Nuevamente');
		}
    }

    public function destroy($id)
    {
		try{
			DB::beginTransaction();
						
			$usuario = Admin::find($id);
			$usuario->adm_estado = 0;							
			$usuario->save();
			
			DB::commit();
		
			return redirect('tramite/administracion/usuarios')->with('msg', 'El Usuario fue Eliminado Satisfactoriamente.');
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/administracion/usuarios')->with('error', 'Hubo un error al intentar Eliminar el Usuario contactece con el Administrador del Sistema o Intente Nuevamente');
		}
    }
    
	public function password()
    {
        return view('tramite.login.editar');
    }
	
	public function save(Request $request, $id)
    {
		try{
			DB::beginTransaction();
			
			$rules = [
			  'adm_password' => 'required',
			  'password' => 'required|min:6|max:25',
			];

			$messages = [
				'adm_password.required' => 'El campo es requerido',
				'password.required' => 'El campo es requerido',
				'password.min' => 'El mínimo permitido son 6 caracteres',
				'password.max' => 'El máximo permitido son 18 caracteres',
			];
		
			$validator = Validator::make($request->all(), $rules, $messages);
			if($validator->fails()){
				//dd('entro if');
				return redirect('tramite/password/edit')->withErrors($validator);
			}
			else{				
				if(Hash::check($request->adm_password, Auth::user()->password)){
					$usuario = Admin::find($id);
					$usuario->password = Hash::make($request->password);
					$usuario->save();
					
					DB::commit();
					
					Auth::logout();
				    //dd('entro if-else');
					return redirect('/')->with('status', 'Contraseña cambiada Satisfactoriamente');
				}
				else{
				    return redirect('tramite/password/edit')->with('message', 'La Contraseña Actual Ingresada es Incorrecta');
				}
			}
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('tramite/password/edit')->with('error', 'Hubo un error al cambiar su contraseña contáctese con el Administrador del Sistema o Intente Nuevamente');
		}
		
    }
}