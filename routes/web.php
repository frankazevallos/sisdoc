<?php

Route::resource('externo', 'ExternoController');
Route::post('externo/expedientes', 'ExternoController@expedientes');
Route::post('externo/documento', 'ExternoController@documento');
Route::get('externo/documentoprint/{id}', 'ExternoController@documentoprint');

Route::get('/', function () {
    return view('tramite.login.login');
});

//LOGIN
Route::get('login', 'Login\LoginController@login');
Route::get('olvidar', 'Login\LoginController@olvidar');

Route::get('enviar', 'Login\LoginController@enviar');
Route::post('restaurar', 'Login\LoginController@restaurar');
Route::get('recibirpass/{token}', 'Login\LoginController@recibirpass');
Route::post('cambiarpass', 'Login\LoginController@cambiarpass');

Route::post('ingresar', 'Login\LoginController@ingresar');
Route::group(['middleware'=>'auth'], function(){
    
	Route::get('salir', 'Login\LoginController@salir');

    Route::get('tramite', function () {
        return view('welcome');
    });
    //Route::resource('tramite/documentos', 'DocumentosController');
    //Route::resource('tramite/catalogos', 'CatalogosController');
    //Route::resource('tramite/administracion', 'AdministracionController');

    //BUSCAR
    Route::resource('tramite/buscar', 'BuscarController');
    Route::get('tramite/buscar/{id}/unidad', 'BuscarController@unidad');
    Route::post('tramite/buscar/documento', 'BuscarController@documento');	
	Route::get('tramite/buscar/documentoprint/{id}', 'BuscarController@documentoprint');
    Route::post('tramite/buscar/expedientes', 'BuscarController@expedientes');

    //REPORTES
    Route::resource('tramite/reportes', 'ReportesController');
	Route::post('tramite/reportes/usuarios', 'ReportesController@usuarios');
	Route::post('tramite/reportes/enproceso', 'ReportesController@enproceso');
    Route::post('tramite/reportes/derivados', 'ReportesController@derivados');
    Route::post('tramite/reportes/porrecibir', 'ReportesController@porrecibir');
	Route::post('tramite/reportes/archivados', 'ReportesController@archivados');

    //DOCUMENTOS
    Route::resource('tramite/documentos/enproceso', 'EnProcesoController');
    Route::get('tramite/documentos/enproceso/aviso/{id}', 'EnProcesoController@aviso');
    Route::get('tramite/documentos/enproceso/derivar/{id}', 'EnProcesoController@derivar');
	Route::post('tramite/documentos/enproceso/usuarios', 'EnProcesoController@usuarios');
	Route::post('tramite/documentos/enproceso/guardarderivado', 'EnProcesoController@guardarderivado');
    Route::post('tramite/documentos/enproceso/eliminarderivado', 'EnProcesoController@eliminarderivado');
	Route::get('tramite/documentos/enproceso/adjuntar/{id}', 'EnProcesoController@adjuntar');
	Route::post('tramite/documentos/enproceso/guardaradjuntado', 'EnProcesoController@guardaradjuntado');
	Route::get('tramite/documentos/enproceso/archivar/{id}', 'EnProcesoController@archivar');
	Route::post('tramite/documentos/enproceso/guardararchivado', 'EnProcesoController@guardararchivado');

    Route::resource('tramite/documentos/derivados', 'DerivadosController');
    Route::get('tramite/documentos/derivados/aviso/{id}', 'DerivadosController@aviso');
    Route::get('tramite/documentos/derivados/derivar/{id}', 'DerivadosController@derivar');
    Route::post('tramite/documentos/derivados/usuarios', 'DerivadosController@usuarios');
    Route::post('tramite/documentos/derivados/guardarderivado', 'DerivadosController@guardarderivado');
    Route::post('tramite/documentos/derivados/eliminarderivado', 'DerivadosController@eliminarderivado');
    Route::get('tramite/documentos/derivados/adjuntar/{id}', 'DerivadosController@adjuntar');
    Route::post('tramite/documentos/derivados/guardaradjuntado', 'DerivadosController@guardaradjuntado');
    Route::get('tramite/documentos/derivados/archivar/{id}', 'DerivadosController@archivar');
    Route::post('tramite/documentos/derivados/guardararchivado', 'DerivadosController@guardararchivado');

    Route::resource('tramite/documentos/recibidos', 'RecibidosController');
    Route::get('tramite/documentos/recibidos/aviso/{id}', 'RecibidosController@aviso');
    Route::get('tramite/documentos/recibidos/derivar/{id}', 'RecibidosController@derivar');
    Route::post('tramite/documentos/recibidos/usuarios', 'RecibidosController@usuarios');
    Route::post('tramite/documentos/recibidos/guardarderivado', 'RecibidosController@guardarderivado');
    Route::post('tramite/documentos/recibidos/eliminarderivado', 'RecibidosController@eliminarderivado');
    Route::get('tramite/documentos/recibidos/adjuntar/{id}', 'RecibidosController@adjuntar');
    Route::post('tramite/documentos/recibidos/guardaradjuntado', 'RecibidosController@guardaradjuntado');
    Route::get('tramite/documentos/recibidos/archivar/{id}', 'RecibidosController@archivar');
    Route::post('tramite/documentos/recibidos/guardararchivado', 'RecibidosController@guardararchivado');
    Route::post('tramite/documentos/recibidos/atender', 'RecibidosController@atender');

    Route::resource('tramite/documentos/atendidos', 'AtendidosController');
    Route::get('tramite/documentos/atendidos/aviso/{id}', 'AtendidosController@aviso');
    Route::get('tramite/documentos/atendidos/derivar/{id}', 'AtendidosController@derivar');
    Route::post('tramite/documentos/atendidos/usuarios', 'AtendidosController@usuarios');
    Route::post('tramite/documentos/atendidos/guardarderivado', 'AtendidosController@guardarderivado');
    Route::post('tramite/documentos/atendidos/eliminarderivado', 'AtendidosController@eliminarderivado');
    Route::get('tramite/documentos/atendidos/adjuntar/{id}', 'AtendidosController@adjuntar');
    Route::post('tramite/documentos/atendidos/guardaradjuntado', 'AtendidosController@guardaradjuntado');
    Route::get('tramite/documentos/atendidos/archivar/{id}', 'AtendidosController@archivar');
    Route::post('tramite/documentos/atendidos/guardararchivado', 'AtendidosController@guardararchivado');

	
    Route::resource('tramite/documentos/porrecibir', 'PorRecibirController');
	Route::post('tramite/documentos/porrecibir/recibir', 'PorRecibirController@recibir');
	
    Route::resource('tramite/documentos/archivados', 'ArchivadosController');
    Route::post('tramite/documentos/archivados/devolver', 'ArchivadosController@devolver');
    //-------------------------------------------------------------
    Route::get('tramite/documentos/', 'EnProcesoController@home');

    //CATALOGOS
    Route::resource('tramite/catalogos/archivadores', 'ArchivadoresController');
    Route::resource('tramite/catalogos/tipodocumentos', 'TipoDocumentoController');
    Route::resource('tramite/catalogos/formarecepcion', 'FormaRecepcionController');
    Route::resource('tramite/catalogos/tipoprioridad', 'TiposPrioridadesController');
    Route::get('tramite/catalogos/', 'ArchivadoresController@home');
    //Route::post('tramite/catalogos/archivadores', 'ArchivadoresController@mostrarArch');
    //Route::resource('tramite/catalogos/tupa', 'TupaController');

    //ADMINISTRACION
    Route::resource('tramite/administracion/entidadesext', 'EntidadesExtController');
    Route::resource('tramite/administracion/unidadesorg', 'UnidadesOrgController');
    Route::resource('tramite/administracion/usuarios', 'UsuariosController');
    Route::resource('tramite/administracion/correlativo', 'CorrelativoController');
    //Route::resource('tramite/bloques', 'BloquesController');
    Route::resource('tramite/administracion/dependencias', 'DependenciasController');
    Route::get('tramite/administracion/', 'EntidadesExtController@home');
    
	//EDITAR USUARIO
	Route::get('tramite/password/edit', 'UsuariosController@password');
	Route::post('tramite/password/save/{id}', 'UsuariosController@save');
});
Auth::routes();
    
/*Route::get('nuevo', function(){
	$usuario = new \App\Admin;
 	$usuario->adm_nombre = "ADMINISTRADOR";
 	$usuario->adm_apellido = "SISGEDO";
 	$usuario->adm_inicial = "ADMIN";
 	$usuario->adm_dni = "12345678";
 	$usuario->adm_telefono = "953957595";
 	$usuario->adm_iddependencia = 2;
 	$usuario->adm_sisgedo = "admin";
 	$usuario->adm_password = Hash::make("admin2017");
 	$usuario->adm_estado = 1;
 	$usuario->adm_cargo = 1;
 	$usuario->adm_tipousuario = 1;
 	$usuario->save();
    return('se GUEARDO EL USUARIO');
});*/

