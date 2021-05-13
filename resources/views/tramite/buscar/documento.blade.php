@extends('layouts.admin') @section('contenido') <meta name="csrf-token" content="{{ csrf_token() }}"> 
{{csrf_field()}}
<style>
    .nav-tabs-custom > .nav-tabs > li.active {
        border-top-color: #37BC89;
    }
	
    .table-mihover>tbody>tr:hover {
        background-color: #FBEAB6
    }
	
	.table>thead>tr>th,
    .table>tbody>tr>th,
    .table>tfoot>tr>th,
    .table>thead>tr>td,
    .table>tbody>tr>td,
    .table>tfoot>tr>td {
        font-size: 11px;
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
            Documento
        </h1>
        <ol class="breadcrumb">
            <li><a class="text-green" href="{{url('tramite')}}"><i class="fa fa-dashboard"></i> Trámite</a></li>
            <li class="active">Documento</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="nav-tabs-custom">
                    <!--<ul class="nav nav-tabs">
                        <li><a href="{{url('tramite/documentos/enproceso')}}">Buscar Documentos En Proceso</a></li>
                        <li class="active"><a href="#buscar" data-toggle="tab">Derivar Documento</a></li>
                    </ul>-->
                    <!-- general form elements -->
                    <div class="tab-content">
                        <div class="chart tab-pane active" id="buscar">
                            <!-- /.box-header -->
							@if($documento->docu_idorigen == 1)
                            	<div class="form-group col-sm-6">
									<label for="iddocumento">1. Registro</label>
									<input type="text" class="form-control" name="iddocumento" id="iddocumento" value="{{ str_pad($documento->iddocumento, 4, '0', STR_PAD_LEFT) }}" readonly>
								</div>   
								<div class="form-group col-sm-6">
									<label for="docu_fecharegistro">2. Fecha de Registro</label>
									<input type="text" class="form-control" name="docu_fecharegistro" id="docu_fecharegistro" value="{{date('d/m/Y', strtotime($documento->docu_fecharegistro))}}" readonly>
								</div>  
								<div class="form-group col-sm-6">
									<label for="docu_idtipodocumento">3. Tipo de Documento</label>
									<input type="text" class="form-control" name="docu_idtipodocumento" id="docu_idtipodocumento" value="{{$documento->gettipodocumento->tdoc_descripcion}}" readonly>
								</div>   
								<div class="form-group col-sm-6">
									<label for="docu_folios">4. Folios</label>
									<input type="text" class="form-control" name="docu_folios" id="docu_folios" value="{{ str_pad($documento->docu_folios, 3, '0', STR_PAD_LEFT) }}" readonly>
								</div> 
								<div class="form-group col-sm-6">
									<label for="docu_iddependencia">5. Unidad Orgánica</label>
									<input class="form-control" name="docu_iddependencia" id="docu_iddependencia" value="{{$documento->getdependencia->depe_nombre}}" readonly>
								</div> 
								<div class="form-group col-sm-6">
									<label for="docu_firma">6. Firma</label>
									<input class="form-control" name="docu_firma" id="docu_firma" value="{{$documento->docu_firma}}" readonly>
								</div> 
								<div class="form-group col-sm-6">
									<label for="docu_cargo">7. Cargo</label>
									<input class="form-control" name="docu_cargo" id="docu_cargo" value="{{$documento->docu_cargo}}" readonly>
								</div>  
								<div class="form-group col-sm-6">
									<label for="docu_asunto">8. Asunto</label>
									<textarea class="form-control" name="docu_asunto" id="docu_asunto" rows="2" readonly>{{$documento->docu_asunto}}</textarea>
								</div>                            
							@elseif($documento->docu_idorigen == 2)
                            	<div class="form-group col-sm-6">
									<label for="iddocumento">1. Registro</label>
									<input type="text" class="form-control" name="iddocumento" id="iddocumento" value="{{ str_pad($documento->iddocumento, 4, '0', STR_PAD_LEFT) }}" readonly>
								</div>   
								<div class="form-group col-sm-6">
									<label for="docu_fecharegistro">2. Fecha de Registro</label>
									<input type="text" class="form-control" name="docu_fecharegistro" id="docu_fecharegistro" value="{{date('d/m/Y', strtotime($documento->docu_fecharegistro))}}" readonly>
								</div>  
								<div class="form-group col-sm-6">
									<label for="docu_idtipodocumento">3. Tipo de Documento</label>
									<input type="text" class="form-control" name="docu_idtipodocumento" id="docu_idtipodocumento" value="{{$documento->gettipodocumento->tdoc_descripcion}}" readonly>
								</div>   
								<div class="form-group col-sm-6">
									<label for="docu_folios">4. Folios</label>
									<input type="text" class="form-control" name="docu_folios" id="docu_folios" value="{{ str_pad($documento->docu_folios, 3, '0', STR_PAD_LEFT) }}" readonly>
								</div> 
								<div class="form-group col-sm-6">
									<label for="docu_iddependencia">5. Entidad Externa</label>
									<input class="form-control" name="docu_iddependencia" id="docu_iddependencia" value="{{$documento->getdependencia->depe_nombre}}" readonly>
								</div> 
								<div class="form-group col-sm-6">
									<label for="docu_firma">6. Nombre del Tramitante</label>
									<input class="form-control" name="docu_firma" id="docu_firma" value="{{$documento->docu_ext_nombre}}" readonly>
								</div> 
								<div class="form-group col-sm-6">
									<label for="docu_cargo">7. DNI</label>
									<input class="form-control" name="docu_cargo" id="docu_cargo" value="{{$documento->docu_ext_dni}}" readonly>
								</div>  
								<div class="form-group col-sm-6">
									<label for="docu_asunto">8. Asunto</label>
									<textarea class="form-control" name="docu_asunto" id="docu_asunto" rows="2" readonly>{{$documento->docu_asunto}}</textarea>
								</div>                            
                            @endif
                            <div class="form-group col-sm-4">
                                <label for="docu_archivo">9. Archivo</label>                                
                                <a href="{{asset('documentospdf').'/'.$documento->docu_archivo}}" class="btn btn-warning btn-flat btn-block" target="_blank"><i class="fa fa-file-text"></i> Ver Documento</a>
                            </div> 
                            
							<div class="col-xs-12"><div class="box-footer2">Detalles del Documento</div></div>
                            
                            <div class="col-md-12 table-responsive">  
							<table id="example1" class="table table-bordered table-mihover table-condensed">
								<thead style="background-color: #69C57B;">
									<tr>
										<th class="text-center">FECHA</th>
										<th class="text-center">OPERACIÓN</th>
										<th class="text-center">UNIDAD ORG.</th>
										<th class="text-center">USUARIO</th>
										<th class="text-center">UNIDAD DEST.</th>
										<th class="text-center">USUARIO D.</th>
										<th class="text-center">PROVEIDO</th>
									</tr>
								</thead>

								<tbody>
									@foreach($operacion AS $operar)
									<tr>
										<td class="text-center">{{date('d/m/Y', strtotime($operar->oper_fecha))}}</td>
										@if($operar->oper_idtope == 1)
											<td><span class="label label-primary" style="font-size: 10px;">REGISTRADO</span></td>
										@elseif($operar->oper_idtope == 2)
											<td><span class="label label-success" style="font-size: 10px;">DERIVADO</span></td>
										@elseif($operar->oper_idtope == 3)
											<td><span class="label label-warning" style="font-size: 10px;">ADJUNTADO</span></td>
										@elseif($operar->oper_idtope == 4)
											<td><span class="label label-danger" style="font-size: 10px;">ARCHIVADO</span></td>
										@elseif($operar->oper_idtope == 5)
											<td><span class="label label-info" style="font-size: 10px;">RECIBIDO</span></td>
										@elseif($operar->oper_idtope == 6)
											<td><span class="label label-default" style="font-size: 10px;">ATENDIDO</span></td>
										@elseif($operar->oper_idtope == 7)
											<td><span class="label label-primary" style="font-size: 10px;">DEVUELTO</span></td>
										@elseif($operar->oper_idtope == 8)
											<td><span class="label label-info" style="font-size: 10px;">NO DEFINIDO</span></td>
										@endif
										<td>{{$operar->getdependencia->depe_nombre}}</td>
										<td>{{$operar->getusuario->adm_nombre}}</td>
										@if($operar->oper_depeid_d != 0)
											<td>{{$operar->getdepdestino->depe_nombre}}</td>
										@else
											<td class="text-center"> - </td>
										@endif
										@if($operar->oper_usuid_d != 0)
											<td>{{$operar->getusudestino->adm_nombre}}</td>
										@else
											<td class="text-center"> - </td>
										@endif
										@if($operar->oper_idtope == 1)
											<td class="text-center"> - </td>
										@elseif($operar->oper_idtope == 2)
											<td>{{$operar->oper_detalledestino}}</td>
										@elseif($operar->oper_idtope == 3)
											@if($operar->oper_acciones != null)
											<td>{{$operar->oper_acciones}}</td>
											@else
											<td class="text-center"> - </td>
											@endif											
										@elseif($operar->oper_idtope == 4)
											@if($operar->oper_acciones != null)
											<td>{{$operar->oper_acciones}}</td>
											@else
											<td class="text-center"> - </td>
											@endif
										@elseif($operar->oper_idtope == 5)
											<td class="text-center"> - </td>
										@elseif($operar->oper_idtope == 6)
											<td class="text-center"> - </td>
										@elseif($operar->oper_idtope == 7)
											<td class="text-center"> - </td>
										@elseif($operar->oper_idtope == 8)
											<td class="text-center"> - </td>
										@endif										
									</tr>	
									@endforeach
								</tbody> 

								<tfoot style="background-color: #69C57B;">

								</tfoot>
							</table>
							</div>   
                            <div class="col-xs-12">
                                <div class="box-footer1">
                                    <a href="{{url('tramite/buscar')}}" class="btn btn-default"><i class="fa fa-exchange"></i> Volver</a>
                                    <!--<a href="{{url('tramite')}}">
										<button type="button" class="btn btn-danger pull-right"><i class="fa fa-sign-out"></i> Salir</button>
									</a>-->
                               		<a href="{{url('tramite/buscar/documentoprint/'.$documento->iddocumento)}}" class="btn btn-primary btn-flat pull-right" target="_blank"><i class="fa fa-print"></i> Imprimir</a>
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

<script type="text/javascript">
	$(document).ready(function(){
		
		$.ajaxSetup({
		  headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  }
		});

	});		
</script>
@stop