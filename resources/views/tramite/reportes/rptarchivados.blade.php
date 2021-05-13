@extends('layouts.admin')
<meta name="csrf-token" content="{{ csrf_token() }}"> 
@section('contenido') {{csrf_field()}}

	<style>
		/*------------------------------class = "table"------------------------------------*/
		.table{
			border-collapse: collapse;
			text-align: left;
			width: 100%;    
			background: #fff;
			border-top: 1px solid #DDDDDD; 
			border-bottom: 1px solid #DDDDDD; 
			margin-bottom: 10px;
		}

		.table thead th {    
			color: #333333;  
			padding-top: 6px;
			padding-bottom: 6px;
			padding-left: 3px;
			padding-right: 3px;
			font-size: 11px;
			font-weight: bold;
			border-bottom: 2px solid #DDDDDD;  
		}

		.table tbody td {
			color: #333333;    
			padding-top: 2px;
			padding-bottom: 2px;
			padding-left: 3px;
			padding-right: 3px;
			font-size: 11px;  
			font-weight: normal;  
			border-top: 1px solid #DDDDDD; 
			border-bottom: 1px solid #DDDDDD;  
		}
		/*------------------------------class = "table"------------------------------------*/
		
		.box-footer1 {
			border-top: 1px solid #37BC89;
		}

		.box-footer2 {
			border-top: 1px solid #C2E1D5;
		}
				
		.info2 {
            background-color: #69C57B;
            color: white;
        }
        
        .info2 th {
            background-color: #69C57B;
            color: white;
        }
        
        .info2 td {
            background-color: #69C57B;
            color: white;
        }
		
		.text-center > thead > tr >th,
        .text-center > tbody > tr >td,
        .text-center > tfoot > tr >td {
            text-align: center;
        }
        
        .text-center {
            text-align: center;
        }
        
        .text-right > thead > tr >th,
        .text-right > tbody > tr >td,
        .text-right > tfoot > tr >td {
            text-align: right;
        }
        
        .text-right {
            text-align: right;
        }
        
        .text-left > thead > tr >th,
        .text-left > tbody > tr >td,
        .text-left > tfoot > tr >td {
            text-align: left;
        }
        
        .text-left {
            text-align: left;
        }
	</style>
<div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        	<i class="fa fa-bar-chart"> </i>
            Reportes
        </h1>
        <ol class="breadcrumb">
            <li><a class="text-green" href="{{url('tramite')}}"><i class="fa fa-dashboard"></i> Trámite</a></li>
            <li><a class="active">Reportes</a></li>            
        </ol><br>
    </section>  
    <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title"><b>Reporte Generado: Documentos Archivados</b></h3>
				</div> 
				<div id="pagina" style="background-color: white;">    
					<style>
					/*------------------------------class = "table"------------------------------------*/
					.table{
						border-collapse: collapse;
						text-align: left;
						width: 100%;    
						background: #fff;
						border-top: 1px solid #DDDDDD; 
						border-bottom: 1px solid #DDDDDD; 
						margin-bottom: 10px;
					}

					.table thead th {    
						color: #333333;  
						padding-top: 6px;
						padding-bottom: 6px;
						padding-left: 3px;
						padding-right: 3px;
						font-size: 11px;
						font-weight: bold;
						border-bottom: 2px solid #DDDDDD;  
					}

					.table tbody td {
						color: #333333;    
						padding-top: 2px;
						padding-bottom: 2px;
						padding-left: 3px;
						padding-right: 3px;
						font-size: 11px;  
						font-weight: normal;  
						border-top: 1px solid #DDDDDD; 
						border-bottom: 1px solid #DDDDDD;  
					}
					/*------------------------------class = "table"------------------------------------*/


					.info2 {
						background-color: #69C57B;
						color: white;
					}

					.info2 th {
						background-color: #69C57B;
						color: white;
					}

					.info2 td {
						background-color: #69C57B;
						color: white;
					}

					.text-center > thead > tr >th,
					.text-center > tbody > tr >td,
					.text-center > tfoot > tr >td {
						text-align: center;
					}

					.text-center {
						text-align: center;
					}

					.text-right > thead > tr >th,
					.text-right > tbody > tr >td,
					.text-right > tfoot > tr >td {
						text-align: right;
					}

					.text-right {
						text-align: right;
					}

					.text-left > thead > tr >th,
					.text-left > tbody > tr >td,
					.text-left > tfoot > tr >td {
						text-align: left;
					}

					.text-left {
						text-align: left;
					}
				</style>         	
					<!-- Main content -->
					<div class="col-md-10 col-md-offset-1">
						<div>
							<img src="{{asset('dist/img/encabezado.png')}}" width="800" height="80"  style="padding-top:-50px;">  
						</div>                                
					</div>
					<h3 class="text-center">REPORTE | DOCUMENTOS ARCHIVADOS</h2>
					<section class="content">
						<div class="row">	

							<div>  
							<table class="table">
								<thead>
									<tr class="info2">
										<th class="text-center">REGISTRO</th>
										<th class="text-center">FECHA</th>
										<th class="text-center">DOCUMENTO</th>
										<th class="text-center">OFICINA</th>
										<th class="text-center">ARCHIVADOR</th>
										<th class="text-center">ASUNTO</th>
									</tr>
								</thead>

								<tbody>
									@foreach($archivados AS $archivado)
									<tr class="text-center">
										<td>{{str_pad($archivado->oper_iddocumento, 4, '0', STR_PAD_LEFT)}}</td>	
										<td>{{ date('d/m/Y', strtotime($archivado->oper_fecha)) }}</td>
										<td>{{$archivado->getdocumento->gettipodocumento->tdoc_abreviado}} / {{str_pad($archivado->getdocumento->docu_numero_doc, '3', '0', STR_PAD_LEFT)}} / {{ date('Y', strtotime($archivado->getdocumento->docu_fecharegistro)) }} / {{$archivado->getdocumento->docu_siglas_doc}}</td>
										<td>{{$archivado->getdependencia->depe_nombre}}</td>
										<td>{{$archivado->getarchivador->arch_periodo}} / {{$archivado->getarchivador->arch_nombre}}</td>
										<td>{{$archivado->getdocumento->docu_asunto}}</td>	
									</tr>	
									@endforeach
								</tbody> 
							</table>
							</div>
						</div>
					</section>
				</div>
				
					<div class="box-footer box-footer1">
						<a href="{{url('tramite/reportes')}}" class="btn btn-default"><i class="fa fa-exchange"></i> Volver</a>
						<a class="btn btn-primary btn-flat pull-right" onclick="imprimir();"><i class="fa fa-print"></i> Imprimir</a>
					</div>
				
			</div>
		</div>
	</div>
</div>	
<script src="{{asset('js/jQuery.print.js')}}"></script> 
<script type="text/javascript">	
	function imprimir(){
	  var objeto=document.getElementById('pagina');  //obtenemos el objeto a imprimir
	  var ventana=window.open('','_blank');  //abrimos una ventana vacía nueva
	  ventana.document.write(objeto.innerHTML);  //imprimimos el HTML del objeto en la nueva ventana
	  ventana.document.close();  //cerramos el documento
	  ventana.print();  //imprimimos la ventana
	  ventana.close();  //cerramos la ventana
	}
</script>
	
@stop