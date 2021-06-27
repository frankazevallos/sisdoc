<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TRÁMITE | Documentario</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('plugins/ionicons-2.0.1/css/ionicons.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/colorpicker/bootstrap-colorpicker.min.css') }}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('js/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="{{ asset('js/jQuery.print.js') }}"></script>
</head>
<style>
    .nav-tabs-custom>.nav-tabs>li.active {
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

</style>

<body class="hold-transition fixed skin-green sidebar-mini">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{ url('tramite') }}" class="logo">
            <span class="logo-lg" style="color: #FFFFF5;"><i class="fa fa-globe"> </i> SISDATA</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">

            <div class="collapse navbar-collapse pull-left"
                style="padding-top: 10px; padding-left: 160px; font-size:20px; color: #FFFFF5;">
                <i><b>Municipalidad Distrital de Amarilis - Hu&aacute;nuco </b></i>
            </div>

            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <!-- search form -->
                    <!-- User Account: style can be found in dropdown.less -->

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"> </i>
                            <span class="hidden-xs"> Admin <i class="fa fa-sort-desc"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <form role="form" method="POST" action="{{ url('ingresar') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group has-feedback">
                                        <input type="number" onKeyPress="if(this.value.length==8) return false;"
                                            class="form-control" placeholder="Usuario" name="email" required="">
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <input type="password" class="form-control" placeholder="Contraseña"
                                            name="password" maxlength="30" required="">
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar
                                                Sesion</button>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-top: 3px;">
                                        <div class="col-xs-12 text-center">
                                            <a style="color: blue" href="{{ url('olvidar') }}">¿Olvid&oacute; su
                                                Usuario o Contrase&ntilde;a?</a>
                                        </div>
                                    </div>

                                </form>


                            </li>
                        </ul>
                    </li>

                    <!--<li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>-->
                </ul>
            </div>
        </nav>
    </header>
    {{-- <div class="content" style="background-image: url({{asset('dist/img/bodyfond.jpg')}}); width: 100%; height: 100%; position: absolute;"> --}}
    <div class="content" style="background-colo: #f3f1f1; width: 100%; height: 100%; position: absolute;">
        <br><br>
        <!-- Content Header (Page header) -->
        <section
            class="content-header col-xs-10 col-sm-10 col-md-10 col-lg-10 col-md-offset-1 col-sm-offset-1 col-lg-offset-1">
            <h1>
                <i class="fa fa-file-text"> </i>
                Documento
            </h1>
            <ol class="breadcrumb">
                <li><a class="text-green"><i class="fa fa-dashboard"></i> Trámite</a></li>
                <li class="active">Documento</li>
            </ol><br>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-md-offset-1 col-sm-offset-1 col-lg-offset-1">
                    <div class="nav-tabs-custom">
                        <!--<ul class="nav nav-tabs">
         <li><a href="{{ url('tramite/documentos/enproceso') }}">Buscar Documentos En Proceso</a></li>
         <li class="active"><a href="#buscar" data-toggle="tab">Derivar Documento</a></li>
        </ul>-->
                        <!-- general form elements -->
                        <div class="tab-content">
                            <div class="chart tab-pane active" id="buscar">
                                <!-- /.box-header -->
                                @if ($documento->docu_idorigen == 1)
                                    <div class="form-group col-sm-6">
                                        <label for="iddocumento">Registro</label>
                                        <input type="text" class="form-control" name="iddocumento" id="iddocumento"
                                            value="{{ str_pad($documento->iddocumento, 4, '0', STR_PAD_LEFT) }}"
                                            readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="docu_fecharegistro">Fecha de Registro</label>
                                        <input type="text" class="form-control" name="docu_fecharegistro"
                                            id="docu_fecharegistro"
                                            value="{{ date('d/m/Y', strtotime($documento->docu_fecharegistro)) }}"
                                            readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="docu_idtipodocumento">Tipo de Documento</label>
                                        <input type="text" class="form-control" name="docu_idtipodocumento"
                                            id="docu_idtipodocumento"
                                            value="{{ $documento->gettipodocumento->tdoc_descripcion }}" readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="docu_folios">Folios</label>
                                        <input type="text" class="form-control" name="docu_folios" id="docu_folios"
                                            value="{{ str_pad($documento->docu_folios, 3, '0', STR_PAD_LEFT) }}"
                                            readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="docu_iddependencia">Unidad Orgánica</label>
                                        <input class="form-control" name="docu_iddependencia" id="docu_iddependencia"
                                            value="{{ $documento->getdependencia->depe_nombre }}" readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="docu_firma">Firma</label>
                                        <input class="form-control" name="docu_firma" id="docu_firma"
                                            value="{{ $documento->docu_firma }}" readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="docu_cargo">Cargo</label>
                                        <input class="form-control" name="docu_cargo" id="docu_cargo"
                                            value="{{ $documento->docu_cargo }}" readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="docu_asunto">Asunto</label>
                                        <textarea class="form-control" name="docu_asunto" id="docu_asunto" rows="2"
                                            readonly>{{ $documento->docu_asunto }}</textarea>
                                    </div>
                                @elseif($documento->docu_idorigen == 2)
                                    <div class="form-group col-sm-6">
                                        <label for="iddocumento">Registro</label>
                                        <input type="text" class="form-control" name="iddocumento" id="iddocumento"
                                            value="{{ str_pad($documento->iddocumento, 4, '0', STR_PAD_LEFT) }}"
                                            readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="docu_fecharegistro">Fecha de Registro</label>
                                        <input type="text" class="form-control" name="docu_fecharegistro"
                                            id="docu_fecharegistro"
                                            value="{{ date('d/m/Y', strtotime($documento->docu_fecharegistro)) }}"
                                            readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="docu_idtipodocumento">Tipo de Documento</label>
                                        <input type="text" class="form-control" name="docu_idtipodocumento"
                                            id="docu_idtipodocumento"
                                            value="{{ $documento->gettipodocumento->tdoc_descripcion }}" readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="docu_folios">Folios</label>
                                        <input type="text" class="form-control" name="docu_folios" id="docu_folios"
                                            value="{{ str_pad($documento->docu_folios, 3, '0', STR_PAD_LEFT) }}"
                                            readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="docu_iddependencia">Entidad Externa</label>
                                        <input class="form-control" name="docu_iddependencia" id="docu_iddependencia"
                                            value="{{ $documento->getdependencia->depe_nombre }}" readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="docu_firma">Nombre del Tramitante</label>
                                        <input class="form-control" name="docu_firma" id="docu_firma"
                                            value="{{ $documento->docu_ext_nombre }}" readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="docu_cargo">DNI</label>
                                        <input class="form-control" name="docu_cargo" id="docu_cargo"
                                            value="{{ $documento->docu_ext_dni }}" readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="docu_asunto">Asunto</label>
                                        <textarea class="form-control" name="docu_asunto" id="docu_asunto" rows="2"
                                            readonly>{{ $documento->docu_asunto }}</textarea>
                                    </div>
                                @endif
                                <div class="form-group col-sm-4">
                                    <label for="docu_archivo">Archivo</label>
                                    <a href="{{ asset('documentospdf') . '/' . $documento->docu_archivo }}"
                                        class="btn btn-warning btn-flat btn-block" target="_blank"><i
                                            class="fa fa-file-text"></i> Ver Documento</a>
                                </div>

                                <div class="col-xs-12">
                                    <div class="box-footer2">Detalles del Documento</div>
                                </div>

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
                                            @foreach ($operacion as $operar)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ date('d/m/Y', strtotime($operar->oper_fecha)) }}</td>
                                                    @if ($operar->oper_idtope == 1)
                                                        <td><span class="label label-primary"
                                                                style="font-size: 10px;">REGISTRADO</span></td>
                                                    @elseif($operar->oper_idtope == 2)
                                                        <td><span class="label label-success"
                                                                style="font-size: 10px;">DERIVADO</span></td>
                                                    @elseif($operar->oper_idtope == 3)
                                                        <td><span class="label label-warning"
                                                                style="font-size: 10px;">ADJUNTADO</span></td>
                                                    @elseif($operar->oper_idtope == 4)
                                                        <td><span class="label label-danger"
                                                                style="font-size: 10px;">ARCHIVADO</span></td>
                                                    @elseif($operar->oper_idtope == 5)
                                                        <td><span class="label label-info"
                                                                style="font-size: 10px;">RECIBIDO</span></td>
                                                    @elseif($operar->oper_idtope == 6)
                                                        <td><span class="label label-default"
                                                                style="font-size: 10px;">ATENDIDO</span></td>
                                                    @elseif($operar->oper_idtope == 7)
                                                        <td><span class="label label-primary"
                                                                style="font-size: 10px;">DEVUELTO</span></td>
                                                    @elseif($operar->oper_idtope == 8)
                                                        <td><span class="label label-info" style="font-size: 10px;">NO
                                                                DEFINIDO</span></td>
                                                    @endif
                                                    <td>{{ $operar->getdependencia->depe_nombre }}</td>
                                                    <td>{{ $operar->getusuario->adm_nombre }}</td>
                                                    @if ($operar->oper_depeid_d != 0)
                                                        <td>{{ $operar->getdepdestino->depe_nombre }}</td>
                                                    @else
                                                        <td class="text-center"> - </td>
                                                    @endif
                                                    @if ($operar->oper_usuid_d != 0)
                                                        <td>{{ $operar->getusudestino->adm_nombre }}</td>
                                                    @else
                                                        <td class="text-center"> - </td>
                                                    @endif
                                                    @if ($operar->oper_idtope == 1)
                                                        <td class="text-center"> - </td>
                                                    @elseif($operar->oper_idtope == 2)
                                                        <td>{{ $operar->oper_detalledestino }}</td>
                                                    @elseif($operar->oper_idtope == 3)
                                                        @if ($operar->oper_acciones != null)
                                                            <td>{{ $operar->oper_acciones }}</td>
                                                        @else
                                                            <td class="text-center"> - </td>
                                                        @endif
                                                    @elseif($operar->oper_idtope == 4)
                                                        @if ($operar->oper_acciones != null)
                                                            <td>{{ $operar->oper_acciones }}</td>
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
                                        <a href="{{ url('externo') }}" class="btn btn-danger"><i
                                                class="fa fa-sign-out"></i> Salir</a>
                                        <a href="{{ url('externo/documentoprint/' . $documento->iddocumento) }}"
                                            class="btn btn-primary btn-flat pull-right" target="_blank"><i
                                                class="fa fa-print"></i> Imprimir</a>
                                        <hr width="0px">
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


    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b></b> |
        </div>
        <strong>Municipalidad Distrtal de Amarilis <a href="{{ url('tramite') }}"> SISDATA | 1.0</a>.</strong> Sistema
        de Gesti&oacute;n Documental.
    </footer>

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>



</body>

</html>
