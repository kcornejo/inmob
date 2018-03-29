<?php
$requerimiento_compra = $sf_data->getRaw('requerimiento_compra');
$requerimiento_renta = $sf_data->getRaw('requerimiento_renta');
$propiedad_renta = $sf_data->getRaw('propiedad_renta');
$propiedad_venta = $sf_data->getRaw('propiedad_venta');
?> 
<div class="row">
    <div class="col-md-12">
        <table  style="width:100%; margin-top: -10px;">
            <tr>
                <td style="width:33%">
                    <h3>
                        Total en Comisiones
                    </h3>
                </td>
                <td  style="width:33%">
                    <font style="color:#6480AB;">
            <center>
                <b><?php echo Negocio::getTotalComisiones(); ?></b>
            </center>
            </font>
            </td>
            <td  style="width:33%">
                <h5 style="text-align: center;">
                    <select id="listado_req" style="float:right;">
                        <option value="TODO">TODO</option>
                        <option value="RO">Requerimiento de Compra</option>
                        <option value="RR">Requerimiento de Renta</option>
                        <option value="PV">Propiedades en Venta</option>
                        <option value="PR">Propiedades en Renta</option>
                    </select>
                </h5>
            </td>
            </tr>
        </table>
    </div>
    <div class="panel-content">
        <br/>
        <div class="panel panel_ocultar" id="RO">
            <div class="panel-header">
                <div>
                    <h5>
                        REQUERIMIENTOS DE COMPRA
                        <span style="float:right;color:#6480AB">
                            <b>
                                <?php echo Negocio::getComisionRequerimientoCompra() ?>
                            </b>
                        </span>
                    </h5>
                </div>
            </div>
            <div class="panel-content">
                <div class="row">
                    <?php foreach ($requerimiento_compra as $fila): ?>
                        <div class="col-md-2">
                            <div style=";background-color:#f1f3f3; text-align: center;<?php if (!$fila->getVisto()): ?>border-left: 6px solid #25d366;<?php endif; ?>">
                                <img style="max-height: 100px" src="<?php echo $fila->getDireccionImagen() ?>"/>
                            </div>
                        </div>
                        <div class="col-md-7">
                            REQ<?php echo $fila->getId() ?>
                            |
                            Comprar <?php echo $fila->getTipoInmueble(); ?>
                            |
                            Presupuesto: 
                            <b><?php echo $fila->getMoneda()->getCodigo() ?></b>
                            <?php echo number_format($fila->getPresupuestoMin(), 0) . '-' . number_format($fila->getPresupuestoMax(), 0) ?>
                            |
                            Comisión máx: <b><?php echo $fila->getMaximaComision() ?></b>
                            <br/><br/>
                            <div class="col-md-5 col-xs-12 col-sm-12">
                                <table class="" style="padding: 0;width:100%">
                                    <tr>
                                        <td style="padding: 0;">
                                            <b><?php echo $fila->getArea() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Area-01.png"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <b><?php echo $fila->getNiveles() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Niveles-01.png"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <b><?php echo $fila->getCantidadHabitacion() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <b><?php echo $fila->getCantidadParqueo() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Parqueos-01.png"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <b><?php echo $fila->getCantidadBanio() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Baños-01.png"/>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <br/><br/>
                            <?php
                            echo substr($fila->getDireccionCompleta(), 0, 70);
                            if (strlen($fila->getDireccionCompleta()) > 70) {
                                echo "...";
                            }
                            ?>
                        </div>
                        <div class="col-md-3">
                            <div class="dropdown" style="float:right;">
                                <a style="text-decoration: none;cursor:pointer;" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="glyphicon glyphicon-option-vertical"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                    <li>
                                        <a href="<?php echo url_for('requerimiento/editar') . "?id=" . $fila->getId() ?>">
                                            Editar
                                        </a>
                                        <a onclick="if (confirm('Esta seguro de querer eliminar este requerimiento?') == true) {
                                                        location.replace('<?php echo url_for("soporte/estatusRequerimiento") . "?id=" . $fila->getId() . "&valor=Eliminado" ?>');
                                                    }" href="#">
                                            Eliminar
                                        </a>
                                        <?php if ($fila->getEstatus() == "Disponible"): ?>
                                            <a href="<?php echo url_for("soporte/estatusRequerimiento") . "?id=" . $fila->getId() . "&valor=Vendido" ?>">
                                                Vendido!
                                            </a>
                                        <?php else: ?>
                                            <a href="<?php echo url_for("soporte/estatusRequerimiento") . "?id=" . $fila->getId() . "&valor=Disponible" ?>">
                                                Disponible!
                                            </a>
                                        <?php endif; ?>
                                        <a href="<?php echo url_for('requerimiento/visualizar') . "?id=" . $fila->getId() ?>">
                                            Visualizar
                                        </a>
                                        <a onclick="copiar('<?php echo url_for('requerimiento/compartir', true) . "?id=" . $fila->getId() ?>')" href="javascript:void();">
                                            Compartir
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <font style="color:#8f9195;">
                            <br/><br/>
                            Mensajes sin Leer: <?php echo sizeof($fila->getCantidadMensajesSinLeer()) ?>
                            <?php if (sizeof($fila->getCantidadMensajesSinLeer()) > 0): ?>
                                <a class="collapsed btn btn-xs" style="color:white;background-color:#305da7;border-radius: 10px;" data-toggle="collapse" data-parent="#accordion" href="#rc<?php echo $fila->getId() ?>" >
                                    Ver Mensajes
                                </a>
                            <?php endif; ?>
                            <br/><br/>
                            Negocios Disponibles: <?php echo sizeof($fila->getNegociosDisponibles()); ?> 
                            <?php if (sizeof($fila->getNegociosDisponibles()) > 0): ?>
                                <a class="collapsed btn btn-xs" style="color:white;background-color:#25d366;border-radius: 10px;" data-toggle="collapse" data-parent="#accordion" href="#rc<?php echo $fila->getId() ?>" >
                                    Ver Negocios
                                </a>
                            <?php endif; ?>
                            </font>
                        </div>
                        <div id="rc<?php echo $fila->getId() ?>" class="panel-collapse collapse">
                            <div class="panel-body" style="max-height:500px; overflow-x: hidden;background:#F7F7F7;">
                                <?php include_partial('negocio/detalle', array('requerimiento_id' => $fila->getId())) ?>
                            </div>
                        </div>
                        <div class="col-md-12"><hr/></div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="panel panel_ocultar" id="RR">
            <div class="panel-header">
                <h5>
                    REQUERIMIENTOS DE RENTA
                    <span style="float:right;color:#6480AB">
                        <b>
                            <?php echo Negocio::getComisionRequerimientoVenta() ?>
                        </b>
                    </span>
                </h5>
            </div>
            <div class="panel-content">
                <div class="row">
                    <?php foreach ($requerimiento_renta as $fila): ?>
                        <div class="col-md-2">
                            <div style=";background-color:#f1f3f3; text-align: center;<?php if (!$fila->getVisto()): ?>border-left: 6px solid #25d366;<?php endif; ?>">
                                <img style="max-height: 100px" src="<?php echo $fila->getDireccionImagen() ?>"/>
                            </div>
                        </div>
                        <div class="col-md-7">
                            REQ<?php echo $fila->getId() ?>
                            |
                            Rentar <?php echo $fila->getTipoInmueble(); ?>
                            |
                            Presupuesto: 
                            <b><?php echo $fila->getMoneda()->getCodigo() ?></b>
                            <?php echo number_format($fila->getPresupuestoMin(), 0) . '-' . number_format($fila->getPresupuestoMax(), 0) ?>
                            |
                            Comisión máx: <b><?php echo $fila->getMaximaComision() ?></b>
                            <br/><br/>
                            <div class="col-md-5 col-xs-12 col-sm-12">
                                <table class="" style="padding: 0;width:100%">
                                    <tr>
                                        <td style="padding: 0;">
                                            <b><?php echo $fila->getArea() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Area-01.png"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <b><?php echo $fila->getNiveles() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Niveles-01.png"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <b><?php echo $fila->getCantidadHabitacion() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <b><?php echo $fila->getCantidadParqueo() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Parqueos-01.png"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <b><?php echo $fila->getCantidadBanio() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Baños-01.png"/>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <br/><br/>
                            <?php
                            echo substr($fila->getDireccionCompleta(), 0, 70);
                            if (strlen($fila->getDireccionCompleta()) > 70) {
                                echo "...";
                            }
                            ?>
                        </div>
                        <div class="col-md-3">
                            <div class="dropdown" style="float:right;">
                                <a style="text-decoration: none;cursor:pointer;" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="glyphicon glyphicon-option-vertical"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                    <li>
                                        <a href="<?php echo url_for('requerimiento/editar') . "?id=" . $fila->getId() ?>">
                                            Editar
                                        </a>
                                        <a onclick="if (confirm('Esta seguro de querer eliminar este requerimiento?') == true) {
                                                        location.replace('<?php echo url_for("soporte/estatusRequerimiento") . "?id=" . $fila->getId() . "&valor=Eliminado" ?>');
                                                    }" href="#">
                                            Eliminar
                                        </a>
                                        <?php if ($fila->getEstatus() == "Disponible"): ?>
                                            <a href="<?php echo url_for("soporte/estatusRequerimiento") . "?id=" . $fila->getId() . "&valor=Vendido" ?>">
                                                Vendido!
                                            </a>
                                        <?php else: ?>
                                            <a href="<?php echo url_for("soporte/estatusRequerimiento") . "?id=" . $fila->getId() . "&valor=Disponible" ?>">
                                                Disponible!
                                            </a>
                                        <?php endif; ?>
                                        <a href="<?php echo url_for('requerimiento/visualizar') . "?id=" . $fila->getId() ?>">
                                            Visualizar
                                        </a>
                                        <a onclick="copiar('<?php echo url_for('requerimiento/compartir', true) . "?id=" . $fila->getId() ?>')" href="javascript:void();">
                                            Compartir
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <font style="color:#8f9195;">
                            <br/><br/>
                            Mensajes sin Leer: <?php echo sizeof($fila->getCantidadMensajesSinLeer()) ?>
                            <?php if (sizeof($fila->getCantidadMensajesSinLeer()) > 0): ?>
                                <a class="collapsed btn btn-xs" style="color:white;background-color:#305da7;border-radius: 10px;" data-toggle="collapse" data-parent="#accordion" href="#rr<?php echo $fila->getId() ?>" >
                                    Ver Mensajes
                                </a>
                            <?php endif; ?>
                            <br/><br/>
                            Negocios Disponibles: <?php echo sizeof($fila->getNegociosDisponibles()); ?>
                            <?php if (sizeof($fila->getNegociosDisponibles()) > 0): ?>
                                <a class="collapsed btn btn-xs" style="color:white;background-color:#25d366;border-radius: 10px;" data-toggle="collapse" data-parent="#accordion" href="#rr<?php echo $fila->getId() ?>" >
                                    Ver Negocios
                                </a>
                            <?php endif; ?>
                            </font>
                        </div>
                        <div id="rr<?php echo $fila->getId() ?>" class="panel-collapse collapse">
                            <div class="panel-body" style="max-height:500px; overflow-x: hidden;background:#F7F7F7;">
                                <?php include_partial('negocio/detalle', array('requerimiento_id' => $fila->getId())) ?>
                            </div>
                        </div>
                        <div class="col-md-12"><hr/></div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="panel panel_ocultar" id="PV">
            <div class="panel-header">
                <h5>
                    PROPIEDADES EN VENTA
                    <span style="float:right;color:#6480AB">
                        <b>
                            <?php echo Negocio::getComisionPropiedadVenta() ?>
                        </b>
                    </span>
                </h5>
            </div>
            <div class="panel-content">
                <div class="row">
                    <?php foreach ($propiedad_venta as $fila): ?>
                        <div class="col-md-2">
                            <div style=";background-color:#f1f3f3; text-align: center;<?php if (!$fila->getVisto()): ?>border-left: 6px solid #25d366;<?php endif; ?>">
                                <?php foreach ($fila->getPropiedadImagens() as $img): ?>
                                    <img style="max-height: 100px" src="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $img->getNombreActual() ?>"/>
                                    <?php break; ?>
                                <?php endforeach; ?>
                                <?php if (sizeof($fila->getPropiedadImagens()) == 0): ?>
                                    <div style=";background-color:#f1f3f3; text-align: center;">
                                        <img style="max-height: 100px" src="<?php echo $fila->getDireccionImagen() ?>"/>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-7">
                            PROP<?php echo $fila->getId() ?>
                            |
                            Vender <?php echo $fila->getTipoInmueble(); ?>
                            |
                            Precio: 
                            <b><?php echo $fila->getMoneda()->getCodigo() ?></b>
                            <?php echo number_format($fila->getPrecio(), 0) ?>
                            |
                            Comisión máx: <b><?php echo $fila->getMaximaComision() ?></b>
                            <br/><br/>
                            <div class="col-md-5 col-xs-12 col-sm-12">
                                <table class="" style="padding: 0;width:100%">
                                    <tr>
                                        <td style="padding: 0;">
                                            <b><?php echo $fila->getArea() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Area-01.png"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <b><?php echo $fila->getNiveles() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Niveles-01.png"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <b><?php echo $fila->getCantidadHabitacion() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <b><?php echo $fila->getCantidadParqueo() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Parqueos-01.png"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <b><?php echo $fila->getCantidadBanio() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Baños-01.png"/>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <br/><br/>
                            <?php
                            echo substr($fila->getDireccionCompleta(), 0, 70);
                            if (strlen($fila->getDireccionCompleta()) > 70) {
                                echo "...";
                            }
                            ?>
                        </div>
                        <div class="col-md-3">
                            <div class="dropdown" style="float:right;">
                                <a style="text-decoration: none;cursor:pointer;" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="glyphicon glyphicon-option-vertical"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                    <li>
                                        <a href="<?php echo url_for('vender/editar') . "?id=" . $fila->getId() ?>">
                                            Editar
                                        </a>
                                        <a onclick="if (confirm('Esta seguro de querer eliminar esta propiedad?') == true) {
                                                        location.replace('<?php echo url_for("soporte/estatusPropiedad") . "?id=" . $fila->getId() . "&valor=Eliminado" ?>');
                                                    }" href="#">
                                            Eliminar
                                        </a>
                                        <?php if ($fila->getEstatus() == "Disponible"): ?>
                                            <a href="<?php echo url_for("soporte/estatusPropiedad") . "?id=" . $fila->getId() . "&valor=Vendido" ?>">
                                                Vendido!
                                            </a>
                                        <?php else: ?>
                                            <a href="<?php echo url_for("soporte/estatusPropiedad") . $fila->getId() . "&valor=Disponible" ?>">
                                                Disponible!
                                            </a>
                                        <?php endif; ?>
                                        <a href="<?php echo url_for('vender/visualizar') . "?id=" . $fila->getId() ?>">
                                            Visualizar
                                        </a>
                                        <a onclick="copiar('<?php echo url_for('vender/compartir', true) . "?id=" . $fila->getId() ?>')"
                                           href="javascript:void();">
                                            Compartir
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <font style="color:#8f9195;">
                            <br/><br/>
                            Mensajes sin Leer: <?php echo sizeof($fila->getCantidadMensajesSinLeer()) ?>
                            <?php if (sizeof($fila->getCantidadMensajesSinLeer()) > 0): ?>
                                <a class="collapsed btn btn-xs" style="color:white;background-color:#305da7;border-radius: 10px;" data-toggle="collapse" data-parent="#accordion" href="#pv<?php echo $fila->getId() ?>" >
                                    Ver Mensajes
                                </a>
                            <?php endif; ?>
                            <br/><br/>
                            Negocios Disponibles: <?php echo sizeof($fila->getNegociosDisponibles()); ?>
                            <?php if (sizeof($fila->getNegociosDisponibles()) > 0): ?>
                                <a class="collapsed btn btn-xs" style="color:white;background-color:#25d366;border-radius: 10px;" data-toggle="collapse" data-parent="#accordion" href="#pv<?php echo $fila->getId() ?>" >
                                    Ver Negocios
                                </a>
                            <?php endif; ?>
                            </font>
                        </div>
                        <div id="pv<?php echo $fila->getId() ?>" class="panel-collapse collapse">
                            <div class="panel-body" style="max-height:500px; overflow-x: hidden;background:#F7F7F7;">
                                <?php include_partial('negocio/detalle', array('propiedad_id' => $fila->getId())) ?>
                            </div>
                        </div>
                        <div class="col-md-12"><hr/></div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="panel panel_ocultar" id="PR">
            <div class="panel-header">
                <h5>
                    PROPIEDADES EN RENTA
                    <span style="float:right;color:#6480AB">
                        <b>
                            <?php echo Negocio::getComisionPropiedadRenta() ?>
                        </b>
                    </span>
                </h5>
            </div>
            <div class="panel-content">
                <div class="row">
                    <?php foreach ($propiedad_renta as $fila): ?>
                        <div class="col-md-2">
                            <div style=";background-color:#f1f3f3; text-align: center;<?php if (!$fila->getVisto()): ?>border-left: 6px solid #25d366;<?php endif; ?>">
                                <?php foreach ($fila->getPropiedadImagens() as $img): ?>
                                    <img style="max-height: 100px" src="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $img->getNombreActual() ?>"/>
                                    <?php break; ?>
                                <?php endforeach; ?>
                                <?php if (sizeof($fila->getPropiedadImagens()) == 0): ?>
                                    <div style=";background-color:#f1f3f3; text-align: center;">
                                        <img style="max-height: 100px" src="<?php echo $fila->getDireccionImagen() ?>"/>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-7">
                            PROP<?php echo $fila->getId() ?>
                            |
                            Rentar <?php echo $fila->getTipoInmueble(); ?>
                            |
                            Precio: 
                            <b><?php echo $fila->getMoneda()->getCodigo() ?></b>
                            <?php echo number_format($fila->getPrecio(), 0) ?>
                            |
                            Comisión máx: <b><?php echo $fila->getMaximaComision() ?></b>
                            <br/><br/>
                            <div class="col-md-5 col-xs-12 col-sm-12">
                                <table class="" style="padding: 0;width:100%">
                                    <tr>
                                        <td style="padding: 0;">
                                            <b><?php echo $fila->getArea() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Area-01.png"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <b><?php echo $fila->getNiveles() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Niveles-01.png"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <b><?php echo $fila->getCantidadHabitacion() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <b><?php echo $fila->getCantidadParqueo() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Parqueos-01.png"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <b><?php echo $fila->getCantidadBanio() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Baños-01.png"/>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <br/><br/>
                            <?php
                            echo substr($fila->getDireccionCompleta(), 0, 70);
                            if (strlen($fila->getDireccionCompleta()) > 70) {
                                echo "...";
                            }
                            ?>
                        </div>
                        <div class="col-md-3">
                            <div class="dropdown" style="float:right;">
                                <a style="text-decoration: none;cursor:pointer;" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="glyphicon glyphicon-option-vertical"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                    <li>
                                        <a href="<?php echo url_for('vender/editar') . "?id=" . $fila->getId() ?>">
                                            Editar
                                        </a>
                                        <a onclick="if (confirm('Esta seguro de querer eliminar esta propiedad?') == true) {
                                                        location.replace('<?php echo url_for("soporte/estatusPropiedad") . "?id=" . $fila->getId() . "&valor=Eliminado" ?>');
                                                    }" href="#">
                                            Eliminar
                                        </a>
                                        <?php if ($fila->getEstatus() == "Disponible"): ?>
                                            <a href="<?php echo url_for("soporte/estatusPropiedad") . "?id=" . $fila->getId() . "&valor=Vendido" ?>">
                                                Vendido!
                                            </a>
                                        <?php else: ?>
                                            <a href="<?php echo url_for("soporte/estatusPropiedad") . $fila->getId() . "&valor=Disponible" ?>">
                                                Disponible!
                                            </a>
                                        <?php endif; ?>
                                        <a href="<?php echo url_for('vender/visualizar') . "?id=" . $fila->getId() ?>">
                                            Visualizar
                                        </a>
                                        <a onclick="copiar('<?php echo url_for('vender/compartir', true) . "?id=" . $fila->getId() ?>')"
                                           href="javascript:void();">
                                            Compartir
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <font style="color:#8f9195;">
                            <br/><br/>
                            Mensajes sin Leer: <?php echo sizeof($fila->getCantidadMensajesSinLeer()) ?>
                            <?php if (sizeof($fila->getCantidadMensajesSinLeer()) > 0): ?>
                                <a class="collapsed btn btn-xs" style="color:white;background-color:#305da7;border-radius: 10px;" data-toggle="collapse" data-parent="#accordion" href="#pr<?php echo $fila->getId() ?>" >
                                    Ver Mensajes
                                </a>
                            <?php endif; ?>
                            <br/><br/>
                            Negocios Disponibles: <?php echo sizeof($fila->getNegociosDisponibles()); ?>
                            <?php if (sizeof($fila->getNegociosDisponibles()) > 0): ?>
                                <a class="collapsed btn btn-xs" style="color:white;background-color:#25d366;border-radius: 10px;" data-toggle="collapse" data-parent="#accordion" href="#pr<?php echo $fila->getId() ?>" >
                                    Ver Negocios
                                </a>
                            <?php endif; ?>
                            </font>
                        </div>
                        <div id="pr<?php echo $fila->getId() ?>" class="panel-collapse collapse">
                            <div class="panel-body" style="max-height:500px; overflow-x: hidden;background:#F7F7F7;">
                                <?php include_partial('negocio/detalle', array('propiedad_id' => $fila->getId())) ?>
                            </div>
                        </div>
                        <div class="col-md-12"><hr/></div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="text" id="text_copiar" style="display:none;"/>
<script src="/assets/global/plugins/jquery/jquery-3.1.0.min.js"></script>
<script type="text/javascript">
                                            function copiar(texto) {
                                                $('#text_copiar').val(texto);
                                                var copyText = document.getElementById("text_copiar");
                                                $('#text_copiar').show();
                                                copyText.select();
                                                document.execCommand("copy");
                                                $('#text_copiar').hide();
                                                generate("topRight", "", '<div class="alert alert-success media fade in"><p><strong>Exito!</strong> Link puesto en el portapapeles.</p></div>');
                                            }

                                            $(document).ready(function () {
                                                $(".ajusta_propiedad").on('change', function () {
                                                    var referencia = $(this).attr("referencia");
                                                    var valor = $(this).val();
                                                    $.get("<?php echo url_for("soporte/estatusPropiedad") ?>", {"id": referencia, "valor": valor});
                                                });
                                                $(".ajusta_requerimiento").on('change', function () {
                                                    var referencia = $(this).attr("referencia");
                                                    var valor = $(this).val();
                                                    $.get("<?php echo url_for("soporte/estatusRequerimiento") ?>", {"id": referencia, "valor": valor});
                                                });
                                                $("#listado_req").on("change", function () {
                                                    var valor = $("#listado_req").val();
                                                    if (valor == 'TODO') {
                                                        $(".panel_ocultar").show();
                                                    } else {
                                                        $(".panel_ocultar").hide();
                                                        $("#" + valor).show();
                                                    }
                                                });
                                            });
</script>