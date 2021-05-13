@extends('layouts.admin') @section('contenido')
<div class="content">
    <section class="content-header">
        <h1><i class="fa fa-gear"></i>
			Administración
			<!--<small>Version 1.0</small>-->
		</h1>
        <ol class="breadcrumb">
            <li><a class="text-green" href="{{url('tramite')}}"><i class="fa fa-dashboard"></i> Tramite</a></li>
            <li class="active">Administración</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="box-body">
                <!-- Info Boxes Style 2 -->
                <!--<div class="col-sm-6">
                    <a href="{{url('tramite/administracion/correlativos')}}">
                        <div class="info-box bg-aqua">
                            <span class="info-box-icon"><i class="ion-android-exit"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Administración</span>
                                <span class="info-box-number">Correlativos</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 30%"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>-->

                <div class="col-sm-6">
                    <!-- /.info-box -->
                    <a href="{{url('tramite/administracion/dependencias')}}">
                        <div class="info-box bg-yellow">
                            <span class="info-box-icon"><i class="ion-ios-pie-outline"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Administración</span>
                                <span class="info-box-number">Dependencias</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>

                <div class="col-sm-6">
                    <!-- /.info-box -->
                    <a href="{{url('tramite/administracion/entidadesext')}}">
                        <div class="info-box bg-light-blue">
                            <span class="info-box-icon"><i class="ion-android-globe"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Administración</span>
                                <span class="info-box-number">Entidades Externas</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 30%"></div>
                                </div>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>
                <div class="col-sm-6">
                    <!-- /.info-box -->
                    <a href="{{url('tramite/administracion/unidadesorg')}}">
                        <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="ion-ios-body"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Administración</span>
                                <span class="info-box-number">Unidades Orgánicas</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 40%"></div>
                                </div>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>

                <!-- /.box-body -->
                <div class="col-sm-6">
                    <!-- /.info-box -->
                    <a href="{{url('tramite/administracion/usuarios')}}">
                        <div class="info-box bg-red">
                            <span class="info-box-icon"><i class="ion-person-stalker"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Administración</span>
                                <span class="info-box-number">Usuarios</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 50%"></div>
                                </div>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>

                <!-- /.box-body -->
            </div>
        </div>
	</section>
</div>
@stop