@extends('layouts.admin') @section('contenido')
<div class="content">
    <section class="content-header">
        <h1><i class="fa fa-file"></i>
			Documentos
			<!--<small>Version 1.0</small>-->
		</h1>
        <ol class="breadcrumb">
            <li><a class="text-green" href="{{url('tramite')}}"><i class="fa fa-dashboard"></i> Tramite</a></li>
            <li class="active">Documentos</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="box-body">
                <!-- Info Boxes Style 2 -->
                
                <div class="col-sm-6">
                    <a href="{{url('tramite/documentos/enproceso')}}">
                        <div class="info-box bg-light-blue">
                            <span class="info-box-icon"><i class="fa fa-file-text"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Documentos</span>
                                <span class="info-box-number">En Proceso</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 45%"></div>
                                </div>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>

                @if(Auth::user()->adm_iddependencia != '2')
                <div class="col-sm-6">
                    <!-- /.info-box -->
                    <a href="{{url('tramite/documentos/porrecibir')}}">
                        <div class="info-box bg-orange">
                            <span class="info-box-icon"><i class="fa fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Documentos</span>
                                <span class="info-box-number">Por Recibir</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 40%"></div>
                                </div>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>
                <div class="col-sm-6">
                    <!-- /.info-box -->
                    <a href="{{url('tramite/documentos/recibidos')}}">
                        <div class="info-box bg-yellow">
                            <span class="info-box-icon"><i class="fa fa-envelope-open"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Documentos</span>
                                <span class="info-box-number">Recibidos</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 90%"></div>
                                </div>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>
                @elseif(Auth::user()->adm_tipousuario != '2')
                <div class="col-sm-6">
                    <!-- /.info-box -->
                    <a href="{{url('tramite/documentos/porrecibir')}}">
                        <div class="info-box bg-orange">
                            <span class="info-box-icon"><i class="fa fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Documentos</span>
                                <span class="info-box-number">Por Recibir</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 40%"></div>
                                </div>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>
                <div class="col-sm-6">
                    <!-- /.info-box -->
                    <a href="{{url('tramite/documentos/recibidos')}}">
                        <div class="info-box bg-yellow">
                            <span class="info-box-icon"><i class="fa fa-envelope-open"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Documentos</span>
                                <span class="info-box-number">Recibidos</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 90%"></div>
                                </div>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>
                @endif

                <div class="col-sm-6">
                    <a href="{{url('tramite/documentos/derivados')}}">
                        <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="fa fa-check"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Documentos</span>
                                <span class="info-box-number">Derivados</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 80%"></div>
                                </div>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>

                @if(Auth::user()->adm_iddependencia != '2')
                <div class="col-sm-6">
                    <a href="{{url('tramite/documentos/atendidos')}}">
                        <div class="info-box bg-purple">
                            <span class="info-box-icon"><i class="fa fa-folder-open"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Documentos</span>
                                <span class="info-box-number">Atendidos</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 80%"></div>
                                </div>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>
                @elseif(Auth::user()->adm_tipousuario != '2')
                <div class="col-sm-6">
                    <a href="{{url('tramite/documentos/atendidos')}}">
                        <div class="info-box bg-purple">
                            <span class="info-box-icon"><i class="fa fa-folder-open"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Documentos</span>
                                <span class="info-box-number">Atendidos</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 80%"></div>
                                </div>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>
                @endif
                
                <div class="col-sm-6">
                    <!-- /.info-box -->
                    <a href="{{url('tramite/documentos/archivados')}}">
                        <div class="info-box bg-red">
                            <span class="info-box-icon"><i class="fa fa-file-archive-o"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Documentos</span>
                                <span class="info-box-number">Archivados</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 30%"></div>
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