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

</style>

<body class="hold-transition fixed skin-green sidebar-mini">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{ url('externo') }}" class="logo">
            <span class="logo-lg" style="color: #FFFFF5;"><i class="fa fa-globe"> </i> SISDATA</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">

            <div class="collapse navbar-collapse pull-left"
                style="padding-top: 10px; padding-left: 160px; font-size:20px; color: #FFFFF5;">
                <i><b>Municipalidad Distrital de Amarilis</b></i>
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
                                            <a style="color: blue" href="{{ url('olvidar') }}">¿Olvidó su Usuario o
                                                Contraseña?</a>
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
    {{-- <div class="content" style="background-image: url({{ asset('dist/img/bodyfond.jpg') }}); width: 100%; height: 100%; position: absolute;"> --}}
        <div class="content" style="background-color: #f3f1f1; width: 100%; height: 100%; position: absolute;">
        <br><br>
        <!-- Content Header (Page header) -->
        <section
            class="content-header col-xs-10 col-sm-10 col-md-10 col-lg-10 col-md-offset-1 col-sm-offset-1 col-lg-offset-1">
            <h1>
                <i class="fa fa-search"> </i>
                Buscar Documento
            </h1>
            <ol class="breadcrumb">
                <li><a class="text-green"><i class="fa fa-dashboard"></i> Trámite</a></li>
                <li class="active">Buscar Documento</li>
            </ol><br>
        </section>
        @if (Session::has('exter'))
            <div
                class="content-header col-xs-10 col-sm-10 col-md-10 col-lg-10 col-md-offset-1 col-sm-offset-1 col-lg-offset-1">
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4> <i class="glyphicon glyphicon-ok-circle"></i> ATENCIÓN!</h4> {{ Session::get('exter') }}
                </div>
            </div>
        @endif
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-md-offset-1 col-sm-offset-1 col-lg-offset-1">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#buscar" data-toggle="tab">Buscar Documentos</a></li>
                        </ul>
                        {!! Form::open(['url' => 'externo/expedientes', 'method' => 'POST', 'name' => 'formu']) !!} {{ csrf_field() }}
                        <!-- general form elements -->
                        <div class="tab-content">
                            <div class="chart tab-pane active" id="buscar">
                                <!-- /.box-header -->
                                <div class="form-group col-sm-6">
                                    <label for="iddocumento">N° de Registro</label>
                                    <input type="text" class="form-control" id="iddocumento" name="iddocumento"
                                        placeholder="Ingrese el N° de Registro." required>

                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="iddocumento"></label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="btn-interno" id="btn-interno"
                                                onClick="Cambia(this)" value="1"> Detalles
                                        </label>
                                    </div>

                                </div>

                                <div id="info-mostrar" style="display: none;">
                                    <div class="form-group col-sm-6">
                                        <label for="docu_fecharegistro">Fecha de Registro</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" class="form-control" id="docu_fecharegistro"
                                                name="docu_fecharegistro">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="docu_idorigen">Origen</label>
                                        <div class="radio" id="divRadios">
                                            <label style="padding-right: 1cm;">
                                                <input type="radio" name="docu_idorigen" value="1"
                                                    onchange="interno(this)"> Interno
                                            </label>

                                            <label>
                                                <input type="radio" name="docu_idorigen" value="2"
                                                    onchange="externo(this)"> Externo
                                            </label>
                                        </div>
                                    </div>

                                    <!--Ocultar Interno-->
                                    <div id="interno" style="display:block">
                                        <div class="form-group col-sm-6">
                                            <label for="docu_iddependencia">Unidad Orgánica</label>
                                            <select name="docu_iddependencia" id="docu_iddependencia"
                                                class="form-control select2" style="width: 100%;">
                                                <option value> Seleccione una Opción</option>
                                                @foreach ($internos as $interno)
                                                    <option value="{{ $interno->iddependencia }}">
                                                        {{ $interno->depe_nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!--Ocultar-->

                                    <!--Ocultar Externo-->
                                    <div id="externo" style="display:none">
                                        <div class="form-group col-sm-6">
                                            <label for="docu_ext_iddependencia">Entidad Externa</label>
                                            <select name="docu_ext_iddependencia" id="docu_ext_iddependencia"
                                                class="form-control select2" style="width: 100%;">
                                                <option value> Seleccione una Opción</option>
                                                @foreach ($externas as $externa)
                                                    <option value="{{ $externa->iddependencia }}">
                                                        {{ $externa->depe_nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="docu_detalle">Detalle</label>
                                            <input type="text" class="form-control" name="docu_detalle"
                                                id="docu_detalle" placeholder="Ingrese el Detalle del Documento Actual">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="docu_ext_nombre">Nombre del Tramitante</label>
                                            <input type="text" class="form-control" name="docu_ext_nombre"
                                                id="docu_ext_nombre"
                                                placeholder="Ingrese el Nombre completo del Tramitante">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="docu_ext_dni">DNI</label>
                                            <input class="form-control" type="number" name="docu_ext_dni"
                                                id="docu_ext_dni" onKeyPress="if(this.value.length==8) return false;"
                                                placeholder="Ingrese el N° de DNI del Tramitante">
                                        </div>
                                    </div>
                                    <!--Ocultar-->


                                    <div class="form-group col-sm-6">
                                        <label for="docu_idtipodocumento">Tipo del Documento</label>
                                        <select name="docu_idtipodocumento" id="docu_idtipodocumento"
                                            class="form-control select2" style="width: 100%;">
                                            <option value> Seleccione una Opción</option>
                                            @foreach ($tipodocs as $tipodoc)
                                                <option value="{{ $tipodoc->idtdoc }}">
                                                    {{ $tipodoc->tdoc_descripcion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="docu_asunto">Asunto</label>
                                        <input type="text" class="form-control" name="docu_asunto" id="docu_asunto"
                                            placeholder="Ingrese el Asunto del Documento">
                                    </div>
                                </div>

                                <!--<div class="form-group col-sm-6">
          <label for="exampleInputFile">Archivo PDF</label>
          <input type="file" id="file_archivo" name="file_archivo">
         </div>-->

                                <div class="col-xs-12">
                                    <div class="box-footer1">

                                        <!--<a href="{{ url('tramite') }}" class="btn btn-default"><i class="fa fa-exchange"></i> Volver</a>-->
                                        <button class="btn btn-primary pull-right" type="submit"><i
                                                class="fa fa-search"></i> Buscar</button>
                                        <hr width="0px">

                                    </div>

                                    <!--<button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>-->
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>SISDATA</b> | munimolino@gmail.com
        </div>
        <strong>Municipalidad Distrtal de Amarilis <a href="{{ url('tramite') }}"> SISDATA | 1.0</a>.</strong> Sistema de Gesti&oacute;n Documental.
    </footer>

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>

    <script type="text/javascript">
        function interno(c) {
            element1 = document.getElementById("interno");
            element2 = document.getElementById("externo");
            if (c.checked) {
                element1.style.display = 'block';
                element2.style.display = 'none';
            } else {
                element1.style.display = 'none';
                element2.style.display = 'block';
            }
        }

        function externo(c) {
            element1 = document.getElementById("interno");
            element2 = document.getElementById("externo");
            if (c.checked) {
                element1.style.display = 'none';
                element2.style.display = 'block';
            } else {
                element1.style.display = 'block';
                element2.style.display = 'none';
            }
        }

        function Cambia(c) {
            element11 = document.getElementById("info-mostrar");
            if (c.checked) {
                element11.style.display = 'block';
            } else {
                element11.style.display = 'none';
            }
        }
        $(document).ready(function() {
            $("#btn-interno").click(function(evento) {
                $("#interno").css("display", "none");
                $("#externo").css("display", "none");
            });
        });

    </script>
</body>

</html>
