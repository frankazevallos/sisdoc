@extends('layouts.admin') 
@section('contenido')
<style>
	.bg-navy {
		background-color: #FA5882 !important;
	}
	
	.bg-purple {
		background-color: #8D60B9 !important;
	}
</style>
<section class="content">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <!--<div class="box box-success">
                <div class="box-header with-border">
                    -->
					<h4 class="box-title text-center"><b>TRÁMITE DOCUMENTARIO</b></h4>
                    <section class="content">
                        <div class="row">
                            <!-- ./col -->
                            
                            <div class="col-lg-4 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-green bdocumentos" data-href="{{url('tramite/documentos/enproceso/create')}}">
                                    <div class="inner">
                                        <h3>NUEVO</h3>
                                        <p>Documento</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-compose"></i>
                                    </div>
                                    <a href="{{url('tramite/documentos/enproceso/create')}}" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            
                            
                            @if(Auth::user()->adm_iddependencia != '2')
                            <div class="col-lg-4 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-primary bdocumentos" data-href="{{url('tramite/documentos/porrecibir')}}">
                                    <div class="inner">
                                        <h3>RECIBIR</h3>
                                        <p>Documentos</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-email"></i>
                                    </div>
                                    <a href="{{url('tramite/documentos/porrecibir')}}" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            @elseif(Auth::user()->adm_tipousuario != '2')
                            <div class="col-lg-4 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-primary bdocumentos" data-href="{{url('tramite/documentos/porrecibir')}}">
                                    <div class="inner">
                                        <h3>RECIBIR</h3>
                                        <p>Documentos</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-email"></i>
                                    </div>
                                    <a href="{{url('tramite/documentos/porrecibir')}}" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            @endif
                            <div class="col-lg-4 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-teal bdocumentos" data-href="{{url('tramite/documentos')}}">
                                    <div class="inner">
                                        <h3>EXP.</h3>
                                        <p>Documentos</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-document"></i>
                                    </div>
                                    <a href="{{url('tramite/documentos')}}" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-red bbuscar" data-href="{{url('tramite/buscar')}}">
                                    <div class="inner">
                                        <h3>BUSCAR</h3>
                                        <p>Documentos</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-search"></i>
                                    </div>
                                    <a href="{{url('tramite/buscar')}}" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-4 col-xs-6">
                                
                                <div class="small-box bg-navy breporte" data-href="{{url('tramite/reportes')}}">
                                    <div class="inner">
                                        <h3>REPORTE</h3>
                                        <p>Reportes</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-android-print"></i>
                                    </div>
                                    <a href="{{url('tramite/reportes')}}" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>                           
                            <!-- ./col -->
                            <div class="col-lg-4 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-orange bcatalogos" data-href="{{url('tramite/catalogos')}}">
                                    <div class="inner">
                                        <h3>ADD.</h3>
                                        <p>Catálogos</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-clipboard"></i>
                                    </div>
                                    <a href="{{url('tramite/catalogos')}}" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            @if(Auth::user()->idadmin == 1)
                            <div class="col-lg-4 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-purple badministracion" data-href="{{url('tramite/administracion')}}">
                                    <div class="inner">
                                        <h3>ADMIN.</h3>
                                        <p>Administración</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-gear"></i>
                                    </div>
                                    <a href="{{url('tramite/administracion')}}" class="small-box-footer">Más Información<i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            @endif
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->
                    </section>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!--Contenido-->
                            <!--Fin Contenido-->
                        </div>
                    </div>
                </div>
            <!--</div>
        </div>-->
    </div>
    <!-- /.box -->
</section>
<script>
	$(".bbuscar").click(function() {
		window.location = $(this).attr("data-href");
	});
	$(".breporte").click(function() {
		window.location = $(this).attr("data-href");
	});
	$(".bdocumentos").click(function() {
		window.location = $(this).attr("data-href");
	});
	$(".bcatalogos").click(function() {
		window.location = $(this).attr("data-href");
	});
	$(".badministracion").click(function() {
		window.location = $(this).attr("data-href");
	});
</script>
@stop
