<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TRÁMITE | Documentario</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('plugins/ionicons-2.0.1/css/ionicons.min.css')}}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('/plugins/datatables/dataTables.bootstrap.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/iCheck/flat/blue.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{asset('plugins/colorpicker/bootstrap-colorpicker.min.css')}}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{asset('plugins/timepicker/bootstrap-timepicker.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>    
    
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="{{asset('js/jQuery.print.js')}}"></script> 
</head>
<style>
    .nav-tabs-custom > .nav-tabs > li.active {
        border-top-color: #37BC89;
    }
	
    .table-mihover>tbody>tr:hover {
        background-color: #FBEAB6
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
<body class="hold-transition fixed skin-green sidebar-mini">
    
        <header class="main-header">
            <!-- Logo -->
            <a href="{{url('tramite')}}" class="logo">
                <span class="logo-lg" style="color: #FFFFF5;"><i class="fa fa-globe"> </i> SISDATA</span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                                
                <div class="collapse navbar-collapse pull-left" style="padding-top: 10px; padding-left: 160px; font-size:20px; color: #FFFFF5;">  
                    <i><b>Municipalidad Distrital de Amarilis </b></i>               
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
                                <span class="hidden-xs"> Admin <i class="fa fa-sort-desc"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                	  <form role="form" method="POST" action="{{ url('ingresar') }}">
						                {{ csrf_field() }}
						                    <div class="form-group has-feedback">
						                        <input type="number" onKeyPress="if(this.value.length==8) return false;" class="form-control" placeholder="Usuario" name="email" required="">
						                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
						                    </div>
						                    <div class="form-group has-feedback">
						                        <input type="password" class="form-control" placeholder="Contraseña" name="password" maxlength="30" required="">
						                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
						                    </div>
						                    <div class="row">
						                        <div class="col-xs-12">
						                          <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar Sesion</button>
						                        </div>
						                    </div>
						                    <div class="row" style="padding-top: 3px;">
						                        <div class="col-xs-12 text-center">
						                          <a style="color: blue" href="{{url('olvidar')}}">¿Olvidó su Usuario o Contraseña?</a>
						                        </div>
					                    	</div>
						                
						                </form>
                                    	   
								
                                </li>
                            </ul>                             
                        </li>
                        <!--<li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>-->
                    </ul>
                </div>
            </nav>
        </header>   
    	{{-- <div class="content" style="background-image: url({{asset('dist/img/bodyfond.jpg')}}); width: 100%; height: 100%; position: absolute;">  --}}
				<div class="content" style="background-color: #f3f1f1; width: 100%; height: 100%; position: absolute;"> 
			<br><br>
			<!-- Content Header (Page header) -->
			<section class="content-header col-xs-10 col-sm-10 col-md-10 col-lg-10 col-md-offset-1 col-sm-offset-1 col-lg-offset-1">				
				<h1>
					<i class="ion-android-options"> </i>
					Documento(s) Encontrado(s)
				</h1>
				<ol class="breadcrumb">
					<li><a class="text-green"><i class="fa fa-dashboard"></i> Trámite</a></li>
					<li class="active">Buscar Documento</li>
				</ol><br>
			</section>

				<!-- Main content -->
				<section class="content">        
					<div class="row">
						<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-md-offset-1 col-sm-offset-1 col-lg-offset-1">
							<div class="nav-tabs-custom">
								<ul class="nav nav-tabs">                        
									<li class="active"><a href="#">Buscar Documentos</a></li>
								</ul>
								<!-- general form elements -->
								<div class="tab-content">
								<div class="chart tab-pane active" id="buscar">
									<!-- /.box-header -->
									<table id="example1" class="table table-bordered table-mihover">
										<thead style="background-color: #69C57B;">
											<tr>
												<th class="text-center c1">CÓD</th>
												<th class="text-center c2">F. REGISTRO</th>
												<th class="text-center">TIPO</th>
												<th class="text-center">OFICINA.</th>
												<th class="text-center c5">ASUNTO</th>
												<th class="text-center c6">VER T.</th>
											</tr>
										</thead>

										<tbody>
											@foreach($documentos AS $documento)
												<tr onclick="marcar(this)">
													<td class="text-center">{{ str_pad($documento->iddocumento, 4, "0", STR_PAD_LEFT) }}</td>
													<td class="text-center">{{ date('d/m/Y', strtotime($documento->docu_fecharegistro))}}</td>
													<td>{{$documento->gettipodocumento->tdoc_descripcion}}</td>
													<td>{{$documento->getdependencia->depe_nombre}}</td>
													<td>{{$documento->docu_asunto}}</td>
													<td class="text-center">
														{!! Form::open(array('url' => 'externo/documento', 'method' =>'POST')) !!}
														{{csrf_field()}}
															<input type="hidden" name="buscar_doc" id="buscar_doc" class="form-control" value="{{$documento->iddocumento}}">
															<button type="submit" class="btn btn-default btn-xs" title="Ver Trámite" style="padding-left:7px; padding-right:7px;"><i class="fa fa-eye"></i></button>
														{!! Form::close() !!}
													</td>
												</tr>
											@endforeach
										</tbody>                            
										<tfoot style="background-color: #69C57B;">
											<!--<tr>
												<th>NOMBRE <i class="fa fa-caret-up pull-right"></i></th>
												<th>APELLIDO <i class="fa fa-caret-up pull-right"></i></th>
												<th>DNI <i class="fa fa-caret-up pull-right"></i></th>
												<th>OFICINA <i class="fa fa-caret-up pull-right"></i></th>
												<th>CARGO <i class="fa fa-caret-up pull-right"></i></th>
												<th>Acciones<i class="fa fa-caret-up pull-right"></i></th>
											</tr>-->
										</tfoot>
									</table>
									<div class="box-footer1">
										<a href="{{url('externo')}}">
											<button type="button" class="btn btn-default pull-left"><i class="fa fa-exchange"></i> Volver</button>
										</a>
										<hr width="0px">
									</div>
									<!-- /.box -->
								</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<!-- page script -->

		
		<footer class="main-footer">
            <div class="pull-right hidden-xs">
              
            </div>
            <strong>Municipalidad Distrtal de Amarilis <a href="{{url('tramite')}}"> SISDATA | 1.0</a>.</strong> Sistema Documentaria.
        </footer>

	<!-- jQuery 2.1.4 -->
	<script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
	<!-- Bootstrap 3.3.5 -->
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<!-- DataTables -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
	<!-- iCheck -->
	<script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>

	<script>
		function marcar(obj) {
		  obj.style.background = (obj.style.background=='') ? '#EEC753' : '';
		}	  

		$(function() {
			$("#example1").DataTable({
				"scrollX": true,
				"language": {				
					"sProcessing": "Procesando...",
					"sLengthMenu": "Mostrar _MENU_ registros",
					"sZeroRecords": "No se encontraron resultados",
					"sEmptyTable": "Ningún dato disponible en esta tabla",
					"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
					"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
					"sInfoPostFix": "",
					"sSearch": "Buscar:",
					"sUrl": "",
					"sInfoThousands": ",",
					"sLoadingRecords": "Cargando...",
					"oPaginate": {
						"sFirst": "Primero",
						"sLast": "Último",
						"sNext": "Siguiente",
						"sPrevious": "Anterior"
					},
					"oAria": {
						"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
						"sSortDescending": ": Activar para ordenar la columna de manera descendente"
					}
				}
			});      
			$(".c1").css("width","50px");
			$(".c2").css("width","70px");
			$(".c5").css("width","250px");
			$(".c6").css("width","50px");
		});

	</script>
</body>

</html>