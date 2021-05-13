@extends('layouts.admin') @section('contenido') <meta name="csrf-token" content="{{ csrf_token() }}"> 
{!! Form::open(array('url' => 'tramite/documentos/enproceso/guardarderivado', 'method' =>'POST', 'name'=>'formu', 'files'=>true)) !!} {{csrf_field()}}
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
<div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        	<i class="fa fa-file-text"> </i>
            En Proceso
        </h1>
        <ol class="breadcrumb">
            <li><a class="text-green" href="{{url('tramite')}}"><i class="fa fa-dashboard"></i> Trámite</a></li>
            <li><a class="text-green" href="{{url('tramite/documentos')}}">Documentos</a></li>
            <li><a class="text-green" href="{{url('tramite/documentos/enproceso')}}">En-Proceso</a></li>
            <li class="active">Derivar Documento</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li><a href="{{url('tramite/documentos/enproceso')}}">Buscar Documentos En Proceso</a></li>
                        <li class="active"><a href="#buscar" data-toggle="tab">Derivar Documento</a></li>
                    </ul>
                    <!-- general form elements -->
                    <div class="tab-content">
                        <div class="chart tab-pane active" id="buscar">
                            <!-- /.box-header -->
                            <div class="form-group col-sm-3">
                                <label for="iddocumento">1. Registro</label>
                                <input type="text" class="form-control" name="iddocumento" id="iddocumento" value="{{ str_pad($operacion->getdocumento->iddocumento, 4, '0', STR_PAD_LEFT) }}" readonly>
                            </div>  
                            <div class="form-group col-sm-3">
                                <label for="idoperacion">2. Operacion</label>
                                <input type="text" class="form-control" name="idoperacion" id="idoperacion" value="{{ str_pad($operacion->idoperacion, 4, '0', STR_PAD_LEFT) }}" readonly>
                            </div>  
                            <div class="form-group col-sm-6">
                                <label for="docu_idtipodocumento">3. Tipo de Documento</label>
                                <input type="text" class="form-control" name="docu_idtipodocumento" id="docu_idtipodocumento" value="{{$operacion->getdocumento->gettipodocumento->tdoc_descripcion}}" readonly>
                            </div>   
                            <div class="form-group col-sm-6">
                                <label for="docu_asunto">4. Asunto</label>
                                <textarea class="form-control" name="docu_asunto" id="docu_asunto" rows="2" readonly>{{$operacion->getdocumento->docu_asunto}}</textarea>
                            </div>  
                            <div class="form-group col-sm-2">
                                <label for="docu_folios">5. Folios</label>
                                <input type="text" class="form-control" name="docu_folios" id="docu_folios" value="{{ str_pad($operacion->getdocumento->docu_folios, 3, '0', STR_PAD_LEFT) }}" readonly>
                            </div> 
                            <div class="form-group col-sm-4">
                                <label for="docu_archivo">6. Archivo</label>                                
                                <a href="{{asset('documentospdf').'/'.$operacion->getdocumento->docu_archivo}}" class="btn btn-warning btn-flat btn-block" target="_blank"><i class="fa fa-file-text"></i> Ver Documento</a>
                            </div> 
                            
							<div class="col-xs-12"><div class="box-footer2">Destino(s) Derivación del Documento</div></div>
                           
                            <div class="form-group col-sm-6">
                                <label for="oper_fecha">7. Fecha de Registro</label>
                                <div class="input-group date">
								    <div class="input-group-addon">
									    <i class="fa fa-calendar"></i>
								    </div>
								    <input type="date" class="form-control" id="oper_fecha" name="oper_fecha" value="{{date('Y-m-d')}}" required readonly>
								</div>
                            </div>                             
                            <div class="form-group col-sm-6">
								<label for="oper_depeid_d">8. Unidad Orgánica Destino</label>
								<select class="form-control select2" name="oper_depeid_d" id="oper_depeid_d" style="width: 100%;" required>
									<option value> Seleccione una Opción</option>
									@foreach($organicas AS $organica)
										<option value ="{{$organica->iddependencia}}"> {{$organica->depe_nombre}}</option>
									@endforeach
								</select>                                
							</div>   
                            <div class="form-group col-sm-6">
								<label for="oper_usuid_d">9. Usuario Destino</label>
								<select class="form-control" name="oper_usuid_d" id="oper_usuid_d" required>
									<option value> Seleccione Opción</option>
								</select>                                
							</div>       
                            <div class="form-group col-sm-6">
								<label for="oper_detalledestino">10. Detalle</label>
								<input type="text" class="form-control" name="oper_detalledestino" id="oper_detalledestino" placeholder="Ingrese el Detalle de la derivación" required>
							</div> 
                            <div class="col-xs-12">
                                <div class="box-footer1">
                                    <a href="{{url('tramite/documentos/enproceso')}}" class="btn btn-default"><i class="fa fa-exchange"></i> Volver</a>
                                    <button class="btn btn-success pull-right" type="submit"><i class="fa fa-sign-out"></i> Guardar</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
{!! Form::close() !!}

<script type="text/javascript">
	$(document).ready(function(){
		
		$.ajaxSetup({
		  headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  }
		});

		$("#oper_depeid_d").change(function(){
			 $("#oper_usuid_d").empty();
			$.post(
			  "{{url('tramite/documentos/enproceso/usuarios')}}",
			  {oper_depeid_d:$(this).val()},
			  function(resp){
				var select = '<option value>--Seleccione opción--</option>';                    
				var option = '';
				obj = resp; 
				$.each( obj, function( key, value ) {
					option = option + '<option value="'+value['idadmin']+'">'+value['adm_nombre']+'  '+value['adm_apellido']+'</option>';
				});                     
				select = select + option;
				$( "#oper_usuid_d" ).html( select );
			  }
			);
		});
	});		
</script>
@stop