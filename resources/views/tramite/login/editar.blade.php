<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SISDATA</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('plugins/ionicons-2.0.1/css/ionicons.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/colorpicker/bootstrap-colorpicker.min.css') }}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('js/jQuery-2.1.4.min.js') }}"></script>

    <style>
        .box-footer1 {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
            border-top: 1px solid #37BC89;
            padding: 10px;
            background-color: #fff;
        }

        .login-page,
        .register-page {
            background: #EEEEEE;
        }

        .confirmacion {
            background: #7CD2AB;
            margin: auto;
            text-align: center;
            /*font-weight: bold;*/
        }

        .negacion {
            background: #F2D1D1;
            margin: auto;
            text-align: center;
            /*font-weight: bold;*/
        }

    </style>
</head>

<body class="hold-transition register-page" style="background-image: url({{ asset('dist/img/fondo3.png') }});">

    <div class="register-box">
        <div class="register-logo">
            <img src="{{ asset('dist/img/molino.jpg') }}" width="120px">
            <a href="{{ url('tramite') }}"><b>SISDATA</b> | 1.0</a>
        </div>

        @if (Session::has('error'))
            <div class="text-danger text-center">
                <h5><b>{{ Session::get('error') }}</b></h5>
            </div>
        @endif

        <div class="register-box-body">
            <p class="login-box-msg"><b><u>Cambiar Contraseña</u></b></p>
            @if (Session::has('message'))
                <div class="text-danger text-center">
                    <h5><b>{{ Session::get('message') }}</b></h5>
                </div>
            @endif

            {!! Form::open(['url' => 'tramite/password/save/' . Auth::user()->idadmin]) !!}
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input type="text" class="form-control"
                    value="{{ Auth::user()->adm_nombre }} {{ Auth::user()->adm_apellido }}" readonly>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Contraseña Actual" name="adm_password"
                    id="adm_password">
                <span class="fa fa-unlock form-control-feedback"></span>
                <div class="text-danger">{{ $errors->first('adm_password') }}</div>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Nueva Contraseña" name="password" id="password"
                    required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <div class="text-danger">{{ $errors->first('password') }}</div>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Repita Contraseña" name="repit_password"
                    id="repit_password" required>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">

                <!-- /.col -->
                <div class="col-xs-12">
                    <div class="box-footer1">
                        <button class="btn btn-success btn-flat btn-block" type="submit" id="guardar"><i
                                class="fa fa-sign-out"></i> Guardar</button>
                        <a href="{{ url('tramite') }}" class="btn btn-danger btn-flat btn-block"><i
                                class="glyphicon glyphicon-off"></i> Salir</a>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('js/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap datepicker -->
    <script src="{{ asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
    <!-- bootstrap time picker -->
    <script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/app.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            //variables
            var pass1 = $('#password');
            var pass2 = $('#repit_password');
            var confirmacion = " Las contraseñas si coinciden";
            var negacion = " No coinciden las contraseñas";
            //oculto por defecto el elemento span
            var span = $('<div></div>').insertAfter(pass2);
            span.hide();
            //función que comprueba las dos contraseñas
            function coincidePassword() {

                var valor1 = pass1.val();
                var valor2 = pass2.val();

                //muestro el span
                span.show().removeClass();

                //condiciones dentro de la función
                if (valor1 != valor2) {
                    span.text(negacion).addClass('negacion');
                    $('#guardar').attr("disabled", true);
                }
                if (valor1 == valor2) {
                    span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
                    $('#guardar').attr("disabled", false);
                }
            }
            //ejecuto la función al soltar la tecla
            pass2.keyup(function() {
                coincidePassword();
            });
        });

    </script>
</body>

</html>
