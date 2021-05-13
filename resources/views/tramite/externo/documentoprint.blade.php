<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TRÁMITE | Documentario</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>    
    
    <script src="{{asset('js/jQuery.print.js')}}"></script> 
    
    <!-- Google Font -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

	<style>
		/*------------------------------class = "table"------------------------------------*/
		.table{
			border-collapse: collapse;
			text-align: left;
			width: 107%;    
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
			border-top-left-radius: 0;
			border-top-right-radius: 0;
			border-bottom-right-radius: 3px;
			border-bottom-left-radius: 3px;
			border-top: 1px solid #37BC89;
			padding: 10px;
			background-color: #fff;
			margin-left: 20px;
			width: 100%;
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
</head>
<body>
    <div id="myPrintArea">             	
		<!-- Main content -->
		<div class="col-md-10 col-md-offset-1">
			<div>
				<img src="{{asset('dist/img/encabezado.png')}}" width="800" height="80"  style="padding-top:-50px;">  
			</div>                                
		</div>
		<h3 class="text-center">TRÁMITE DEL DOCUMENTO N° {{str_pad($documento->iddocumento, 4, '0', STR_PAD_LEFT)}}</h3>
		<section class="content">
			<div class="row">
				<table>
					@if($documento->docu_idorigen == 1)
					<tbody>
						<tr>
							<td style="padding-left: 50px;">Registro</td>
							<td style="padding-left: 15px;" class="text-right"> :</td>
							<td style="padding-left: 15px;">{{ str_pad($documento->iddocumento, 4, '0', STR_PAD_LEFT) }}</td>
						</tr>
						<tr>
							<td style="padding-left: 50px;">Fecha de Registro</td>
							<td style="padding-left: 15px;" class="text-right"> :</td>
							<td style="padding-left: 15px;">{{date('d/m/Y', strtotime($documento->docu_fecharegistro))}}</td>
						</tr>
						<tr>
							<td style="padding-left: 50px;">Tipo de Documento</td>
							<td style="padding-left: 15px;" class="text-right"> :</td>
							<td style="padding-left: 15px;">{{$documento->gettipodocumento->tdoc_descripcion}}</td>
						</tr>
						<tr>
							<td style="padding-left: 50px;">Folios</td>
							<td style="padding-left: 15px;" class="text-right"> :</td>
							<td style="padding-left: 15px;">{{ str_pad($documento->docu_folios, 3, '0', STR_PAD_LEFT) }}</td>
						</tr>
						<tr>
							<td style="padding-left: 50px;">Unidad Orgánica</td>
							<td style="padding-left: 15px;" class="text-right"> :</td>
							<td style="padding-left: 15px;">{{$documento->getdependencia->depe_nombre}}</td>
						</tr>
						<tr>
							<td style="padding-left: 50px;">Firma</td>
							<td style="padding-left: 15px;" class="text-right"> :</td>
							<td style="padding-left: 15px;">{{$documento->docu_firma}}</td>
						</tr>
						<tr>
							<td style="padding-left: 50px;">Cargo</td>
							<td style="padding-left: 15px;" class="text-right"> :</td>
							<td style="padding-left: 15px;">{{$documento->docu_cargo}}</td>
						</tr>
						<tr>
							<td style="padding-left: 50px;">Asunto</td>
							<td style="padding-left: 15px;" class="text-right"> :</td>
							<td style="padding-left: 15px;">{{$documento->docu_asunto}}</td>
						</tr>
					</tbody>
					@elseif($documento->docu_idorigen == 2)
					<tbody>
						<tr>
							<td style="padding-left: 50px;">Registro</td>
							<td style="padding-left: 15px;" class="text-right"> :</td>
							<td style="padding-left: 15px;">{{ str_pad($documento->iddocumento, 4, '0', STR_PAD_LEFT) }}</td>
						</tr>
						<tr>
							<td style="padding-left: 50px;">Fecha de Registro</td>
							<td style="padding-left: 15px;" class="text-right"> :</td>
							<td style="padding-left: 15px;">{{date('d/m/Y', strtotime($documento->docu_fecharegistro))}}</td>
						</tr>
						<tr>
							<td style="padding-left: 50px;">Tipo de Documento</td>
							<td style="padding-left: 15px;" class="text-right"> :</td>
							<td style="padding-left: 15px;">{{$documento->gettipodocumento->tdoc_descripcion}}</td>
						</tr>
						<tr>
							<td style="padding-left: 50px;">Folios</td>
							<td style="padding-left: 15px;" class="text-right"> :</td>
							<td style="padding-left: 15px;">{{ str_pad($documento->docu_folios, 3, '0', STR_PAD_LEFT) }}</td>
						</tr>
						<tr>
							<td style="padding-left: 50px;">Entidad Externa</td>
							<td style="padding-left: 15px;" class="text-right"> :</td>
							<td style="padding-left: 15px;">{{$documento->getdependencia->depe_nombre}}</td>
						</tr>
						<tr>
							<td style="padding-left: 50px;">Nombre del Tramitante</td>
							<td style="padding-left: 15px;" class="text-right"> :</td>
							<td style="padding-left: 15px;">{{$documento->docu_ext_nombre}}</td>
						</tr>
						<tr>
							<td style="padding-left: 50px;">N° de DNI</td>
							<td style="padding-left: 15px;" class="text-right"> :</td>
							<td style="padding-left: 15px;">{{$documento->docu_ext_dni}}</td>
						</tr>
						<tr>
							<td style="padding-left: 50px;">Asunto</td>
							<td style="padding-left: 15px;" class="text-right"> :</td>
							<td style="padding-left: 15px;">{{$documento->docu_asunto}}</td>
						</tr>
					</tbody>
					@endif
				</table>
				                  
				<br><br>
				<h4 style="padding-left: 25px;"><b>Detalles del Documento</b></h4>		

				<div class="col-md-10 col-md-offset-1"><div class="box-footer1"></div></div>

				<div style="padding-left: 25px;">  
				<table class="table">
					<thead>
						<tr class="info2">
							<th class="text-center" width="10%">FECHA</th>
							<th class="text-center" width="15%">OPERACIÓN</th>
							<th class="text-center" width="15%">UNIDAD ORG.</th>
							<th class="text-center" width="15%">USUARIO</th>
							<th class="text-center" width="15%">UNIDAD DEST.</th>
							<th class="text-center" width="15%">USUARIO D.</th>
							<th class="text-center" width="15%">PROVEIDO</th>
						</tr>
					</thead>

					<tbody>
						@foreach($operacion AS $operar)
						<tr>
							<td class="text-center">{{date('d/m/Y', strtotime($operar->oper_fecha))}}</td>
							
							@if($operar->oper_idtope == 1)
								<td><span class="label label-primary">REGISTRADO</span></td>
							@elseif($operar->oper_idtope == 2)
								<td><span class="label label-success">DERIVADO</span></td>
							@elseif($operar->oper_idtope == 3)
								<td><span class="label label-warning">ADJUNTADO</span></td>
							@elseif($operar->oper_idtope == 4)
								<td><span class="label label-danger">ARCHIVADO</span></td>
							@elseif($operar->oper_idtope == 5)
								<td><span class="label label-danger">RECIBIDO</span></td>
							@elseif($operar->oper_idtope == 6)
								<td><span class="label label-danger">ATENDIDO</span></td>
							@elseif($operar->oper_idtope == 7)
								<td><span class="label label-danger">DEVUELTO</span></td>
							@elseif($operar->oper_idtope == 8)
								<td><span class="label label-info">NO DEFINIDO</span></td>
							@endif
							
							<td>{{$operar->getdependencia->depe_nombre}}</td>
							<td>{{$operar->getusuario->adm_nombre}}</td>
							
							@if($operar->oper_depeid_d != 0)
								<td>{{$operar->getdepdestino->depe_nombre}}</td>
							@else
								<td class="text-center"> - </td>
							@endif
							
							@if($operar->oper_usuid_d != 0)
								<td>{{$operar->getusudestino->adm_nombre}}</td>
							@else
								<td class="text-center"> - </td>
							@endif
							
							@if($operar->oper_idtope == 1)
								<td class="text-center"> - </td>
							@elseif($operar->oper_idtope == 2)
								<td>{{$operar->oper_detalledestino}}</td>
							@elseif($operar->oper_idtope == 3)
								@if($operar->oper_acciones != null)
								<td>{{$operar->oper_acciones}}</td>
								@else
								<td class="text-center"> - </td>
								@endif											
							@elseif($operar->oper_idtope == 4)
								@if($operar->oper_acciones != null)
								<td>{{$operar->oper_acciones}}</td>
								@else
								<td class="text-center"> - </td>
								@endif
							@elseif($operar->oper_idtope == 5)
								<td class="text-center"> - </td>
							@elseif($operar->oper_idtope == 6)
								<td class="text-center"> - </td>
							@elseif($operar->oper_idtope == 7)
								<td class="text-center"> - </td>
							@elseif($operar->oper_idtope == 8)
								<td class="text-center"> - </td>
							@endif										
						</tr>	
						@endforeach
					</tbody> 
				</table>
				</div>
			</div>
		</section>
	</div>
	
	<script type="text/javascript">
		$(document).ready(function () {
			var myCallBack = function() {window.close();};
			$('#myPrintArea').print({deferred: $.Deferred().done(myCallBack)});
		})
	</script>
</body>


</html>