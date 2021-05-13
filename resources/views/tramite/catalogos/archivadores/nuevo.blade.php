@extends('layouts.admin') @section('contenido') {!! Form::open(array('url' => 'tramite/catalogos/archivadores', 'method' =>'POST')) !!} {{csrf_field()}}
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
        	<i class="ion-ios-pricetag-outline"> </i>
            Archivadores
        </h1>
        <ol class="breadcrumb">
            <li><a class="text-green" href="{{url('tramite')}}"><i class="fa fa-dashboard"></i> Trámite</a></li>
            <li><a class="text-green" href="{{url('tramite/catalogos/')}}">Catálogos</a></li>
            <li class="active">Nuevo Archivador</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li><a href="{{url('tramite/catalogos/archivadores')}}">Buscar Archivador</a></li>
                        <li class="active"><a href="#buscar" data-toggle="tab">Nuevo Archivador</a></li>
                    </ul>
                    <!-- general form elements -->
                    <div class="tab-content">
                        <div class="chart tab-pane active" id="buscar">
                            <!-- /.box-header -->
                            
                            <div class="form-group col-sm-6">
                                <label for="personal">1. Ambito</label>
                                <div class="col-xs-12">
                                    <input type="checkbox" onchange="showContent()" name="personal" id="personal" value="1"> - Archivador Personal
                                </div>
                            </div>
                            <!--Usuario responsable-->
                            <input type="hidden" value="{{Auth::user()->idadmin}}" name="arch_idusuario" id="arch_idusuario">
                            
                            <div class="form-group col-sm-6">
                                <label for="arch_dependencia">2. Unidad Orgánica</label>
                                <input type="hidden" class="form-control" name="arch_iddependencia" id="arch_iddependencia" value="{{Auth::user()->adm_iddependencia}}">
                                <input type="text" class="form-control" name="arch_dependencia" id="arch_dependencia" value="{{Auth::user()->getdependencia->depe_nombre}}" readonly>
                            </div>
                            <div class="form-group col-sm-6" id="oculto" style="display: none;">
                                <label for="arch_usuarioa">3. Usuario</label>
                                <input type="hidden" class="form-control" name="arch_idusuarioa" id="arch_idusuarioa" value="{{Auth::user()->idadmin}}">  
                                <input type="text" class="form-control" name="arch_usuarioa" id="arch_usuarioa" value="{{Auth::user()->adm_nombre}}" readonly>                               
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="arch_nombre">4. Descripción</label>
                                <input type="text" class="form-control" name="arch_nombre" id="arch_nombre" placeholder="Ingrese el nombre del Archivador">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="arch_periodo">5. Periodo</label>
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control" id="arch_periodo" name="arch_periodo" value="{{date('Y')}}" readonly>
                                </div><!-- /.input group -->
                            </div>
                                                        
                            <div class="col-xs-12">
                                <div class="box-footer1">
                                <a href="{{url('tramite/catalogos/archivadores')}}" class="btn btn-default"><i class="fa fa-exchange"></i> Volver</a>
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

<script type="text/javascript">
    function showContent() {
        element = document.getElementById("oculto");
        check = document.getElementById("personal");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>

{!! Form::close() !!} @stop