@extends('layouts.admin') @section('contenido') {!! Form::open(array('url' => 'tramite/administracion/usuarios/'.$users->idadmin, 'method' =>'PUT')) !!} {{csrf_field()}}
<style>
    .nav-tabs-custom > .nav-tabs > li.active {
      border-top-color: #37BC89;
    }  
	
	.box-footer1 {
		border-top-left-radius: 0;
		border-top-right-radius: 0;
		border-bottom-right-radius: 3px;
		border-bottom-left-radius: 3px;
		border-top: 1px solid #37BC89;
		padding: 10px;
		background-color: #fff;
	}
	
	.box-footer2 {
		border-top-left-radius: 0;
		border-top-right-radius: 0;
		border-bottom-right-radius: 3px;
		border-bottom-left-radius: 3px;
		border-top: 1px solid #C2E1D5;
		padding: 10px;
		background-color: #fff;
	}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        	<i class="fa fa-user"> </i>
            Usuarios
        </h1>
        <ol class="breadcrumb">
            <li><a class="text-green" href="{{url('tramite')}}"><i class="fa fa-dashboard"></i> Trámite</a></li>
            <li><a class="text-green" href="{{url('tramite/administracion/')}}">Administración</a></li>
            <li class="active">Editar Usuario</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li><a href="{{url('tramite/administracion/usuarios')}}">Buscar Usuarios</a></li>
                        <li class="active"><a href="#buscar" data-toggle="tab">Editar Usuario</a></li>
                    </ul>
                    <!-- general form elements -->
                    <div class="tab-content">
                        <div class="chart tab-pane active" id="buscar">
                            <!-- /.box-header -->
                            <div class="form-group col-sm-6">
                                <label for="adm_nombre">1. Nombre</label>
                                <input type="text" class="form-control" value="{{$users->adm_nombre}}" name="adm_nombre" id="adm_nombre" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="adm_apellido">2. Apellido</label>
                                <input type="text" class="form-control" value="{{$users->adm_apellido}}" name="adm_apellido" id="adm_apellido" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="adm_inicial">3. Iniciales</label>
                                <input type="text" class="form-control" value="{{$users->adm_inicial}}" name="adm_inicial" id="adm_inicial">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="adm_dni">4. DNI</label>
                                <!--<input type="text" class="form-control" value="{{$users->adm_dni}}" name="adm_dni" id="adm_dni" maxlength="8" required>-->
                                <input type="number" class="form-control" name="adm_dni" id="adm_dni" onKeyPress="if(this.value.length==8) return false;" value="{{$users->adm_dni}}" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="adm_cumpleanos">5. Fecha de Nacimiento</label>
                                <input type="date" class="form-control" name="adm_cumpleanos" id="adm_cumpleanos" value="{{$users->adm_cumpleanos}}" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="adm_telefono">6. Telefono (Cel.)</label>
                                <input type="text" class="form-control" value="{{$users->adm_telefono}}" name="adm_telefono" id="adm_telefono" maxlength="10">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="adm_iddependencia">7. Oficina</label>
                                <select name="adm_iddependencia" id="adm_iddependencia" class="form-control select2" required>
                                	<option value>Seleccione un Opción</option>
                                	@foreach($dependencias AS $dependencia)
                                		@if($users->adm_iddependencia == $dependencia->iddependencia )
                                			<option value="{{$dependencia->iddependencia}}" selected>{{$dependencia->iddependencia}}. {{$dependencia->depe_nombre}}</option>
                                		@else
                                			<option value="{{$dependencia->iddependencia}}">{{$dependencia->iddependencia}}. {{$dependencia->depe_nombre}}</option>
                                		@endif
                                	@endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="adm_cargo">8. Cargo</label>
                                <input type="text" class="form-control" value="{{$users->adm_cargo}}" name="adm_cargo" id="adm_cargo" required>
                            </div>
                            
							<div class="col-xs-12"><div class="box-footer2"></div></div>
                                 
                            <div class="form-group col-sm-6">
                                <label for="adm_email">9. Email</label>
                                <input type="email" class="form-control" name="adm_email" id="adm_email" value="{{$users->adm_email}}" required>
                            </div>
                                                                             
                            <div class="form-group col-sm-6">
                                <label for="adm_sisgedo">10. Usuario</label>
                                <input type="text" class="form-control" value="{{$users->adm_sisgedo}}" name="adm_sisgedo" id="adm_sisgedo" required>
                            </div>                           
                            <div class="form-group col-sm-6">
                                <label for="password">11. Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Ingrese su Nueva Contraseña">
                            </div>                        
                            <div class="form-group col-sm-6">
                                <label for="adm_estado">12. Estado</label>
                                <select name="adm_estado" id="adm_estado" class="form-control">
                                	@if($users->adm_estado == 1)
                                		<option value="1" selected>Activo</option>
                                		<option value="2">Inactivo</option>
                                	@else
                                		<option value="1">Activo</option>
                                		<option value="2" selected>Inactivo</option>
                                	@endif                                	
                                </select>
                            </div>   
                                                        
                            <div class="col-xs-12">
                                <div class="box-footer1">
                                <a href="{{url('tramite/administracion/usuarios')}}" class="btn btn-default"><i class="fa fa-exchange"></i> Volver</a>
                                <button class="btn btn-success pull-right" type="submit"><i class="fa fa-sign-out"></i> Guardar</button>
                                </div>
                                <!--<button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>-->
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

{!! Form::close() !!} @stop