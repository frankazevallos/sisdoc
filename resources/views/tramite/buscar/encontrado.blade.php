@extends('layouts.admin') @section('contenido') {{csrf_field()}}
<!-- Content Wrapper. Contains page content -->
<style>
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
	
    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
        z-index: 2;
        color: #fff;
        cursor: default;
        background-color: #4FA961;
        border-color: #4FA961;
    }	
	
	.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
		font-size: 11px;
	}
</style>
<div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        	<i class="ion-android-options"> </i>
            Documento(s) Encontrado(s)
        </h1>
        <ol class="breadcrumb">
            <li><a class="text-green" href="{{url('tramite')}}"><i class="fa fa-dashboard"></i> Trámite</a></li>
            <li class="active">Buscar Documento</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">                        
                        <li class="active"><a href="#">Buscar Documentos</a></li>
                    </ul>
                    <!-- general form elements -->
                    <div class="tab-content">
                    <div class="chart tab-pane active" id="buscar">
                        <!-- /.box-header -->
                        <table id="example1" class="table table-bordered table-mihover">
                            <thead style="background-color: #69C57B;">
                                <tr>
                                    <th class="text-center c1">CÓD</th>
									<th class="text-center c2">F. REGISTRO</th>
									<th class="text-center">TIPO</th>
									<th class="text-center">OFICINA.</th>
									<th class="text-center c5">ASUNTO</th>
									<th class="text-center c6">VER T.</th>
								</tr>
							</thead>
							
							<tbody>
								@foreach($documentos AS $documento)
									<tr onclick="marcar(this)">
										<td class="text-center">{{ str_pad($documento->iddocumento, 4, "0", STR_PAD_LEFT) }}</td>
										<td class="text-center">{{ date('d/m/Y', strtotime($documento->docu_fecharegistro))}}</td>
										<td>{{$documento->gettipodocumento->tdoc_descripcion}}</td>
										<td>{{$documento->getdependencia->depe_nombre}}</td>
										<td>{{$documento->docu_asunto}}</td>
										<td class="text-center">
											{!! Form::open(array('url' => 'tramite/buscar/documento', 'method' =>'POST')) !!}
                                            {{csrf_field()}}
                                                <input type="hidden" name="buscar_doc" id="buscar_doc" class="form-control" value="{{$documento->iddocumento}}">
                                                <button type="submit" class="btn btn-default btn-xs" title="Ver Trámite" style="padding-left:7px; padding-right:7px;"><i class="fa fa-eye"></i></button>
                                            {!! Form::close() !!}
										</td>
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
                        <div class="box-footer1">
                            <a href="{{url('tramite/buscar')}}">
                                <button type="button" class="btn btn-default pull-left"><i class="fa fa-exchange"></i> Volver</button>
                            </a>
                            <a href="{{url('tramite')}}">
                                <button type="button" class="btn btn-danger pull-right"><i class="fa fa-sign-out"></i> Salir</button>
                            </a>
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
	  obj.style.background = (obj.style.background=='') ? '#EEC753' : '';
	}	  
    
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
		$(".c2").css("width","70px");
		$(".c5").css("width","250px");
		$(".c6").css("width","50px");
    });
	
    
</script>
@stop
