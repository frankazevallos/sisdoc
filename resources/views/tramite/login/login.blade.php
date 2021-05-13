<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SISTEMA DE GESTI&Oacute; DOCUMENTAL</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/iCheck/square/blue.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition login-page" style="background-image: url({{asset('dist/img/fondo2.png')}});">    
    <div class="login-box" style="opacity:0.75;">
        <!-- /.login-logo -->
        <div class="login-box-body">
            @if(Session::has('error_message'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>	<i class="icon fa fa-check"></i> ATENCIÓN!</h4>
                    {{ Session::get('error_message') }}
                </div>
            @endif
            @if(Session::has('status'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>	<i class="icon fa fa-check"></i> ATENCIÓN!</h4>
                    {{ Session::get('status') }}
                </div>
            @endif
            @if(Session::has('restaurar'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>	<i class="icon fa fa-check"></i> ATENCIÓN!</h4>
                    {{ Session::get('restaurar') }}
                </div>
            @endif
            
            <div class="login-logo">
                <img  src="{{asset('dist/img/sesion4.png')}}" width="180px">
                <img  src="{{asset('dist/img/molino.png')}}" width="180px">
            </div>
            
            <div id="interno-mostrar" style="display: none;">
                <form role="form" method="POST" action="{{ url('ingresar') }}">
                {{ csrf_field() }}
                    <div class="form-group has-feedback">
                        <input type="number" onKeyPress="if(this.value.length==8) return false;" class="form-control" placeholder="Usuario" name="email">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Contraseña" name="password" maxlength="30">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                          <button type="submit" class="btn btn-success btn-block btn-flat">Ingresar</button>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 5px;">
                        <div class="col-xs-12 text-center">
                          <a href="{{url('olvidar')}}">¿Olvido su nombre de Usuario o Contraseña?</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="social-auth-links text-center" id="interno">
              <a class="btn btn-block btn-success btn-flat" name="btn-interno" id="btn-interno"><i class="fa fa-user"> | </i> Ingresar como persona Interna</a>
            </div>
            <div class="social-auth-links text-center" id="externo">
              <p>- Ó -</p>
              <a href="{{url('externo')}}" class="btn btn-block btn-github btn-flat"><i class="fa fa-street-view"> | </i> Ingresar como persona Externa</a>
            </div>

        <!--<a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a>-->

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $(document).ready(function() {
          $("#btn-interno").click(function(evento) {
              $("#interno-mostrar").css("display", "block");
              $("#interno").css("display", "none");
              $("#externo").css("display", "none");
          });
        });
    </script>
    
</body>

</html>