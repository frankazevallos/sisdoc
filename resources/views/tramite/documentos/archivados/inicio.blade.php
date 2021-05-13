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
		padding: 8px;
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
		background-color: #3BEAF3;
		border-color: #44B6BC;
	}
</style>
<div class="content" id="example">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        	<i class="fa fa-file-archive-o"> </i>
            Archivados
        </h1>
        <ol class="breadcrumb">
            <li><a class="text-green" href="{{url('tramite')}}"><i class="fa fa-dashboard"></i> Trámite</a></li>
            <li><a class="text-green" href="{{url('tramite/documentos/')}}">Documentos</a></li>
            <li class="active">Archivados</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
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
                        <li class="active"><a href="#">Buscar Documentos Archivados</a></li>
                        <li><a href="#">Archivados en el Día</a></li>
                        <li><a href="#">Archivados en el Mes</a></li>
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
                                        <th class="text-center">ARCHIVADOR</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                	@foreach($archivados AS $archivado)
                                	<tr onclick="marcar(this)">
                                		<td class="text-center">{{str_pad($archivado->oper_iddocumento, 4, '0', STR_PAD_LEFT)}}</td>
                                		<td>{{$archivado->getdocumento->docu_asunto}}</td>
                                		<td>{{$archivado->getdocumento->getdependencia->depe_nombre}}</td>
                                		<td class="text-center">{{$archivado->getdocumento->gettipodocumento->tdoc_descripcion}}</td>
                                		<td>{{$archivado->getarchivador->arch_nombre}}</td>
                                		<td class="text-center">
                                			<a class="btn btn-warning btn-xs" href="{{asset('documentospdf').'/'.$archivado->getdocumento->docu_archivo}}" title="Ver" target="_blank" style="color: #383638;"><i class="fa fa-eye"></i></a>
                                			
                                			{!! Form::open(array('url' => 'tramite/documentos/archivados/devolver', 'method' =>'POST', 'class' =>'form-group')) !!} {{csrf_field()}}
                                                <input type="hidden" name="iddocumento" id="iddocumento" class="form-control" value="{{$archivado->oper_iddocumento}}">
                                                <input type="hidden" name="idoperacion" id="idoperacion" class="form-control" value="{{$archivado->idoperacion}}">
                                                <button type="submit" class="btn btn-success btn-xs del" title="Devolver en Recibidos"><i class="fa fa-refresh"></i></button>
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
            if (!confirm("¿Realmente desea DEVOLVER este Documento al estado RECIBIDO?"))
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

</script>
@stop