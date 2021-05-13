@extends('layouts.admin')
<meta name="csrf-token" content="{{ csrf_token() }}"> 
@section('contenido') {{csrf_field()}}
<!-- Content Wrapper. Contains page content -->
<style>
    .nav-tabs-custom > .nav-tabs > li.active {
      border-top-color: #37BC89;
    }  
    .table-mihover>tbody>tr:hover {
        background-color: #FBEAB6
    }
	
    .box-footer {
		border-top: 1px solid #37BC89;
	}
	
    .box-footer2 {
		border-top: 1px solid #3c8dbc;
	}
	
    .box-footer3 {
		border-top: 1px solid #f39c12;
	}
	
    .box-footer4 {
		border-top: 1px solid #dd4b39;
	}	
	
    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
        z-index: 2;
        color: #fff;
        cursor: default;
        background-color: #4FA961;
        border-color: #4FA961;
    }	
	
	.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
		font-size: 11px;
	}
</style>
<div class="content">
   
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        	<i class="fa fa-bar-chart"> </i>
            Reportes
        </h1>
        <ol class="breadcrumb">
            <li><a class="text-green" href="{{url('tramite')}}"><i class="fa fa-dashboard"></i> Trámite</a></li>
            <li><a class="active">Reportes</a></li>            
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @if(Session::has('msg'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>	<i class="glyphicon glyphicon-ok-circle"></i> ATENCIÓN!</h4> {{ Session::get('msg') }}
        </div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>	<i class="glyphicon glyphicon-remove-circle"></i> ATENCIÓN!</h4> {{ Session::get('error') }}
        </div>
        @endif
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="box box-success">
                    <div class="box-header with-border">
              			<h3 class="box-title">Generar Reportes</h3>
              			<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
				  		</div>
					</div>
                    <div class="box-body" id="buscar">
                        <div class="form-group col-sm-6 col-sm-offset-3">
                        	<label for="sel_reporte">Seleccione el tipo de Reporte</label>
                        	<select name="sel_reporte" id="sel_reporte" class="form-control" onChange="reporteOnch(this)">
                        		<option value>-- Seleccione una Opción --</option>
                        		@if(Auth::user()->adm_iddependencia == '2')                       		
                        		<option value="1">1. Documentos en proceso</option>
                        		@endif   
                        		@if(Auth::user()->adm_iddependencia != '2')                  		
                        		<option value="2">2. Documentos por recibir</option>
                        		@elseif(Auth::user()->adm_tipousuario != '2')                  		
                        		<option value="2">2. Documentos por recibir</option>
                        		@endif
                        		<option value="3">3. Documentos archivados</option>
                        		<!-- <option value="4">4. Documentos Generados por Unidad Orgánica</option> -->
                        	</select>
                        </div>
                    </div>
                </div>
            </div>
            
		<!-- /.OCULTO 1 -->
		  	<div class="col-sm-12" style="display:none;" id="enProceso">
			  <div class="box box-success box-solid">
				<div class="box-header with-border">
				  <h3 class="box-title">Documentos en Proceso</h3>

				  <div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
				  </div>
				  <!-- /.box-tools -->
				</div>
				<!-- /.box-header -->
				{!! Form::open(array('url' => 'tramite/reportes/enproceso', 'method' =>'post', 'name'=>'formu')) !!} {{csrf_field()}}
				<div class="box-body">
					@if(Auth::user()->idadmin == 1)
						<div class="form-group col-sm-6">
							<label for="en_iddependencia">1. Unidad Orgánica</label>
							<select class="form-control select2" name="en_iddependencia" id="en_iddependencia" style="width: 100%;">
								<option value>-- Seleccione una Opción --</option>
								@foreach($unidades AS $unidad)
									<option value="{{$unidad->iddependencia}}">{{$unidad->depe_nombre}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-sm-6">
							<label for="en_idadmin">2. Usuario</label>
							<select class="form-control" name="en_idadmin" id="en_idadmin" style="width: 100%;">
								<option value>-- Seleccione una Unidad Org. --</option>
							</select>
						</div>
					@else
						<div class="form-group col-sm-6">
							<label for="en_iddependencia">1. Unidad Orgánica</label>
							<select class="form-control" name="en_iddependencia" readonly>
								<option value="{{Auth::user()->adm_iddependencia}}">{{Auth::user()->getdependencia->depe_nombre}}</option>
							</select>
						</div>
						<div class="form-group col-sm-6">
							<label for="en_idadmin">2. Usuario</label>
							<select class="form-control" name="en_idadmin" readonly>
								<option value={{Auth::user()->idadmin}}>{{Auth::user()->adm_nombre}} {{Auth::user()->adm_apellido}}</option>
							</select>
						</div>
					@endif
					<div class="form-group col-sm-6">
						<label for="en_idtdoc">3. Tipo de Documento</label>			
						<select name="en_idtdoc" id="en_idtdoc" class="form-control select2" style="width: 100%;">
							<option value>Seleccione una Opción</option>
							@foreach($tipodocs AS $tipodoc)
								<option value="{{$tipodoc->idtdoc}}">{{$tipodoc->tdoc_descripcion}}</option>
							@endforeach
						</select>								
					</div>						
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<a href="{{url('tramite')}}">
						<button type="button" class="btn btn-default pull-left"><i class="fa fa-exchange"></i> Volver</button>
					</a>
					<button class="btn btn-success pull-right" type="submit"><i class="fa fa-file-pdf-o"></i> Generar</button>
				</div>
  		  	{!! Form::close() !!}
	  		  </div>
	  		</div>
		<!-- /.OCULTO 1 -->
            
		<!-- /.OCULTO 2 -->
		  	<div class="col-sm-12" style="display:none;" id="porRecibir">
			  <div class="box box-primary box-solid">
				<div class="box-header with-border">
				  <h3 class="box-title">Documentos por Recibir</h3>

				  <div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
				  </div>
				  <!-- /.box-tools -->
				</div>
				<!-- /.box-header -->
				{!! Form::open(array('url' => 'tramite/reportes/porrecibir', 'method' =>'post')) !!} {{csrf_field()}}
				<div class="box-body">
					@if(Auth::user()->idadmin == 1)
						<div class="form-group col-sm-6">
							<label for="en_iddependencia2">1. Unidad Orgánica</label>
							<select class="form-control select2" name="en_iddependencia2" id="en_iddependencia2" style="width: 100%;">
								<option value>-- Seleccione una Opción --</option>
								@foreach($unidades AS $unidad)
									<option value="{{$unidad->iddependencia}}">{{$unidad->depe_nombre}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-sm-6">
							<label for="en_idadmin2">2. Usuario</label>
							<select class="form-control" name="en_idadmin2" id="en_idadmin2">
								<option value>-- Seleccione una Unidad Org. --</option>
							</select>
						</div>
					@else
						<div class="form-group col-sm-6">
							<label for="en_iddependencia2">1. Unidad Orgánica</label>
							<select class="form-control" name="en_iddependencia2" readonly>
								<option value="{{Auth::user()->adm_iddependencia}}">{{Auth::user()->getdependencia->depe_nombre}}</option>
							</select>
						</div>
						<div class="form-group col-sm-6">
							<label for="en_idadmin2">2. Usuario</label>
							<select class="form-control" name="en_idadmin2" readonly>
								<option value={{Auth::user()->idadmin}}>{{Auth::user()->adm_nombre}} {{Auth::user()->adm_apellido}}</option>
							</select>
						</div>
					@endif
					<div class="form-group col-sm-6">
						<label for="en_idtdoc2">3. Tipo de Documento</label>			
						<select name="en_idtdoc2" id="en_idtdoc2" class="form-control select2" style="width: 100%;">
							<option value>Seleccione una Opción</option>
							@foreach($tipodocs AS $tipodoc)
								<option value="{{$tipodoc->idtdoc}}">{{$tipodoc->tdoc_descripcion}}</option>
							@endforeach
						</select>								
					</div>
						
				</div>
				<!-- /.box-body -->
				<div class="box-footer box-footer2">
					<a href="{{url('tramite')}}">
						<button type="button" class="btn btn-default pull-left"><i class="fa fa-exchange"></i> Volver</button>
					</a>
					<button class="btn btn-primary pull-right" type="submit"><i class="fa fa-file-pdf-o"></i> Generar</button>
				</div>
  		  		{!! Form::close() !!}
				<!-- /.box-body -->
	  		  </div>
			</div>
		<!-- /.OCULTO 2 -->
            
		<!-- /.OCULTO 3 -->
		  	<div class="col-sm-12" style="display:none;" id="docArchivados">
			  <div class="box box-warning box-solid">
				<div class="box-header with-border">
				  <h3 class="box-title">Documentos Archivados</h3>

				  <div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
				  </div>
				  <!-- /.box-tools -->
				</div>
				<!-- /.box-header -->
				{!! Form::open(array('url' => 'tramite/reportes/archivados', 'method' =>'post')) !!} {{csrf_field()}}
				<div class="box-body">
					@if(Auth::user()->idadmin == 1)
						<div class="form-group col-sm-6">
							<label for="en_iddependencia3">1. Unidad Orgánica</label>
							<select class="form-control select2" name="en_iddependencia3" id="en_iddependencia3" style="width: 100%;">
								<option value>-- Seleccione una Opción --</option>
								@foreach($unidades AS $unidad)
									<option value="{{$unidad->iddependencia}}">{{$unidad->depe_nombre}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-sm-6">
							<label for="en_idadmin3">2. Usuario</label>
							<select class="form-control" name="en_idadmin3" id="en_idadmin3">
								<option value>-- Seleccione una Unidad Org. --</option>
							</select>
						</div>
					@else
						<div class="form-group col-sm-6">
							<label for="en_iddependencia3">1. Unidad Orgánica</label>
							<select class="form-control" name="en_iddependencia3" readonly>
								<option value="{{Auth::user()->adm_iddependencia}}">{{Auth::user()->getdependencia->depe_nombre}}</option>
							</select>
						</div>
						<div class="form-group col-sm-6">
							<label for="en_idadmin3">2. Usuario</label>
							<select class="form-control" name="en_idadmin3" readonly>
								<option value={{Auth::user()->idadmin}}>{{Auth::user()->adm_nombre}} {{Auth::user()->adm_apellido}}</option>
							</select>
						</div>
					@endif
					<div class="form-group col-sm-6">
						<label for="en_idtdoc3">3. Tipo de Documento</label>			
						<select name="en_idtdoc3" id="en_idtdoc3" class="form-control select2" style="width: 100%;">
							<option value>Seleccione una Opción</option>
							@foreach($tipodocs AS $tipodoc)
								<option value="{{$tipodoc->idtdoc}}">{{$tipodoc->tdoc_descripcion}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer box-footer3">
					<a href="{{url('tramite')}}">
						<button type="button" class="btn btn-default pull-left"><i class="fa fa-exchange"></i> Volver</button>
					</a>
					<button class="btn btn-warning pull-right" type="submit"><i class="fa fa-file-pdf-o"></i> Generar</button>
				</div>
				{!! Form::close() !!}
	  		  </div>
			</div>
			<!-- /.OCULTO 3 -->
            
			<!-- /.OCULTO 4 -->
		  	<div class="col-sm-12" style="display:none;" id="uniOrganica">
			  <div class="box box-danger box-solid">
				<div class="box-header with-border">
				  <h3 class="box-title">Documentos Generados por Unidad Orgánica</h3>

				  <div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
				  </div>
				  <!-- /.box-tools -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				  The body of the box
				</div>
				<!-- /.box-body -->
				<div class="box-footer box-footer4">
					<a href="{{url('tramite')}}">
						<button type="button" class="btn btn-default pull-left"><i class="fa fa-exchange"></i> Volver</button>
					</a>
					<a href="{{url('tramite')}}">
						<button type="button" class="btn btn-danger pull-right"><i class="fa fa-file-pdf-o"></i> Generar</button>
					</a>
				</div>
	  		  </div>
			</div>
			<!-- /.OCULTO 4 -->
       
        </div>
    </section>
</div>
<!-- page script -->
<script>
	function marcar(obj) {
	  obj.style.background = (obj.style.background=='') ? '#EEC753' : '';
	}
	
	function reporteOnch(sel) {
      if (sel.value==1){
           $("#enProceso").show();
           $("#porRecibir").hide();
           $("#docArchivados").hide();
           $("#uniOrganica").hide();
      }
      if (sel.value==2){
           $("#enProceso").hide();
           $("#porRecibir").show();
           $("#docArchivados").hide();
           $("#uniOrganica").hide();
      }
      if (sel.value==3){
           $("#enProceso").hide();
           $("#porRecibir").hide();
           $("#docArchivados").show();
           $("#uniOrganica").hide();
      }
      if (sel.value==4){
           $("#enProceso").hide();
           $("#porRecibir").hide();
           $("#docArchivados").hide();
           $("#uniOrganica").show();
      }
	}
	
	$(document).ready(function(){
		
		$.ajaxSetup({
		  headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  }
		});

		$("#en_iddependencia").change(function(){
			$("#en_idadmin").empty();
			$.post(
			  "{{url('tramite/reportes/usuarios')}}",
			  {en_iddependencia:$(this).val()},
			  function(resp){
				var select = '<option value>--Seleccione una Opción--</option>';                    
				var option = '';
				obj = resp; 
				$.each( obj, function( key, value ) {
					option = option + '<option value="'+value['idadmin']+'">'+value['adm_nombre']+'  '+value['adm_apellido']+'</option>';
				});                     
				select = select + option;
				$( "#en_idadmin" ).html( select );
			  }
			);
		});

		$("#en_iddependencia2").change(function(){
			$("#en_idadmin2").empty();
			$.post(
			  "{{url('tramite/reportes/usuarios')}}",
			  {en_iddependencia:$(this).val()},
			  function(resp){
				var select = '<option value>--Seleccione una Opción--</option>';                    
				var option = '';
				obj = resp; 
				$.each( obj, function( key, value ) {
					option = option + '<option value="'+value['idadmin']+'">'+value['adm_nombre']+'  '+value['adm_apellido']+'</option>';
				});                     
				select = select + option;
				$( "#en_idadmin2" ).html( select );
			  }
			);
		});

		$("#en_iddependencia3").change(function(){
			$("#en_idadmin3").empty();
			$.post(
			  "{{url('tramite/reportes/usuarios')}}",
			  {en_iddependencia:$(this).val()},
			  function(resp){
				var select = '<option value>--Seleccione una Opción--</option>';                    
				var option = '';
				obj = resp; 
				$.each( obj, function( key, value ) {
					option = option + '<option value="'+value['idadmin']+'">'+value['adm_nombre']+'  '+value['adm_apellido']+'</option>';
				});                     
				select = select + option;
				$( "#en_idadmin3" ).html( select );
			  }
			);
		});
	});
</script>
@stop