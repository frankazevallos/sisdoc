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
            <i class="fa fa-file-text"> </i>
            En Proceso
        </h1>
        <ol class="breadcrumb">
            <li><a class="text-green" href="{{url('tramite')}}"><i class="fa fa-dashboard"></i> Trámite</a></li>
            <li><a class="text-green" href="{{url('tramite/documentos')}}">Documentos</a></li>
            <li class="active">Nuevo Documento</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li><a href="{{url('tramite/documentos/enproceso')}}">Buscar Documentos En Proceso</a></li>
                        <li class="active"><a href="#buscar" data-toggle="tab">Nuevo Documento</a></li>
                    </ul>
                    {!! Form::open(array('url' => 'tramite/documentos/enproceso', 'method' =>'POST', 'name'=>'formu', 'files'=>true)) !!} {{csrf_field()}}
                    <!-- general form elements -->
                    <div class="tab-content">
                        <div class="chart tab-pane active" id="buscar">
                            <!-- /.box-header -->
                            <div class="form-group col-sm-6">
                                <label for="docu_fecharegistro">Fecha de Registro</label>
                                <!--<input type="text" class="form-control" value="{{date('d/m/Y')}}" name="docu_fecharegistro" id="docu_fecharegistro" readonly>-->
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="date" class="form-control" id="docu_fecharegistro" name="docu_fecharegistro" value="{{date('Y-m-d')}}">
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="docu_idorigen">Origen</label>
                                <div class="radio" id="divRadios">
                                    @if(Auth::user()->adm_iddependencia == '2')
                                    <label style="padding-right: 1cm;">
                                        <input type="radio" name="docu_idorigen" value="1" onchange="interno(this)"> Interno
                                    </label>

                                    <label>
                                        <input type="radio" name="docu_idorigen" value="2" checked onchange="externo(this)"> Externo
                                    </label>
                                    @elseif(Auth::user()->adm_iddependencia != '2')
                                    <label style="padding-right: 1cm;">
                                        <input type="radio" name="docu_idorigen" value="1" checked onchange="interno(this)"> Interno
                                    </label>
                                    @endif
                                </div>
                            </div>

                        @if(Auth::user()->adm_iddependencia == '2')
                        <!--Ocultar Interno-->
                            <div id="interno" style="display:none">
                                <div class="form-group col-sm-6">
                                    <label for="docu_nomdependencia">Unidad Orgánica</label>
                                    <input type="hidden" class="form-control" value="{{Auth::user()->getdependencia->iddependencia}}" name="docu_iddependencia" id="docu_iddependencia" readonly>
                                    <input type="text" class="form-control" value="{{Auth::user()->getdependencia->depe_nombre}}" name="docu_nomdependencia" id="docu_nomdependencia" readonly>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="docu_tipo">Tipo</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="docu_tipo" id="docu_tipo" onClick="Cambia(this)" value="1"> Documento Personal
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="docu_firma">Firma</label>
                                    <input type="text" class="form-control" name="docu_firma" id="docu_firma" value="{{$representante->depe_representante}}">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="docu_cargo">Cargo</label>
                                    <input type="text" class="form-control" name="docu_cargo" id="docu_cargo" value="{{$representante->depe_cargo}}">
                                </div>
                            </div>
                        <!--Ocultar-->

                        <!--Ocultar Externo-->
                            <div id="externo" style="display:block">
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
                                    <!--<input type="text" class="form-control" name="docu_ext_dni" id="docu_ext_dni" placeholder="Ingrese el N° de DNI del Tramitante" maxlength="8">-->
                                    <input class="form-control" type="number" name="docu_ext_dni" id="docu_ext_dni" onKeyPress="if(this.value.length==8) return false;" placeholder="Ingrese el N° de DNI del Tramitante">
                                </div>
                            </div>
                       <!--Ocultar-->
                        @elseif(Auth::user()->adm_iddependencia != '2')
                        <!--Ocultar Interno-->
                            <div id="interno" style="display:block;">
                                <div class="form-group col-sm-6">
                                    <label for="docu_nomdependencia">Unidad Orgánica</label>
                                    <input type="hidden" class="form-control" value="{{Auth::user()->getdependencia->iddependencia}}" name="docu_iddependencia" id="docu_iddependencia" readonly>
                                    <input type="text" class="form-control" value="{{Auth::user()->getdependencia->depe_nombre}}" name="docu_nomdependencia" id="docu_nomdependencia" readonly>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="docu_tipo">Tipo</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="docu_tipo" id="docu_tipo" onClick="Cambia(this)" value="1"> Documento Personal
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="docu_firma">Firma</label>
                                    <input type="text" class="form-control" name="docu_firma" id="docu_firma" value="{{$representante->depe_representante}}">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="docu_cargo">Cargo</label>
                                    <input type="text" class="form-control" name="docu_cargo" id="docu_cargo" value="{{$representante->depe_cargo}}">
                                </div>
                            </div>
                        <!--Ocultar-->
                        @endif

                            <div class="col-xs-12"><div class="box-footer2"></div></div>
                                                        
                            <div class="form-group col-sm-6">
                                <label for="docu_idtipodocumento">Tipo del Documento</label>
                                <select name="docu_idtipodocumento" id="docu_idtipodocumento" class="form-control select2" style="width: 100%;" required>
                                    <option value> Seleccione una Opción</option>
                                    @foreach($tipodocs AS $tipodoc)
                                    <option value="{{$tipodoc->idtdoc}}">{{$tipodoc->tdoc_descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>  
                            <div class="form-group col-sm-6">
                                <label>Numero de Documento y Siglas</label>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <input type="text" name="docu_numero_doc" id="docu_numero_doc" class="form-control" placeholder="Ingrese el N° del Documento">
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" name="docu_siglas_doc" id="docu_siglas_doc" class="form-control" value="MDM/">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="file_archivo">Archivo PDF</label>
                                <input type="file" id="file_archivo" name="file_archivo" class="form-control" required>
                            </div>   
                           <div class="form-group col-sm-6">
                                <label for="docu_folios">Folios</label>
                                <input type="number" class="form-control" name="docu_folios" id="docu_folios" placeholder="Ingrese el N° de Folios del Documento" onKeyPress="if(this.value.length==3) return false;" required>
                            </div>   
                           <div class="form-group col-sm-6">
                                <label for="docu_asunto">Asunto</label>
                                <input type="text" class="form-control" name="docu_asunto" id="docu_asunto" placeholder="Ingrese el Asunto del Documento" required>
                            </div>                             
                            <div class="form-group col-sm-6">
                                <label for="docu_idprioridad">Prioridad</label>
                                <select name="docu_idprioridad" id="docu_idprioridad" class="form-control" required>
                                    <option value> Seleccione una Opción</option>
                                    @foreach($prioridades AS $prioridad)
                                    <option value="{{$prioridad->idprioridad}}">{{$prioridad->prio_descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--<div class="form-group col-sm-6">
                                <label for="exampleInputFile">Archivo PDF</label>
                                <input type="file" id="file_archivo" name="file_archivo">
                            </div>-->

                            <div class="col-xs-12">
                                <div class="box-footer1">
                                    <a href="{{url('tramite/documentos/enproceso')}}" class="btn btn-default"><i class="fa fa-exchange"></i> Volver</a>
                                    <button class="btn btn-success pull-right" type="submit"><i class="fa fa-sign-out"></i> Guardar</button>
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

    function Cambia(adm) {
        if(adm.checked) {
            document.formu.docu_firma.value = "{{ Auth::user()->adm_nombre.' '.Auth::user()->adm_apellido }}";
            document.formu.docu_cargo.value = "{{ Auth::user()->adm_cargo }}";
        }
        else {
            document.formu.docu_firma.value = "{{ $representante->depe_representante }}";
            document.formu.docu_cargo.value = "{{ $representante->depe_cargo }}";
        }
    }   
</script>
@stop