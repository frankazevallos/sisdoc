@extends('layouts.admin') @section('contenido') {{csrf_field()}}
<!-- Content Wrapper. Contains page content -->
<div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Catálogos - Forma de Recepción
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Trámite</a></li>
            <li><a href="{{url('tramite/catalogos/')}}">Catálogos</a></li>
            <li class="active">Buscar Forma Recepción</li>
        </ol>
    </section>    

    <!-- Main content -->
    <section class="content">
    @if(Session::has('msg'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>	<i class="icon fa fa-check"></i> ATENCIÓN!</h4>
            {{ Session::get('msg') }}
        </div>
    @endif
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#">Buscar Forma de Recepción</a></li>
                        <li><a href="{{url('tramite/catalogos/formarecepcion/create')}}">Nueva Forma de Recepción</a></li>
                    </ul>
                    <!-- general form elements -->
                    <div class="tab-content">
                            <!-- /.box-header -->
                            <table id="example1" class="table table-bordered table-hover">
                                <thead style="background-color: #d8eaf3;">
                                    <tr>
                                        <th>CÓDIGO</th>
                                        <th>DESCRIPCIÓN</th>
                                        <th>ABREVIADO</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recepcions as $recepcion)
                                    <tr>
                                        <td>{{ $recepcion->id }}</td>
                                        <td>{{ $recepcion->nombre }}</td>
                                        <td>{{ $recepcion->abreviado }}</td>
                                        <td>                                            
                                            <div class="timeline-footer">
                                                {!! Form::open([ 'method'  => 'DELETE', 'route' =>                 ['tramite.catalogos.formarecepcion.destroy', $recepcion->id]]) !!}
                                                {{csrf_field()}}
                                                    <a class="btn btn-info btn-xs" href="{{url('tramite/catalogos/formarecepcion/'.$recepcion->id.'/edit')}}"><i class="fa fa-edit">  {{ $recepcion->id }}</i></a>
                                                    |                                                
                                                    <button type="submit" class="btn btn-danger btn-xs del"><i class="fa fa-trash-o"></i> {{ $recepcion->id }}</button>
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot style="background-color: #d8eaf3;">
                                    <tr>
                                        <th>CÓDIGO <i class="fa fa-caret-up pull-right"></i></th>
                                        <th>DESCRIPCIÓN <i class="fa fa-caret-up pull-right"></i></th>
                                        <th>ABREVIADO <i class="fa fa-caret-up pull-right"></i></th>
                                        <th>Acciones<i class="fa fa-caret-up pull-right"></i></th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="box-footer">
                                <a href="{{url('tramite/catalogos')}}">
                                    <button type="button" class="btn btn-default pull-left"><i class="fa fa-exchange"></i> Volver</button>
                                </a>
                                <a href="{{url('/')}}">
                                    <button type="button" class="btn btn-danger pull-right"><i class="fa fa-sign-out"></i> Salir</button>
                                </a>
                            </div>
                        <!-- /.box -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- page script -->
<script>
    $(document).ready(function() {
        $(".del").click(function(event) {
            if (!confirm("¿Realmente desea Eliminar?"))
                event.preventDefault();
        })
    });
    
    $(function() {
        $("#example1").DataTable({
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

        $('.mailbox-messages input[type="checkbox"]').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue'
        });
    });
</script>
@stop