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
            Tipos de Prioridades
        </h1>
        <ol class="breadcrumb">
            <li><a class="text-green" href="{{url('tramite')}}"><i class="fa fa-dashboard"></i> Trámite</a></li>
            <li><a class="text-green" href="{{url('tramite/catalogos/')}}">Catálogos</a></li>
            <li class="active">Tipos Prioridades</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @if(Session::has('msg'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>	<i class="glyphicon glyphicon-ok-circle"></i> ATENCIÓN!</h4> {{ Session::get('msg') }}
        </div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>	<i class="glyphicon glyphicon-remove-circle"></i> ATENCIÓN!</h4> {{ Session::get('error') }}
        </div>
        @endif
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">                        
                        <li class="active"><a href="#">Buscar Tipo de Prioridad</a></li>
                        <li><a href="{{url('tramite/catalogos/tipoprioridad/create')}}">Nuevo Tipo de Prioridad</a></li>
                    </ul>
                    <!-- general form elements -->
                    <div class="tab-content">
                    <div class="chart tab-pane active" id="buscar">
                        <!-- /.box-header -->
                        <table id="example1" class="table table-bordered table-mihover">
                            <thead style="background-color: #69C57B;">
                                <tr>
                                    <th class="text-center">CÓDIGO</th>
									<th class="text-center">NOMBRE</th>
									<th class="text-center">ABREVIATURA</th>
									<th class="text-center">Acciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach($prioridades as $prioridad)
								<tr onclick="marcar(this)">
									<td class="text-center">{{ $prioridad->id }}</td>
                                    <td>{{ $prioridad->nombre }}</td>
                                    <td>{{ $prioridad->abreviado }}</td>
                                    <td class="text-center">
                                        <div class="timeline-footer">
                                            {!! Form::open([ 'method' => 'DELETE', 'action' => ['TiposPrioridadesController@destroy', $prioridad->id]]) !!} 
                                            {{csrf_field()}}
                                                <a class="btn btn-primary btn-xs" href="{{url('tramite/catalogos/tipoprioridad/'.$prioridad->id.'/edit')}}" title="Editar"><i class="fa fa-edit"></i></a> |
                                                <button type="submit" class="btn btn-danger btn-xs del" title="Eliminar" style="padding-left:7px; padding-right:7px;"><i class="fa fa-trash-o"></i></button>
                                            {!! Form::close() !!}
                                        </div>
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
                            <a href="{{url('tramite/catalogos')}}">
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
	
    $(document).ready(function() {
        $(".del").click(function(event) {
            if (!confirm("¿ Realmente desea Eliminar la Tipo de Prioridad Seleccionado ?"))
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
    });
	
    
</script>
@stop
