@extends('layouts.admin') @section('contenido') {{csrf_field()}}
<!-- Content Wrapper. Contains page content -->
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
    
    .pagination>.active>a,
    .pagination>.active>a:focus,
    .pagination>.active>a:hover,
    .pagination>.active>span,
    .pagination>.active>span:focus,
    .pagination>.active>span:hover {
        z-index: 2;
        color: #fff;
        cursor: default;
        background-color: #4FA961;
        border-color: #4FA961;
    }
    
    .table>thead>tr>th,
    .table>tbody>tr>th,
    .table>tfoot>tr>th,
    .table>thead>tr>td,
    .table>tbody>tr>td,
    .table>tfoot>tr>td {
        font-size: 11px;
    }
    
    .ver {
        font-size: 13px;
    }
</style>
<div class="content" id="example">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        	<i class="fa fa-file-text"> </i>
            En Proceso
        </h1>
        <ol class="breadcrumb">
            <li><a class="text-green" href="{{url('tramite')}}"><i class="fa fa-dashboard"></i> Trámite</a></li>
            <li><a class="text-green" href="{{url('tramite/documentos/')}}">Documentos</a></li>
            <li class="active">Atención</li>
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
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <i class="fa fa-check-square-o"></i>

                        <h3 class="box-title">El Documento fue Guardado Satisfactoriamente.</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">                        
                        <table>
                        	<thead>
                        		<tr>
                        			<td style="padding: 3px;" class="col-sm-4">
                        				<label for="">1. Código del Documento: </label>
                        			</td>
                        			<td style="padding: 3px;" class="col-sm-4">
                        				<input type="text" class="form-control">
                        			</td>
                        			<td style="padding: 3px;" class="pull-right col-sm-4">
                        				<a href="{{url('tramite/documentos')}}">
										<button type="button" class="btn btn-success pull-left"><i class="fa fa-external-link-square"></i> Derivar</button></a>
                        			</td>
                        		</tr>
                        		<tr>
                        			<td style="padding: 3px;" class="col-sm-4">
                        				<label for="">2. Código del Expediente: </label>
                        			</td>
                        			<td style="padding: 3px;" class="col-sm-4">
                        				<input type="text" class="form-control">
                        			</td>
                        			<td style="padding: 3px;" class="pull-right col-sm-4">
                        				<a href="{{url('tramite/documentos')}}">
										<button type="button" class="btn btn-primary pull-left"><i class="fa fa-search"></i> Buscar En Proceso</button></a>
                        			</td>
                        		</tr>
                        	</thead>
                        </table>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
</div>
<!-- page script -->
<script>    

    $('#example').on('click', '.verpdf', function(e) {
        e.preventDefault();
        rute = '{{url('
        liquidacionprint / % s ')}}';
        window.open(rute.replace(/%s/g, $(this).data('id')));
    });
</script>
@stop