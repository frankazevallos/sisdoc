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
            <li class="active">Archivar Documento</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li><a href="{{url('tramite/documentos/enproceso')}}">Buscar Documentos En Proceso</a></li>
                        <li class="active"><a href="#buscar" data-toggle="tab">Archivar Documento</a></li>
                    </ul>
                    
                    {!! Form::open(array('url' => 'tramite/documentos/enproceso/guardararchivado', 'method' =>'POST', 'name'=>'formu')) !!}
                    <!-- general form elements -->
                    <div class="tab-content">
                        <div class="chart tab-pane active" id="buscar">
                            <!-- /.box-header -->                           
                            <div class="form-group col-sm-6">
								<label for="iddocumento">1. Documento</label>	
								<input type="text" class="form-control" name="iddocumento" id="iddocumento" value="{{str_pad($operacion->oper_iddocumento, 4, '0', STR_PAD_LEFT)}}" readonly>
								<input type="hidden" class="form-control" name="idoperacion" id="idoperacion" value="{{$operacion->idoperacion}}">
							</div>       
                            <div class="form-group col-sm-6">
								<label for="file_archivo">2. Archivo PDF</label>	
								<a href="{{asset('documentospdf'.'/'.$operacion->getdocumento->docu_archivo)}}" class="btn btn-warning btn-sm btn-flat btn-block" target="_blank"><i class="fa fa-file-text"></i> Ver Documento</a>
							</div>
							   	    
							<div class="col-xs-12"><div class="box-footer2"></div></div>
                                                        
                            <div class="form-group col-sm-6">
								<label for="oper_tarchi_id">3. Forma</label>	
								<select name="oper_tarchi_id" id="oper_tarchi_id" class="form-control" required>
									<option value>Seleccione una Opción</option>
									<option value="2">DEFINITIVO</option>
									<option value="1">TEMPORAL</option>
								</select>
							</div> 
                            <div class="form-group col-sm-6">
								<label for="oper_idarchivador">4. Archivador</label>	
								<select name="oper_idarchivador" id="oper_idarchivador" class="form-control select2" style="width: 100%;" required>
									<option value>Seleccione una Opción</option>
									@foreach($archivadores AS $archivador)
										<option value="{{$archivador->idarch}}">{{$archivador->arch_periodo}} / {{$archivador->arch_nombre}}</option>
									@endforeach
								</select>
							</div>   
                            <div class="form-group col-sm-6">
								<label for="oper_acciones">5. Acciones</label>	
								<input type="text" class="form-control" name="oper_acciones" id="oper_acciones" placeholder="Ingrese la accion o detalle para el Archivado">
							</div>      

                            <div class="col-xs-12">
                                <div class="box-footer1">
                                    <a href="{{url('tramite/documentos/enproceso')}}" class="btn btn-default"><i class="fa fa-exchange"></i> Volver</a>
                                    <button class="btn btn-success pull-right" type="submit"><i class="fa fa-sign-out"></i> Guardar</button>
                                </div>
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
	
</script>
@stop