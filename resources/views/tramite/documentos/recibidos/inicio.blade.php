@extends('layouts.admin') @section('contenido') {{csrf_field()}}
<!-- Content Wrapper. Contains page content -->
<style>
	.modal-header {		
		background-color: #008d4c;		
		color: #fff !important;
		padding: 9px;
		border-bottom: 1px solid #f4f4f4;
	}
	
	.modal-footer {
		padding: 5px;
		text-align: right;
		border-top: 1px solid #f4f4f4;
	}
	
	.modal {
		padding-top: 80px;
		background: rgba(0,0,0,0.8);
	}
	
    .nav-tabs-custom > .nav-tabs > li.active {
        border-top-color: #37BC89;
    }
    
    .table-mihover>tbody>tr:hover {
        background-color: #FBEAB6
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
    
    .pagination>.active>a,
    .pagination>.active>a:focus,
    .pagination>.active>a:hover,
    .pagination>.active>span,
    .pagination>.active>span:focus,
    .pagination>.active>span:hover {
        z-index: 2;
        color: #fff;
        cursor: default;
        background-color: #4FA961;
        border-color: #4FA961;
    }
    
    .table>thead>tr>th,
    .table>tbody>tr>th,
    .table>tfoot>tr>th,
    .table>thead>tr>td,
    .table>tbody>tr>td,
    .table>tfoot>tr>td {
        font-size: 11px;
    }
    
    .ver {
        font-size: 13px;
    }
	
	.msj {
		font-size: 30px;
	}
	
	.btn-primary2 {
		color: #383638;
		background-color: #93CDDD;
		border-color: ##81B7C6;
	}
</style>
<div class="content" id="example">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        	<i class="fa fa-file-text"> </i>
            Recibidos
        </h1>
        <ol class="breadcrumb">
            <li><a class="text-green" href="{{url('tramite')}}"><i class="fa fa-dashboard"></i> Trámite</a></li>
            <li><a class="text-green" href="{{url('tramite/documentos/')}}">Documentos</a></li>
            <li class="active">Recibidos</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	@if(Session::has('derivar'))
    	<script>
			$(document).ready(function(){
				$('#moal').trigger('click');
			});
		</script>
		<div style="display:none;">
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default" id="moal">modal</button>
		</div>	
		<div class="modal fade" id="modal-default">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>-->
						<h4 class="modal-title"><i class="fa fa-check-square-o"> </i> El Documento fue Guardado Satisfactoriamente. ¿Que Desea Hacer?</h4>
					</div>
					<div class="modal-body">
						<table>
                        	<thead>
                        		<tr>
                        			<td style="padding: 3px;">
                        				<label for="">Cód. Documento: </label>
                        			</td>
                        			<td style="padding: 3px;">
                        				<input type="text" class="form-control input-sm" id="iddocumento" name="iddocumento" value="{{ Session::get('derivar')->idoperacion }}" readonly>
                        			</td>
                        			<td style="padding: 5px; padding-left: 80px;" class="pull-left">
                        				<a href="{{url('tramite/documentos/recibidos/derivar/'.Session::get('derivar')->idoperacion)}}">
										<button type="button" class="btn btn-success btn-sm"><i class="fa fa-external-link-square"></i> Derivar</button></a>
                        			</td>
                        		</tr>
                        		<tr>
                        			<td style="padding: 3px;">
                        				<label for="">Cód. Expediente: </label>
                        			</td>
                        			<td style="padding: 3px;">
                        				<input type="text" class="form-control input-sm" id="idoperacion" name="idoperacion" value="{{ Session::get('derivar')->oper_iddocumento }}" readonly>
                        			</td>
                        			<td style="padding: 5px; padding-left: 80px;" class="pull-left">   
										<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal"><i class="fa fa-search" id="ocultar"></i> Buscar En Proceso</button>
                        			</td>
                        		</tr>
                        	</thead>
                        </table>
					</div>
					<!--<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-search"></i>Buscar En Proceso</button>
						<button type="button" class="btn btn-primary"><i class="fa fa-external-link-square"></i> Derivar</button>
					</div>-->
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
        @endif 
        
        @if(Session::has('msg'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>	<i class="glyphicon glyphicon-ok-circle"></i> ATENCIÓN!</h4> {{ Session::get('msg') }}
        </div>
        @endif @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>	<i class="glyphicon glyphicon-remove-circle"></i> ATENCIÓN!</h4> {{ Session::get('error') }}
        </div>
        @endif
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#">Buscar Documentos Recibidos</a></li>
                        <li><a href="#">Recibidos en el Día</a></li>
                        <li><a href="#">Recibidos en el Mes</a></li>
                    </ul>
                    <!-- general form elements -->
                    <div class="tab-content">
                        <div class="chart tab-pane active" id="buscar">
                            <!-- /.box-header -->
                            <table id="example1" class="table table-bordered table-mihover table-condensed">
                                <thead style="background-color: #69C57B;">
                                    <tr>
                                        <th class="text-center c1">N° DOC.</th>
                                        <th class="text-center c2">ASUNTO</th>
                                        <th class="text-center">OFICINA</th>
                                        <th class="text-center">TIPO</th>
                                        <th class="text-center">ESTADO</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($operaciones AS $operacion)
                                    <tr onclick="marcar(this)">
                                        @if($operacion->getdocumento->docu_idprioridad == 1)
											<td class="text-center">
												<i class="fa fa-envelope pull-left" style="color: green; font-size: 17px;"></i>
												{{ str_pad($operacion->getdocumento->iddocumento, 4, "0", STR_PAD_LEFT) }}
											</td>
                                        @elseif($operacion->getdocumento->docu_idprioridad == 2)
											<td class="text-center">
												<i class="fa fa-envelope pull-left" style="color: orange; font-size: 17px;"></i>
												{{ str_pad($operacion->getdocumento->iddocumento, 4, "0", STR_PAD_LEFT) }}
											</td>
                                        @elseif($operacion->getdocumento->docu_idprioridad == 3)
                                            <td class="text-center">
                                                <i class="fa fa-envelope pull-left" style="color: red; font-size: 17px;"></i>
                                                {{ str_pad($operacion->getdocumento->iddocumento, 4, "0", STR_PAD_LEFT) }}
                                            </td>
                                        @endif
                                        <td>{{$operacion->getdocumento->docu_asunto}}</td>
                                        <td>{{$operacion->getdocumento->getdependencia->depe_nombre}}</td>
                                        <td>{{$operacion->getdocumento->gettipodocumento->tdoc_descripcion}}</td>
                                        @if($operacion->oper_idtope == 1)
                                        	<td class="text-center">
                                        		<span class="label label-primary" style="font-size: 10px;">REGISTRADO</span>
                                        	</td>
                                        @elseif($operacion->oper_idtope == 2)
                                        	<td class="text-center">
                                        		<span class="label label-success" style="font-size: 10px;">DERIVADO</span>
                                        	</td> 
                                        @elseif($operacion->oper_idtope == 5)
                                            <td class="text-center">
                                                <span class="label label-info" style="font-size: 10px;">RECIBIDO</span>
                                            </td>
                                        @elseif($operacion->oper_idtope == 7)
                                            <td class="text-center">
                                                <span class="label label-primary" style="font-size: 10px;">DEVUELTO</span>
                                            </td>  
                                        @elseif($operacion->oper_idtope == 3)
                                        	<td class="text-center">
                                        		<span class="label label-warning" style="font-size: 10px;">ADJUNTADO</span>
                                        	</td>                                        
                                        @endif
                                          
                                        <td class="text-center">
                                            <!--<a class="ver pull-right" href="{{asset('documentospdf').'/'.$operacion->getdocumento->docu_archivo}}" title="Ver" target="_blank"><i class="fa fa-eye" style="color: black;"></i></a>-->
                                            <a class="btn btn-primary2 btn-xs" href="{{asset('documentospdf').'/'.$operacion->getdocumento->docu_archivo}}" title="Ver Documento" target="_blank"><i class="fa fa-eye"></i></a>
                                            
                                            <!-- Atender -->
                                            <a class="btn btn-primary btn-xs" title="Atender" data-toggle="modal" data-target="#{{$operacion->idoperacion}}"><i class="fa fa-check-square-o"></i></a>
                                            
                                            
                                            <!-- Derivar -->
                                            <a class="btn btn-success btn-xs" href="{{url('tramite/documentos/recibidos/derivar/'.$operacion->idoperacion)}}" title="Derivar"><i class="fa fa-external-link-square"></i></a>
                                            
                                            {!! Form::open(array('url' => 'tramite/documentos/recibidos/eliminarderivado', 'method' =>'POST', 'class' =>'form-group')) !!} {{csrf_field()}}
                                                <input type="hidden" name="iddocumento" id="iddocumento" class="form-control" value="{{$operacion->oper_iddocumento}}">
                                                <input type="hidden" name="idoperacion" id="idoperacion" class="form-control" value="{{$operacion->idoperacion}}">
                                                <button type="submit" class="btn btn-danger btn-xs del" title="Eliminar Derivación"><i class="fa fa-close"></i></button>
                                            {!! Form::close() !!}         
                                        </td>
                                        <!-- Modal para Atender el Documento -->
                                        <div class="modal fade" id="{{$operacion->idoperacion}}">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Atender Documento</h4>
                                              </div>
                                              {!! Form::open(array('url' => 'tramite/documentos/recibidos/atender', 'method' =>'POST')) !!} {{csrf_field()}}
                                              <div class="modal-body">
                                                
                                                <div class="form-group col-sm-6">
                                                    <label for="iddocumento">Registro</label>
                                                    <input type="text" class="form-control" name="iddocumento" id="iddocumento" value="{{ str_pad($operacion->getdocumento->iddocumento, 4, '0', STR_PAD_LEFT) }}" readonly>
                                                </div>  
                                                <div class="form-group col-sm-6">
                                                    <label for="idoperacion">Operacion</label>
                                                    <input type="text" class="form-control" name="idoperacion" id="idoperacion" value="{{ str_pad($operacion->idoperacion, 4, '0', STR_PAD_LEFT) }}" readonly>
                                                </div>  
                                                <div class="form-group col-sm-12">
                                                    <label for="oper_fecha">Fecha de Registro</label>
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="date" class="form-control" id="oper_fecha" name="oper_fecha" value="{{date('Y-m-d')}}">
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <label for="oper_acciones">Observaciones</label>
                                                    <input type="text" class="form-control" name="oper_acciones" id="oper_acciones" placeholder="Ingrese una Observacion al Documento a Atender">
                                                </div>
                                                <br><br><br><br><br><br><br>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-exchange"></i> Salir</button>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Atender</button>
                                              </div>
                                              {!! Form::close() !!}
                                            </div>
                                          </div>
                                        </div>
                                    </tr>
                                    @endforeach
                                </tbody>

                                <tfoot style="background-color: #69C57B;">
                                    <!--<tr>
                                    <th>NOMBRE <i class="fa fa-caret-up pull-right"></i></th>
                                    <th>APELLIDO <i class="fa fa-caret-up pull-right"></i></th>
                                    <th>DNI <i class="fa fa-caret-up pull-right"></i></th>
                                    <th>OFICINA <i class="fa fa-caret-up pull-right"></i></th>
                                    <th>CARGO <i class="fa fa-caret-up pull-right"></i></th>
                                    <th>Acciones<i class="fa fa-caret-up pull-right"></i></th>
                                </tr>-->
                                </tfoot>
                            </table>
                            <div class="col-xs-12">
                                <div class="box-footer1">
                                    <a href="{{url('tramite/documentos')}}">
                                        <button type="button" class="btn btn-default pull-left"><i class="fa fa-exchange"></i> Volver</button>
                                    </a>                                    
                                    <a href="{{url('tramite')}}">
                                        <button type="button" class="btn btn-danger pull-right"><i class="fa fa-sign-out"></i> Salir</button>
                                    </a>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- page script -->
<script>    
	
    function marcar(obj) {
        obj.style.background = (obj.style.background == '') ? '#EEC753' : '';
    }

    $(document).ready(function() {
        $(".del").click(function(event) {
            if (!confirm("¿ Realmente desea Eliminar el Derivado del Documento Seleccionado ?"))
                event.preventDefault();
        })
    });

    $(function() {
        $("#example1").DataTable({
            "scrollX": true,
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
		$(".c1").css("width","50px");
		$(".c2").css("width","250px");
    });

    $('#example').on('click', '.verpdf', function(e) {
        e.preventDefault();
        rute = '{{url('liquidacionprint / % s ')}}';
        window.open(rute.replace(/%s/g, $(this).data('id')));
    });
</script>
@stop