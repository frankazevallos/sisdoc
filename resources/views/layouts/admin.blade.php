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

    <style>
        @media print {
            .oculto {
                display: none
            }

            .centrar {
                margin-left: auto;
                margin-right: auto;
            }
        }

        .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
        }

        .example-modal .modal {
            background: transparent !important;
        }

        .texto {
            color: #3c8dbc;
        }

    </style>

</head>

<body class="hold-transition fixed skin-green sidebar-mini" style="background-color: #1ab394">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="{{ url('tramite') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <!--<span class="logo-mini"><b>AD</b>V</span>-->
                <!-- logo for regular state and mobile devices -->
                <span class="logo-mini"><i class="fa fa-globe"></i></span>
                <span class="logo-lg" style="color: #FFFFF5;"><i class="fa fa-globe"> </i> SISDATA</span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Navegación</span>
                </a>
                <div class="collapse navbar-collapse pull-left"
                    style="padding-top: 10px; padding-left: 100px; font-size:20px; color: #FFFFF5;">
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
                                <span class="hidden-xs"> {{ Auth::user()->adm_nombre }} <i
                                        class="fa fa-sort-desc"></i></span>
                            </a>

                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{ asset('dist/img/usuario-molino.png') }}" class="img-circle"
                                        alt="User Image">
                                    <p>
                                        {{ Auth::user()->adm_nombre }} {{ Auth::user()->adm_apellido }}
                                        <small
                                            style="font-size: x-small;">{{ Auth::user()->getdependencia->depe_nombre }}</small>
                                        <small style="font-size: x-small;">CARGO:
                                            {{ Auth::user()->adm_cargo }}</small>
                                    </p>

                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ url('tramite/password/edit') }}"
                                            style="font-size: x-small;"><u>Cambiar Contraseña</u></a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ url('salir') }}" class="btn btn-default btn-flat">Cerrar
                                            Sesión</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!--<li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>-->
                    </ul>
                </div>

                <!-- Navbar Right Menu Notifications Por Derivar-->
                <?php
                $count0 = DB::table('tram_operacion')
                ->where('oper_idtope', '=', 3)
                ->where('oper_procesado', '=', 'f')
                ->where('oper_iddependencia', '=', Auth::user()->adm_iddependencia)
                ->get()
                ->count();

                $count1 = DB::table('tram_operacion')
                ->where('oper_idtope', '=', 1)
                ->where('oper_procesado', '=', 'f')
                ->where('oper_iddependencia', '=', Auth::user()->adm_iddependencia)
                ->get()
                ->count();
                $total = $count0 + $count1;
                ?>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <!-- search form -->
                        <!-- User Account: style can be found in dropdown.less -->

                        <?php if ($total > 0) { ?>
                        <li class="dropdown messages-menu">
                            <a href="{{ url('tramite/documentos/enproceso') }}" title="Documentos por Derivar">

                                <i class="fa fa-external-link"><span class="label label-warning"><?php
                                        echo $count1; ?></span></i>

                            </a>

                        </li>
                        <?php } ?>
                        <!--<li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>-->
                    </ul>
                </div>

                <!-- Navbar Right Menu Notifications Por Recibir-->
                <?php $count3 = DB::table('tram_operacion')
                ->where('oper_idtope', '=', 2)
                ->where('oper_procesado', '=', 'f')
                ->where('oper_usuid_d', '=', Auth::user()->idadmin)
                ->get()
                ->count(); ?>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <!-- search form -->
                        <!-- User Account: style can be found in dropdown.less -->

                        <?php if ($count3 > 0) { ?>
                        <li class="dropdown messages-menu">
                            <a href="{{ url('tramite/documentos/porrecibir') }}" title="Recibir Documentos">

                                <i class="fa fa-bell-o"><span class="label label-danger"><?php echo
                                        $count3; ?></span></i>

                            </a>

                        </li>
                        <?php } ?>
                        <!--<li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>-->
                    </ul>
                </div>

                <!-- Navbar Right Menu Notifications Por Atender-->
                <?php $count4 = DB::table('tram_operacion')
                ->where('oper_idtope', '=', 5)
                ->where('oper_procesado', '=', 'f')
                ->where('oper_iddependencia', '=', Auth::user()->adm_iddependencia)
                ->get()
                ->count(); ?>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <!-- search form -->
                        <!-- User Account: style can be found in dropdown.less -->

                        <?php if ($count4 > 0) { ?>
                        <li class="dropdown notifications-menu">
                            <a href="{{ url('tramite/documentos/recibidos') }}" title="Atender Documentos">

                                <i class="fa fa-flag-o"><span class="label label-primary"><?php echo
                                        $count4; ?></span></i>

                            </a>

                        </li>
                        <?php } ?>
                        <!--<li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>-->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                {!! Form::open(['url' => 'tramite/buscar/documento', 'method' => 'POST', 'class' => 'sidebar-form', 'style' => 'border:none;']) !!} {{ csrf_field() }}
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <img style="margin-left:35px;" src="{{ asset('dist/img/muniescudo.png') }}" width="120px">
                </div>
                {!! Form::close() !!}
                <!-- search form -->
                {!! Form::open(['url' => 'tramite/buscar/documento', 'method' => 'POST', 'class' => 'sidebar-form']) !!} {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" name="buscar_doc" id="buscar_doc" class="form-control"
                        placeholder="Buscar Documento">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                class="fa fa-search"></i></button>
                    </span>
                </div>
                {!! Form::close() !!}
                <!--<form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Buscar un Documento...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>-->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="treeview">
                        <a href="{{ url('tramite') }}">
                            <i class="fa fa-home"></i>
                            <span>Inicio</span>
                            <!--<i class="fa fa-angle-left pull-right"></i>-->
                        </a>
                        <!--<ul class="treeview-menu">
                            <li><a href="{{ url('tramite/buscar') }}"><i class="fa fa-circle-o text-green"></i> Documentos</a></li>
                        </ul>-->
                    </li>

                    <li class="treeview">
                        <a href="{{ url('tramite/buscar') }}">
                            <i class="fa fa-search"></i>
                            <span>Buscar</span>
                            <!--<i class="fa fa-angle-left pull-right"></i>-->
                        </a>
                        <!--<ul class="treeview-menu">
                            <li><a href="{{ url('tramite/buscar') }}"><i class="fa fa-circle-o text-green"></i> Documentos</a></li>
                        </ul>-->
                    </li>

                    <li class="treeview">
                        <a href="{{ url('tramite/reportes') }}">
                            <i class="fa fa-file-pdf-o"></i>
                            <span>Reportes</span>
                            <!--<i class="fa fa-angle-left pull-right"></i>-->
                        </a>
                        <!--<ul class="treeview-menu">
                            <li><a href="{{ url('tramite/reportes') }}"><i class="fa fa-circle-o text-green"></i> Reportes PDF</a></li>
                        </ul>-->
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span>Documentos</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('tramite/documentos/enproceso') }}"><i
                                        class="fa fa-circle-o text-green"></i> En proceso</a>
                                <!--<ul class="treeview-menu">
                                    <li><a href="{{ url('tramite/documentos/enproceso') }}"><i class="fa fa-circle-o text-green"></i> Buscar</a></li>
                                    <li><a href="{{ url('tramite/documentos/enproceso/create') }}"><i class="fa fa-circle-o text-green"></i> Nuevo</a></li>
                                </ul>-->
                            </li>

                            @if (Auth::user()->adm_iddependencia != '2')
                                <li><a href="{{ url('tramite/documentos/porrecibir') }}"><i
                                            class="fa fa-circle-o text-green"></i> Por recibir</a>
                                    <!--<ul class="treeview-menu">
                                    <li><a href="{{ url('tramite/documentos/enproceso') }}"><i class="fa fa-circle-o text-green"></i> Buscar</a></li>
                                    <li><a href="{{ url('tramite/documentos/enproceso/create') }}"><i class="fa fa-circle-o text-green"></i> Nuevo</a></li>
                                </ul>-->
                                </li>

                                <li><a href="{{ url('tramite/documentos/recibidos') }}"><i
                                            class="fa fa-circle-o text-green"></i> Recibidos</a>
                                    <!--<ul class="treeview-menu">
                                    <li><a href="{{ url('tramite/documentos/enproceso') }}"><i class="fa fa-circle-o text-green"></i> Buscar</a></li>
                                    <li><a href="{{ url('tramite/documentos/enproceso/create') }}"><i class="fa fa-circle-o text-green"></i> Nuevo</a></li>
                                </ul>-->
                                </li>
                            @elseif(Auth::user()->adm_tipousuario == '1')
                                <li><a href="{{ url('tramite/documentos/porrecibir') }}"><i
                                            class="fa fa-circle-o text-green"></i> Por recibir</a>
                                    <!--<ul class="treeview-menu">
                                    <li><a href="{{ url('tramite/documentos/enproceso') }}"><i class="fa fa-circle-o text-green"></i> Buscar</a></li>
                                    <li><a href="{{ url('tramite/documentos/enproceso/create') }}"><i class="fa fa-circle-o text-green"></i> Nuevo</a></li>
                                </ul>-->
                                </li>

                                <li><a href="{{ url('tramite/documentos/recibidos') }}"><i
                                            class="fa fa-circle-o text-green"></i> Recibidos</a>
                                    <!--<ul class="treeview-menu">
                                    <li><a href="{{ url('tramite/documentos/enproceso') }}"><i class="fa fa-circle-o text-green"></i> Buscar</a></li>
                                    <li><a href="{{ url('tramite/documentos/enproceso/create') }}"><i class="fa fa-circle-o text-green"></i> Nuevo</a></li>
                                </ul>-->
                                </li>
                            @endif
                            <li><a href="{{ url('tramite/documentos/derivados') }}"><i
                                        class="fa fa-circle-o text-green"></i> Derivados</a>
                                <!--<ul class="treeview-menu">
                                    <li><a href="{{ url('tramite/documentos/enproceso') }}"><i class="fa fa-circle-o text-green"></i> Buscar</a></li>
                                    <li><a href="{{ url('tramite/documentos/enproceso/create') }}"><i class="fa fa-circle-o text-green"></i> Nuevo</a></li>
                                </ul>-->
                            </li>
                            @if (Auth::user()->adm_iddependencia != '2')
                                <li><a href="{{ url('tramite/documentos/atendidos') }}"><i
                                            class="fa fa-circle-o text-green"></i> Atendidos</a>
                                    <!--<ul class="treeview-menu">
                                    <li><a href="{{ url('tramite/documentos/enproceso') }}"><i class="fa fa-circle-o text-green"></i> Buscar</a></li>
                                    <li><a href="{{ url('tramite/documentos/enproceso/create') }}"><i class="fa fa-circle-o text-green"></i> Nuevo</a></li>
                                </ul>-->
                                </li>
                            @elseif(Auth::user()->adm_tipousuario != '2')
                                <li><a href="{{ url('tramite/documentos/atendidos') }}"><i
                                            class="fa fa-circle-o text-green"></i> Atendidos</a>
                                    <!--<ul class="treeview-menu">
                                    <li><a href="{{ url('tramite/documentos/enproceso') }}"><i class="fa fa-circle-o text-green"></i> Buscar</a></li>
                                    <li><a href="{{ url('tramite/documentos/enproceso/create') }}"><i class="fa fa-circle-o text-green"></i> Nuevo</a></li>
                                </ul>-->
                                </li>
                            @endif
                            <li><a href="{{ url('tramite/documentos/archivados') }}"><i
                                        class="fa fa-circle-o text-green"></i> Archivados</a>
                                <!--<ul class="treeview-menu">
                                    <li><a href="{{ url('tramite/documentos/enproceso') }}"><i class="fa fa-circle-o text-green"></i> Buscar</a></li>
                                    <li><a href="{{ url('tramite/documentos/enproceso/create') }}"><i class="fa fa-circle-o text-green"></i> Nuevo</a></li>
                                </ul>-->
                            </li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-newspaper-o"></i> <span> Catálogos </span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('tramite/catalogos/archivadores') }}"><i
                                        class="fa fa-circle-o text-green"></i> Archivadores</a>
                                <!-- <ul class="treeview-menu">
                                    <li><a href="{{ url('tramite/catalogos/archivadores') }}"><i class="fa fa-circle-o text-green"></i> Buscar</a></li>
                                    <li><a href="{{ url('tramite/catalogos/archivadores/create') }}"><i class="fa fa-circle-o text-green"></i> Nuevo</a></li>
                                </ul> -->
                            </li>
                            @if (Auth::user()->idadmin == 1)
                                <li><a href="{{ url('tramite/catalogos/tipodocumentos') }}"><i
                                            class="fa fa-circle-o text-green"></i> Tipos de Documentos</a>
                                    <!-- <ul class="treeview-menu">
                                    <li><a href="{{ url('tramite/catalogos/tipodocumentos') }}"><i class="fa fa-circle-o text-green"></i> Buscar</a></li>
                                    <li><a href="{{ url('tramite/catalogos/tipodocumento/create') }}"><i class="fa fa-circle-o text-green"></i> Nuevo<i class="fa fa-angle-left pull-right"></i></a>
                                    </li>
                                </ul> -->
                                </li>
                                <!-- <li><a href="{{ url('tramite/catalogos/formarecepcion') }}"><i class="fa fa-circle-o text-green"></i> Formas de Recepción</a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ url('tramite/catalogos/formarecepcion') }}"><i class="fa fa-circle-o text-green"></i> Buscar</a></li>
                                    <li><a href="{{ url('tramite/catalogos/formarecepcion/create') }}"><i class="fa fa-circle-o text-green"></i> Nuevo<i class="fa fa-angle-left pull-right"></i></a>
                                    </li>
                                </ul>
                            </li> -->
                                <li><a href="{{ url('tramite/catalogos/tipoprioridad') }}"><i
                                            class="fa fa-circle-o text-green"></i> Tipos de Prioridades</a>
                                    <!-- <ul class="treeview-menu">
                                    <li><a href="{{ url('tramite/catalogos/tipoprioridad') }}"><i class="fa fa-circle-o text-green"></i> Buscar</a></li>
                                    <li><a href="{{ url('tramite/catalogos/tipoprioridad/create') }}"><i class="fa fa-circle-o text-green"></i> Nuevo<i class="fa fa-angle-left pull-right"></i></a>
                                    </li>
                                </ul> -->
                                </li>
                            @endif
                            <!--<li><a href="{{ url('tramite/catalogos/tupa') }}"><i class="fa fa-circle-o text-light-blue"></i> Tupa</a></li>-->
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-th"></i> <span>Configuración</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('tramite/administracion/entidadesext') }}"><i
                                        class="fa fa-circle-o text-green"></i> Entidades Ext. / Ciudadano</a>
                                <!-- <ul class="treeview-menu">
                                    <li><a href="{{ url('tramite/administracion/entidadesext') }}"><i class="fa fa-circle-o text-green"></i> Buscar</a></li>
                                    <li><a href="{{ url('tramite/administracion/entidadesext/create') }}"><i class="fa fa-circle-o text-green"></i> Nuevo</a></li>
                                </ul> -->
                            </li>
                            {{-- agreagar item cudadano --}}
                            {{-- <li><a href="{{ url('tramite/administracion/ciudadano') }}"><i
                                        class="fa fa-circle-o text-green"></i> Ciudadano</a>
                                <!-- <ul class="treeview-menu">
                                    <li><a href="{{ url('tramite/administracion/entidadesext') }}"><i class="fa fa-circle-o text-green"></i> Buscar</a></li>
                                    <li><a href="{{ url('tramite/administracion/entidadesext/create') }}"><i class="fa fa-circle-o text-green"></i> Nuevo</a></li>
                                </ul> -->
                            </li> --}}



                            @if (Auth::user()->idadmin == 1)
                                <li><a href="{{ url('tramite/administracion/unidadesorg') }}"><i
                                            class="fa fa-circle-o text-green"></i> Unidades Orgánicas</a>
                                    <!-- <ul class="treeview-menu">
                                    <li><a href="{{ url('tramite/administracion/unidadesorg') }}"><i class="fa fa-circle-o text-green"></i> Buscar</a></li>
                                    <li><a href="{{ url('tramite/administracion/unidadesorg/create') }}"><i class="fa fa-circle-o text-green"></i> Nuevo</a></li>
                                </ul> -->
                                </li>

                                <li><a href="{{ url('tramite/administracion/usuarios') }}"><i
                                            class="fa fa-circle-o text-green"></i> Usuarios</a>
                                    <!-- <ul class="treeview-menu">
                                    <li><a href="{{ url('tramite/administracion/usuarios') }}"><i class="fa fa-circle-o text-green"></i> Buscar</a></li>
                                    <li><a href="{{ url('tramite/administracion/usuarios/create') }}"><i class="fa fa-circle-o text-green"></i> Nuevo</a></li>
                                </ul> -->
                                </li>
                                <!--<li><a href="{{ url('tramite/administracion/correlativos') }}"><i class="fa fa-circle-o text-green"></i> Correlativos<i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                    <li><a href="{{ url('tramite/administracion/correlativos') }}"><i class="fa fa-circle-o text-green"></i> Buscar</a></li>
                                    <li><a href="{{ url('tramite/administracion/correlativos/create') }}"><i class="fa fa-circle-o text-green"></i> Nuevo</a></li>
                                </ul>
                                </li>-->
                                <!--<li><a href="{{ url('tramite/administracion/bloques') }}"><i class="fa fa-circle-o text-light-blue"></i> Bloques</a></li>-->

                                <li><a href="{{ url('tramite/administracion/dependencias') }}"><i
                                            class="fa fa-circle-o text-green"></i> Dependencia</a>
                                    <!-- <ul class="treeview-menu">
                                    <li><a href="{{ url('tramite/administracion/dependencias') }}"><i class="fa fa-circle-o text-green"></i> Buscar</a></li>
                                    <li><a href="{{ url('tramite/administracion/dependencias/create') }}"><i class="fa fa-circle-o text-green"></i> Nuevo</a></li>
                                </ul> -->
                                </li>
                            @endif
                        </ul>
                    </li>

                    <!-- <li>
                        <a href="#">
                            <i class="fa fa-plus-square"></i> <span>Administración</span>
                            <small class="label pull-right bg-red">PDF</small>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                            <small class="label pull-right bg-yellow">IT</small>
                        </a>
                    </li> -->

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!--Contenido-->
        <!-- Content Wrapper. Contains page content -->
        {{-- <div class="content-wrapper" style="background-image: url({{ asset('dist/img/bodyfond.jpg') }});"> --}}
        <div class="content-wrapper" style="background-color: #f3f1f1;">
            @if (Session::has('msg2'))
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4> <i class="glyphicon glyphicon-ok-circle"></i> ATENCI&Oacute;N!</h4>
                    {{ Session::get('msg2') }}
                </div>
            @endif
            @yield('contenido')
        </div>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>SISDATA</b> | sistemas_bek11@hotmail.com
            </div>
            <strong> Municipalidad Distrtal de Amarilis <a href="{{ url('tramite') }}"> SISDATA | 1.0</a>.</strong>
            Sistema de Gesti&oacute;n Documental.
        </footer>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!--Pie de Pagina-->
    <!--<footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2015-2020 <a href="www.incanatoit.com">IncanatoIT</a>.</strong> All rights reserved.
    </footer>-->
    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('js/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap datepicker -->
    <script src="{{ asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
    <!-- bootstrap time picker -->
    <script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/app.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
    <!-- Page script -->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $(".select2").select2();

            //Datemask dd/mm/yyyy
            $("#datemask").inputmask("dd/mm/yyyy", {
                "placeholder": "dd/mm/yyyy"
            });
            //Datemask2 mm/dd/yyyy
            $("#datemask2").inputmask("mm/dd/yyyy", {
                "placeholder": "mm/dd/yyyy"
            });
            //Money Euro
            $("[data-mask]").inputmask();

            $('#datepicker').datepicker({
                autoclose: true,
                days: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
                daysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto",
                    "Setiembre", "Octubre", "Noviembre", "Diciembre"
                ],
                monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct",
                    "Nov", "Dic"
                ]
            });
            //Date range picker
            $('#reservation').daterangepicker();
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                format: 'MM/DD/YYYY h:mm A'
            });
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                        'MMMM D, YYYY'));
                }
            );

            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            });
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });

            //Colorpicker
            $(".my-colorpicker1").colorpicker();
            //color picker with addon
            $(".my-colorpicker2").colorpicker();

            //Timepicker
            $(".timepicker").timepicker({
                showInputs: false
            });

            //iCheck for checkbox and radio inputs
            $('.mailbox-messages input[type="checkbox"]').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });

            //Enable check and uncheck all functionality
            $(".checkbox-toggle").click(function() {
                var clicks = $(this).data('clicks');
                if (clicks) {
                    //Uncheck all checkboxes
                    $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
                    $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
                } else {
                    //Check all checkboxes
                    $(".mailbox-messages input[type='checkbox']").iCheck("check");
                    $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
                }
                $(this).data("clicks", !clicks);
            });
        });

    </script>
</body>

</html>
