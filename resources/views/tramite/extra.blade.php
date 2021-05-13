@extends('layouts.admin') 
@section('contenido')

<section class="content-header">
    <h1>
        <b> Buscar Documento </b>           
    </h1>    
</section>

<!-- Main content -->
<section class="content">
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <!-- The time line -->
            <ul class="timeline">
                <!-- timeline time label -->
                <li class="time-label">
                    <span class="bg-red">
                    Registro
                  </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                    <i class="fa fa-asterisk bg-red"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                        <h3 class="timeline-header text-red"><b> Fecha del Documento</b></h3>
                        <div class="timeline-body">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" id="">
                            </div><!-- /.input group -->
                        </div>
                    </div>
                </li>
                <!-- END timeline item -->
                
                <!-- timeline time label -->
                <li class="time-label">
                    <span class="bg-green">
                    Origen
                  </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                    <i class="fa fa-users bg-green"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>
                        <h3 class="timeline-header text-green"><b> Origen del Documento</b></h3>
                        <div class="timeline-body">
                            <label>Origen</label>
                            <!-- radio -->
                            <div class="form-group">
                                <label class="radio-inline">
                                  <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                  Interno
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                  Externo
                                </label>
                            </div>
                            
                            <label>Unidad Orgánica</label>
                            <select class="form-control" id="select2">
                                <option>Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                            
                            <label>Firma</label>
                            <input type="text" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                </li>
                <!-- END timeline item -->
                
                <!-- timeline time label -->
                <li class="time-label">
                    <span class="bg-blue">
                    Datos
                  </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                    <i class="fa fa-navicon bg-blue"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>
                        <h3 class="timeline-header text-blue"><b> Datos Generales de Documento</b></h3>
                        <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                        </div>
                    </div>
                </li>
                <!-- END timeline item -->
            </ul>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->
<script type="text/javascript">
    $(".autocompletar").select2();
</script>

@stop