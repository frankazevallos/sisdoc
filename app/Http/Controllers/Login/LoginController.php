<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use Validator;
use Auth;
use Mail;
use Session;
use DB;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    public function login()
    {
        return view('tramite.login.login');
    }
    
    public function ingresar(Request $request){
		Validator::make($request->all(), [
			'email' => 'required',
			'password' => 'required',
		]);
        
		if (Auth::attempt(['adm_sisgedo' => $request->email, 'password' => $request->password])) {        
            return redirect()->intended('tramite');
        }else{            
			return redirect('login')->with('error_message', 'Usuario o contraseña incorrectos. Intente de nuevo.');
		}
	}

	public function salir(){
		Auth::logout();
		return redirect('/externo');
	}
	
	public function olvidar()
	{		
		return view('tramite.login.olvidar');
	}
	
	public function restaurar(Request $request)
	{		
		// try{
		// 	DB::beginTransaction();
			
			$where=[
                ['adm_dni', '=', $request->adm_dni],                
                ['adm_cumpleanos', '=', $request->adm_cumpleanos]               
            ];  
			
			$rest = Admin::where($where)->first();			
						
			
			if(!$rest){
				return redirect('olvidar')->with('restaurar_error', 'No se encontró ningun Usuario con los datos ingresados. Intente de nuevo.');
			}
			else{
				$email = $rest->adm_email;	
								
				$verif_user = Admin::find($rest->idadmin);
				$verif_user->verification_token = str_random(40);
				$verif_user->save();

				DB::commit();
				
				Mail::send('tramite.login.email', ['verif_user' => $verif_user], function($msj) use ($email) {
					$msj->subject('Municipalidad Distrital de Amarilis: Solicitud para restablecer su contraseña');
					$msj->to($email);
				});

				return redirect('enviar')->with('restaurar', 'SISDATA: Se envió un link para restablecer su contraseña a su correo electrónico: '.$rest->adm_email);
			}
						
		// }
		// catch(\Exception $e){
		// 	DB::rollBack();
			
		// 	return redirect('olvidar')->with('restaurar_error', 'Hubo un error al intentar reestablecer su Contraseña contactece con el Administrador del Sistema o Intente Nuevamente');
		// }
		
	}
	
	public function enviar()
	{		
		return view('tramite.login.enviar');
	}
	
	public function recibirpass($token)
	{	
		$user_token = Admin::where('verification_token', '=', $token)->first();
		
		if($user_token){
			return view('tramite.login.recibirpass', ['user_token'=>$user_token]);
		}
		else{
			return view('tramite.login.false');
		}
	}
	
	public function cambiarpass(Request $request)
	{		
		try{
			DB::beginTransaction();
			
			$admin = Admin::where('adm_dni', '=', $request->adm_dni)->select('idadmin')->first();
						
			$usuario = Admin::find($admin->idadmin);
			$usuario->password = Hash::make($request->password);
			$usuario->verification_token = null;
			$usuario->save();					

			DB::commit();

			return redirect('/')->with('status', 'Contraseña Reestablecida Satisfactoriamente');	
			
		}
		catch(\Exception $e){
			DB::rollBack();
			
			return redirect('recibirpass')->with('error', 'Hubo un error al cambiar su contraseña contactece con el Administrador del Sistema o Intente Nuevamente');
		}
	}
}