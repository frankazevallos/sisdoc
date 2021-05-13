@extends('layouts.admin') @section('contenido') {!! Form::open() !!} {{csrf_field()}}
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
            Documentos Encontrados
        </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Trámite</a></li>
        <li><a href="{{url('tramite/buscar')}}">Buscar</a></li>
        <li class="active">Mostrar Doc.</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-sm-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Documentos</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead style="background-color: #d8eaf3;">
                                <tr>
                                    <th>CODIGO</th>
                                    <th>NOMBRE</th>
                                    <th>ABREVIATURA</th>
                                    <th>FECHA REG.</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tipoDocs as $tipoDoc)
                                <tr>
                                    <td>{{ $tipoDoc->id }}</td>
                                    <td>{{ $tipoDoc->nombre }}</td>
                                    <td>{{ $tipoDoc->abreviar }}</td>
                                    <td>{{ $tipoDoc->fecha }}</td>
                                </tr>                                
                                @endforeach
                            </tbody>
                            <tfoot style="background-color: #d8eaf3;">
                                <tr>
                                    <th>CODIGO <i class="fa fa-eject pull-right"></i></th>
                                    <th>NOMBRE <i class="fa fa-eject pull-right"></i></th>
                                    <th>ABREVIATURA <i class="fa fa-eject pull-right"></i></th>
                                    <th>FECHA REG. <i class="fa fa-eject pull-right"></i></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="modal-footer">
                        <a href="{{url('tramite/buscar')}}"><button type="button" class="btn btn-primary pull-left"><i class="fa fa-exchange"></i> Volver</button></a>
                        <a href="{{url('/')}}"><button type="button" class="btn btn-danger"><i class="fa fa-sign-out"></i> Salir</button></a>                        
                    </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
{!! Form::close() !!} 

<!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable({
            "language":
            {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
      });
    </script>
@stop