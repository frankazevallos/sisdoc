@extends('layouts.admin') @section('contenido') 
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
<div class="content">    
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        	<i class="fa fa-search"> </i>
            Buscar
        </h1>
        <ol class="breadcrumb">
            <li><a class="text-green" href="{{url('tramite')}}"><i class="fa fa-dashboard"></i> Trámite</a></li>
            <li class="active">Buscar Documento</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#buscar" data-toggle="tab">Buscar Documentos</a></li>
                    </ul>
                {!! Form::open(array('url' => 'tramite/buscar/expedientes', 'method' =>'POST', 'name'=>'formu')) !!} {{csrf_field()}}
                    <!-- general form elements -->
                    <div class="tab-content">
                        <div class="chart tab-pane active" id="buscar">
                            <!-- /.box-header -->
                            <div class="form-group col-sm-6">
                                <label for="iddocumento">N° de Registro</label>                                
								<input type="text" class="form-control" id="iddocumento" name="iddocumento" placeholder="Ingrese el N° de Registro.">								
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="docu_idorigen">Origen</label>
                                <div class="radio" id="divRadios">
                                    <label style="padding-right: 1cm;">
                                        <input type="radio" name="docu_idorigen" value="1" onchange="interno(this)"> Interno
                                    </label>

                                    <label>
                                        <input type="radio" name="docu_idorigen" value="2" onchange="externo(this)"> Externo
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="docu_fecharegistro">Fecha de Registro</label>
                                <div class="input-group date">
								    <div class="input-group-addon">
									    <i class="fa fa-calendar"></i>
								    </div>
								    <input type="date" class="form-control" id="docu_fecharegistro" name="docu_fecharegistro">
								</div>
                            </div>

                        <!--Ocultar Interno-->
                            <div id="interno" style="display:block">
                                <div class="form-group col-sm-6">
                                    <label for="docu_iddependencia">Unidad Orgánica</label>
                                    <select name="docu_iddependencia" id="docu_iddependencia" class="form-control select2" style="width: 100%;">
                                        <option value> Seleccione una Opción</option>
                                        @foreach($internos AS $interno)
                                        <option value="{{$interno->iddependencia}}">{{$interno->depe_nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        <!--Ocultar-->

                        <!--Ocultar Externo-->
                            <div id="externo" style="display:none">
                                <div class="form-group col-sm-6">
                                    <label for="docu_ext_iddependencia">Entidad Externa</label>
                                    <select name="docu_ext_iddependencia" id="docu_ext_iddependencia" class="form-control select2" style="width: 100%;">
                                        <option value> Seleccione una Opción</option>
                                        @foreach($externas AS $externa)
                                        <option value="{{$externa->iddependencia}}">{{$externa->depe_nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="docu_detalle">Detalle</label>
                                    <input type="text" class="form-control" name="docu_detalle" id="docu_detalle" placeholder="Ingrese el Detalle del Documento Actual">
                                </div>
								<div class="form-group col-sm-6">
									<label for="docu_ext_nombre">Nombre del Tramitante</label>
									<input type="text" class="form-control" name="docu_ext_nombre" id="docu_ext_nombre" placeholder="Ingrese el Nombre completo del Tramitante">
								</div>
								<div class="form-group col-sm-6">
									<label for="docu_ext_dni">DNI</label>
									<input class="form-control" type="number" name="docu_ext_dni" id="docu_ext_dni" onKeyPress="if(this.value.length==8) return false;" placeholder="Ingrese el N° de DNI del Tramitante">
								</div>
                            </div>
                       <!--Ocultar-->
							<div class="col-xs-12"><div class="box-footer2"></div></div>
                                                        
                            <div class="form-group col-sm-6">
                                <label for="docu_idtipodocumento">Tipo del Documento</label>
                                <select name="docu_idtipodocumento" id="docu_idtipodocumento" class="form-control select2" style="width: 100%;">
                                    <option value> Seleccione una Opción</option>
                                    @foreach($tipodocs AS $tipodoc)
                                    <option value="{{$tipodoc->idtdoc}}">{{$tipodoc->tdoc_descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>    
                           <div class="form-group col-sm-6">
                                <label for="docu_asunto">Asunto</label>
                                <input type="text" class="form-control" name="docu_asunto" id="docu_asunto" placeholder="Ingrese el Asunto del Documento">
                            </div>                          
                            <!--<div class="form-group col-sm-6">
                                <label for="exampleInputFile">Archivo PDF</label>
                                <input type="file" id="file_archivo" name="file_archivo">
                            </div>-->

                            <div class="col-xs-12">
                                <div class="box-footer1">
                                    <a href="{{url('tramite')}}" class="btn btn-default"><i class="fa fa-exchange"></i> Volver</a>
                                    <button class="btn btn-primary pull-right" type="submit"><i class="fa fa-search"></i> Buscar</button>
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

<script type="text/javascript">
	$(document).ready(function() {
		$('.calendario').datepicker({
		  pickTime: false,
		  autoclose: true,
		  language: 'es'
		});
	});
	
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
</script>
@stop