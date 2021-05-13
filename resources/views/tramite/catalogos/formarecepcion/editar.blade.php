@extends('layouts.admin') @section('contenido') {!! Form::open(array('url' => 'tramite/catalogos/formarecepcion/'.$editreceps->id, 'method' =>'PUT')) !!}  {{csrf_field()}}
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
            <li class="active">Editar Forma Recepción</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li><a href="{{url('tramite/catalogos/formarecepcion/')}}">Buscar Forma de Recepción</a></li>
                        <li class="active"><a href="#buscar" data-toggle="tab">Editar Forma de Recepción</a></li>
                    </ul>
                    <!-- general form elements -->
                    <div class="tab-content">
                        <div class="chart tab-pane active" id="buscar">
                            <!-- /.box-header -->
                            <div class="form-group col-sm-6">
                                <label for="idrecepcion">1. Código</label>
                                <input type="text" class="form-control" name="idrecepcion" id="idrecepcion" value="{{ $editreceps->id }}" readonly>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="rece_descripcion">2. Descripción</label>
                                <input type="text" class="form-control" name="rece_descripcion" id="rece_descripcion" value="{{ $editreceps->nombre }}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="rece_abreviado">3. Descripción Abreviado</label>
                                <input type="text" class="form-control" name="rece_abreviado" id="rece_abreviado" value="{{ $editreceps->abreviado }}">
                            </div>
                        
                            <div class="col-xs-12">
                                <a href="{{url('tramite/catalogos/formarecepcion')}}" class="btn btn-default"><i class="fa fa-exchange"></i> Volver</a>
                                <button class="btn btn-success pull-right"><i class="fa fa-sign-out"></i> Guardar</button>
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