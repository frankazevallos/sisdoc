@extends('layouts.admin') @section('contenido') {!! Form::open(array('url' => 'tramite/catalogos/tipodocumentos', 'method' =>'POST')) !!} {{csrf_field()}}
<style>
    .nav-tabs-custom > .nav-tabs > li.active {
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
            <i class="ion-ios-paper-outline"> </i>
            Tipos de Documentos
        </h1>
        <ol class="breadcrumb">
            <li><a class="text-green" href="{{url('/')}}"><i class="fa fa-dashboard"></i> Trámite</a></li>
            <li><a class="text-green" href="{{url('tramite/catalogos/')}}">Catálogos</a></li>
            <li class="active">Nuevo Tipo Documento</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li><a href="{{url('tramite/catalogos/tipodocumentos/')}}">Buscar Tipo Documento</a></li>
                        <li class="active"><a href="#buscar" data-toggle="tab">Nuevo Tipo Documento</a></li>
                    </ul>
                    <!-- general form elements -->
                    <div class="tab-content">
                        <div class="chart tab-pane active" id="buscar">
                            <!-- /.box-header -->
                            <div class="form-group col-sm-6">
                                <label for="tdoc_descripcion">1. Descripción</label>
                                <input type="text" class="form-control" name="tdoc_descripcion" id="tdoc_descripcion" placeholder="Ingrese nombre del Tipo de Doc.">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="tdoc_abreviado">2. Descripción Abrev.</label>
                                <input type="text" class="form-control" name="tdoc_abreviado" id="tdoc_abreviado" placeholder="Ingrese nombre abreviado">
                            </div>
                                                        
                            <div class="col-xs-12">
                                <div class="box-footer1">
                                <a href="{{url('tramite/catalogos/tipodocumentos')}}" class="btn btn-default"><i class="fa fa-exchange"></i> Volver</a>
                                <button class="btn btn-success pull-right" type="submit"><i class="fa fa-sign-out"></i> Guardar</button>
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