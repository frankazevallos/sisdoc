@extends('layouts.admin') @section('contenido')
<div class="content">
    <section class="content-header">
        <h1><i class="ion ion-clipboard"></i>
			Catálogos
			<!--<small>Version 1.0</small>-->
		</h1>
        <ol class="breadcrumb">
            <li><a class="text-green" href="{{url('tramite')}}"><i class="fa fa-dashboard"></i> tramite</a></li>
            <li class="active">Ctálogos</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="box-body">
                <!-- Info Boxes Style 2 -->
                <div class="col-sm-6">
                    <a href="{{url('tramite/catalogos/archivadores')}}">
                    <div class="info-box bg-light-blue">
                        <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Catálogo</span>
                            <span class="info-box-number">Archivadores</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 50%"></div>
                            </div>
                        </div>
                        <!-- /.info-box-content -->
                    </div></a>
                    <!-- /.info-box -->
                </div>
                @if(Auth::user()->idadmin == 1)
                <div class="col-sm-6">
                    <!-- /.info-box -->
                    <a href="{{url('tramite/catalogos/tipodocumentos')}}">
                    <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="ion ion-ios-paper-outline"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Catálogos</span>
                            <span class="info-box-number">Tipos de Documentos</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 20%"></div>
                            </div>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    </a>
                    <!-- /.info-box -->
                </div>
                @endif
                <!-- <div class="col-sm-6">
                    <a href="{{url('tramite/catalogos/formarecepcion')}}">
                    <div class="info-box bg-red">
                        <span class="info-box-icon"><i class="ion ion-ios-albums-outline"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Catálogo</span>
                            <span class="info-box-number">Formas de Recepción</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div> -->
                @if(Auth::user()->idadmin == 1)
                <div class="col-sm-6">
                    <!-- /.info-box -->
                    <a href="{{url('tramite/catalogos/tipoprioridad')}}">
                    <div class="info-box bg-yellow">
                        <span class="info-box-icon"><i class="ion-android-options"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Catálogo</span>
                            <span class="info-box-number">Tipos de Prioridades</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 10%"></div>
                            </div>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    </a>
                    <!-- /.info-box -->
                </div>
                @endif
            </div>
        </div>
	</section>
</div>
@stop