@extends('layouts.admin') @section('contenido') {!! Form::open(['url' => 'tramite/administracion/entidadesext', 'method' => 'POST']) !!} {{ csrf_field() }}
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
    <!-- Content Wrapper. Contains page content -->
    <div class="content">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="glyphicon glyphicon-globe"> </i>
                Entidades Ext. / Ciudadano
            </h1>
            <ol class="breadcrumb">
                <li><a class="text-green" href="{{ url('tramite') }}"><i class="fa fa-dashboard"></i> Trámite</a></li>
                <li><a class="text-green" href="{{ url('tramite/administracion/') }}">Administración</a></li>
                <li class="active">Nueva Entidad Ext. / Ciudadano</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li><a href="{{ url('tramite/administracion/entidadesext') }}">Buscar Entidad Ext. /
                                    Ciudadano</a>
                            </li>
                            <li class="active"><a href="#buscar" data-toggle="tab">Nueva Entidad Ext. / Ciudadano</a></li>
                        </ul>
                        <!-- general form elements -->
                        <div class="tab-content">
                            <div class="chart tab-pane active" id="buscar">
                                <!-- /.box-header -->
                                <div class="form-group col-sm-6">
                                    <label for="depe_nombre">1. Nombre</label>
                                    <input type="text" class="form-control" name="depe_nombre" id="depe_nombre"
                                        placeholder="Ingrese el nombre de la Entidad Externa" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="depe_abreviado">2. RUC / DNI</label>
                                    <input type="text" class="form-control" name="depe_abreviado" id="depe_abreviado"
                                        placeholder="Ingrese la abreviatura de la Entidad Externa" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="depe_siglaxp">3. Siglas</label>
                                    <input type="text" class="form-control" name="depe_siglaxp" id="depe_siglaxp"
                                        placeholder="Ingrese las Siglas de la Entidad">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="depe_representante">4. Representante</label>
                                    <input type="text" class="form-control" name="depe_representante"
                                        id="depe_representante"
                                        placeholder="Ingrese el nombre completo del Representante de la Entidad" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="depe_cargo">5. Cargo</label>
                                    <input type="text" class="form-control" name="depe_cargo" id="depe_cargo"
                                        placeholder="Ingrese el cargo del Representante de la Entidad" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="depe_fecharegistro">6. Fecha de Registro</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="date" class="form-control" id="depe_fecharegistro"
                                            name="depe_fecharegistro" value="{{ date('Y-m-d') }}">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="depe_idadmin">7. Usuario Responsable</label>
                                    <input type="hidden" class="form-control" name="depe_idadmin" id="depe_idadmin"
                                        value="{{ Auth::user()->idadmin }}">
                                    <input type="text" class="form-control" name="depe_admin" id="depe_admin"
                                        value="{{ Auth::user()->adm_nombre }} {{ Auth::user()->adm_apellido }}"
                                        readonly>
                                </div>

                                <div class="col-xs-12">
                                    <div class="box-footer1">
                                        <a href="{{ url('tramite/administracion/entidadesext') }}"
                                            class="btn btn-default"><i class="fa fa-exchange"></i> Volver</a>
                                        <button class="btn btn-success pull-right" type="submit"><i
                                                class="fa fa-sign-out"></i> Guardar</button>
                                    </div>
                                    <!--<button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>-->
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

{!! Form::close() !!} @stop
