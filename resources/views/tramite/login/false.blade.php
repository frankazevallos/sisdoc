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
    
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
    <!-- jQuery 2.1.4 -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <style>
		html, body {
			height: 100%;
		}
		
		.wrapper {
			height: 100%;
			display: flex;
			flex-direction: column;
		}
		
		.content-wrapper {
			flex: 1;
			min-height: auto;
		}
	</style>   
</head>

<body class="hold-transition skin-green sidebar-mini">
	<div class="wrapper">    
        <header class="main-header">
            <!-- Logo -->
            <a href="{{url('/')}}" class="logo">
                <span class="logo-lg" style="color: #FFFFF5;"><i class="fa fa-chrome"> </i> SISDOC</span>
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <div class="collapse navbar-collapse pull-left" style="padding-top: 10px; padding-left: 300px; font-size:20px; color: #FFFFF5;">  
                    <i><b>Municipalidad Distrital de Molino </b></i>               
                </div>  
            </nav>
        </header>   
    			
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			  <h1>
				500 Error Page
			  </h1>
			</section>

			<!-- Main content -->
			<section class="content">

			  <div class="error-page">
				<h2 class="headline text-red">500</h2>

				<div class="error-content">
				  <h3><i class="fa fa-warning text-red"></i> Error! La dirección de la Pagina a Caducado.</h3>

				  <p>
					La Dirección a la que Ud. esta queriendo Ingresar a sido caducada, por favor ingrese al Sistema |<a href="{{url('/')}}"> SISDOC</a> .
				  </p>
				  
				  <form class="search-form">
					
					<div>
						<a href="{{url('/')}}">
							<button type="button" class="btn btn-danger pull-right"><i class="fa fa-sign-out"></i> Salir</button>
						</a>
					</div>
				  </form>	
				</div>
			  </div>

			</section>
			<!-- /.content -->
		</div>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
              <b>UNHEVAL</b> | sistemas_bek11@hotmail.com
            </div>
            <strong>Municipalidad Distrtal de Molino <a href="{{url('tramite')}}"> SGDoc | 1.0</a>.</strong> Sistema de Gestión Documentaria.
        </footer>
	</div>
	<!-- jQuery 2.1.4 -->
	<script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
	<!-- Bootstrap 3.3.5 -->
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<!-- iCheck -->
	<script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</body>
</html>
    
        
        
