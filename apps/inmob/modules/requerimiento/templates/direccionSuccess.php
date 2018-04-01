
<div class="" id="direccion_<?php echo $num; ?>">
    <div class="panel-content">
        <div class="row">
            <div style="float:left;">
                <span class="titulo_kc">UBICACIÓN <?php echo $num ?></span>
            </div>
            <div style="float:right;">
                <a class="btn btn-default btn-rounded" href="#/" onclick="menos_direccion(<?php echo $num ?>);">
                    <i class="fa fa-minus"></i>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <span class="subtitulo_kc">Departamento</span>
                <div style="text-align: center">
                    <select destino="nuevo_requerimiento_municipio_<?php echo $num; ?>" class="form-control velLlenaSelect col-md-12" url="<?php echo sfContext::getInstance()->getController()->genUrl("soporte/departamento") ?>" name="nuevo_requerimiento[departamento_<?php echo $num; ?>]" id="nuevo_requerimiento_departamento_<?php echo $num; ?>">
                        <option value="1">Alta Verapaz</option>
                        <option value="2">Baja Verapaz</option>
                        <option value="3">Chimaltenango</option>
                        <option value="4">Chiquimula</option>
                        <option value="5">El Progreso</option>
                        <option value="6">Escuintla</option>
                        <option value="7">Guatemala</option>
                        <option value="8">Huehuetenango</option>
                        <option value="9">Izabal</option>
                        <option value="10">Jutiapa</option>
                        <option value="11">Petén</option>
                        <option value="12">Quetzaltenango</option>
                        <option value="13">Quiché</option>
                        <option value="14">Retalhuleu</option>
                        <option value="15">Sacatepéquez</option>
                        <option value="16">San Marcos</option>
                        <option value="17">Santa Rosa</option>
                        <option value="18">Sololá</option>
                        <option value="19">Suchitepéquez</option>
                        <option value="20">Totonicapán</option>
                        <option value="21">Zacapa</option>
                    </select>                                </div>
            </div>
            <div class="col-md-2">
                <span class="subtitulo_kc">Municipio</span>
                <div style="text-align: center">
                    <select class="form-control col-md-12" name="nuevo_requerimiento[municipio_<?php echo $num; ?>]" id="nuevo_requerimiento_municipio_<?php echo $num; ?>">

                    </select>                                
                </div>
            </div>
            <div class="col-md-2">
                <span class="subtitulo_kc">Zona</span>
                <div style="text-align: center">
                    <input class="form-control" name="nuevo_requerimiento[zona_<?php echo $num; ?>]" id="nuevo_requerimiento_zona_<?php echo $num; ?>" type="text">                                </div>
            </div>
            <div class="col-md-2">
                <span class="subtitulo_kc">KM.</span>
                <div style="text-align: center">
                    <select class="form-control col-md-10" name="nuevo_requerimiento[km_<?php echo $num; ?>]" id="nuevo_requerimiento_km_<?php echo $num; ?>">
                        <option value="" selected="selected">[Seleccione KM]</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                    </select>                                </div>
            </div>
            <div class="col-md-4">
                <span class="subtitulo_kc">Carretera</span>
                <div style="text-align: center">
                    <select class="form-control col-md-10" name="nuevo_requerimiento[carretera_<?php echo $num; ?>]" id="nuevo_requerimiento_carretera_<?php echo $num; ?>">
                        <option value="" selected="selected">[Seleccione Carretera]</option>
                        <option value="1">Aguilar Batres</option>
                        <option value="2">CA9</option>
                        <option value="3">CA1</option>
                        <option value="4">Roosevelt</option>
                    </select>                                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <span class="subtitulo_kc">Dirección</span>
                <div style="text-align: center">
                    <input class="form-control" name="nuevo_requerimiento[direccion_<?php echo $num; ?>]" id="nuevo_requerimiento_direccion_<?php echo $num; ?>" type="text">                                </div>
            </div>
        </div>
    </div>
</div>