@extends('layouts.admin') @section('contenido') {!! Form::open(['url' => 'tramite/administracion/usuarios', 'method' => 'POST']) !!} {{ csrf_field() }}
    <style>
        .nav-tabs-custom>.nav-tabs>li.active {
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

        .confirmacion {
            background: #7CD2AB;
            margin: auto;
            text-align: center;
            /*font-weight: bold;*/
        }

        .negacion {
            background: #F59494;
            margin: auto;
            text-align: center;
            /*font-weight: bold;*/
        }

    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="fa fa-user"> </i>
                Usuarios
            </h1>
            <ol class="breadcrumb">
                <li><a class="text-green" href="{{ url('tramite') }}"><i class="fa fa-dashboard"></i> Trámite</a></li>
                <li><a class="text-green" href="{{ url('tramite/administracion/') }}">Administración</a></li>
                <li class="active">Nuevo Usuario</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li><a href="{{ url('tramite/administracion/usuarios') }}">Buscar Usuarios</a></li>
                            <li class="active"><a href="#buscar" data-toggle="tab">Nuevo Usuario</a></li>
                        </ul>
                        <!-- general form elements -->
                        <div class="tab-content">
                            <div class="chart tab-pane active" id="buscar">
                                <!-- /.box-header -->
                                <div class="form-group col-sm-6">
                                    <label for="adm_nombre">1. Nombres</label>
                                    <input type="text" class="form-control" name="adm_nombre" id="adm_nombre"
                                        placeholder="Ingrese los Nombres del Usuario." required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="adm_apellido">2. Apellidos</label>
                                    <input type="text" class="form-control" name="adm_apellido" id="adm_apellido"
                                        placeholder="Ingrese los Apellidos del Usuario." required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="adm_inicial">3. Iniciales</label>
                                    <input type="text" class="form-control" name="adm_inicial" id="adm_inicial" readonly>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="adm_dni">4. DNI</label>
                                    <input class="form-control" type="number" name="adm_dni" id="adm_dni"
                                        onKeyPress="if(this.value.length==8) return false;"
                                        placeholder="Ingrese el DNI del Usuario." required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="adm_cumpleanos">5. Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" name="adm_cumpleanos" id="adm_cumpleanos"
                                        required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="adm_telefono">6. Telefono (Cel.)</label>
                                    <input type="text" class="form-control" name="adm_telefono" id="adm_telefono"
                                        placeholder="Ingrese el N° de Telefono o Celular del Usuario" maxlength="10">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="adm_iddependencia">7. Oficina</label>
                                    <select name="adm_iddependencia" id="adm_iddependencia" class="form-control select2"
                                        required>
                                        <option value>Seleccione un Opción</option>
                                        @foreach ($dependencias as $dependencia)
                                            <option value="{{ $dependencia->iddependencia }}">
                                                {{ $dependencia->depe_nombre }}</option>
                                        @endforeach

                                        {{-- /////////////////// --}}
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="adm_cargo">8. Cargo</label>
                                    <input type="text" class="form-control" name="adm_cargo" id="adm_cargo"
                                        placeholder="Ingrese el Cargo del Usuario" required>
                                </div>

                                <div class="col-xs-12">
                                    <div class="box-footer2"></div>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="adm_email">9. Email</label>
                                    <input type="email" class="form-control" name="adm_email" id="adm_email"
                                        placeholder="Ingrese su correo Electronico" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="adm_sisgedo">10. Usuario</label>
                                    <input type="text" class="form-control" name="adm_sisgedo" id="adm_sisgedo" readonly>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="password">11. Password</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Ingrese una Contraseña" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="repit_password">12. Repita Password</label>
                                    <input type="password" class="form-control" name="repit_password" id="repit_password"
                                        placeholder="Repita la Contraseña" required>

                                </div>

                                <div class="col-xs-12">
                                    <div class="box-footer1">
                                        <a href="{{ url('tramite/administracion/usuarios') }}" class="btn btn-default"><i
                                                class="fa fa-exchange"></i> Volver</a>
                                        <button class="btn btn-success pull-right" type="submit" id="guardar"><i
                                                class="fa fa-sign-out"></i> Guardar</button>
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
        $("#adm_dni").blur(function() {
            var value = $("#adm_dni").val();
            $("#adm_sisgedo").val(value);
        });
        $("#adm_dni").blur(function() {
            var value = $("#adm_dni").val();
            $("#password").val(value);
        });
        $("#adm_dni").blur(function() {
            var value = $("#adm_dni").val();
            $("#repit_password").val(value);
        });

        $("#adm_apellido").blur(function() {
            var str = $("#adm_nombre").val().charAt(0);
            var name = str.toLowerCase();
            var str2 = $("#adm_apellido").val();
            var lastname = str2.substring(0, str2.indexOf(" ")).toLowerCase();
            $("#adm_inicial").val(name + lastname);
        });

        $(document).ready(function() {
            //variables
            var pass1 = $('#password');
            var pass2 = $('#repit_password');
            var confirmacion = " Las contraseñas coinciden.";
            var negacion = " Las contraseñas no coinciden. Verificar.";
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
{!! Form::close() !!} @stop
