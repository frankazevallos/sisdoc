@extends('layouts.admin') @section('contenido') {!! Form::open(['url' => 'tramite/administracion/entidadesext/' . $entidad->iddependencia, 'method' => 'PUT']) !!} {{ csrf_field() }}
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
                Entidades Externas
            </h1>
            <ol class="breadcrumb">
                <li><a class="text-green" href="{{ url('tramite') }}"><i class="fa fa-dashboard"></i> Trámite</a></li>
                <li><a class="text-green" href="{{ url('tramite/administracion/') }}">Administración</a></li>
                <li class="active">Editar Entidad Externa</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li><a href="{{ url('tramite/administracion/entidadesext') }}">Buscar Entidades Externas</a>
                            </li>
                            <li class="active"><a href="#buscar" data-toggle="tab">Editar Entidad Externa</a></li>
                        </ul>
                        <!-- general form elements -->
                        <div class="tab-content">
                            <div class="chart tab-pane active" id="buscar">
                                <!-- /.box-header -->
                                <div class="form-group col-sm-6">
                                    <label for="depe_nombre">1. Nombre</label>
                                    <input type="text" class="form-control" name="depe_nombre" id="depe_nombre"
                                        value="{{ $entidad->depe_nombre }}" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="depe_abreviado">2. RUC / DNI</label>
                                    <input type="text" class="form-control" name="depe_abreviado" id="depe_abreviado"
                                        value="{{ $entidad->depe_abreviado }}" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="depe_siglaxp">3. Siglas</label>
                                    <input type="text" class="form-control" name="depe_siglaxp" id="depe_siglaxp"
                                        value="{{ $entidad->depe_siglaxp }}">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="depe_representante">4. Representante</label>
                                    <input type="text" class="form-control" name="depe_representante"
                                        id="depe_representante" value="{{ $entidad->depe_representante }}" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="depe_cargo">5. Cargo</label>
                                    <input type="text" class="form-control" name="depe_cargo" id="depe_cargo"
                                        value="{{ $entidad->depe_cargo }}" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="depe_idadmin">6. Usuario Responsable</label>
                                    <input type="hidden" class="form-control" name="depe_idadmin" id="depe_idadmin"
                                        value="{{ Auth::user()->idadmin }}">
                                    <input type="text" class="form-control" name="depe_admin" id="depe_admin"
                                        value="{{ Auth::user()->adm_nombre }} {{ Auth::user()->adm_apellido }}"
                                        readonly>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="depe_estado">7. Estado</label>
                                    <select name="depe_estado" id="depe_estado" class="form-control">
                                        @if ($entidad->depe_estado == 1)
                                            <option value="1" selected>Activo</option>
                                            <option value="2">Inactivo</option>
                                        @else
                                            <option value="1">Activo</option>
                                            <option value="2" selected>Inactivo</option>
                                        @endif
                                    </select>
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
