<?php
$requerimiento_compra = $sf_data->getRaw('requerimiento_compra');
$requerimiento_renta = $sf_data->getRaw('requerimiento_renta');
$propiedad_renta = $sf_data->getRaw('propiedad_renta');
$propiedad_venta = $sf_data->getRaw('propiedad_venta');
?> 
<div class="row">
    <div class="col-md-12">
        <h5 style="text-align: center;">
            <select id="listado_req" style="float:right;">
                <option value="TODO">TODO</option>
                <option value="RO">Requerimiento de Compra</option>
                <option value="RR">Requerimiento de Renta</option>
                <option value="PV">Propiedades en Venta</option>
                <option value="PR">Propiedades en Renta</option>
            </select>
        </h5>
    </div>
    <div class="panel-content">
        <br/>
        <div class="panel panel_ocultar" id="RO">
            <div class="panel-header">
                <h5>REQUERIMIENTOS DE COMPRA</h5>
            </div>
            <div class="panel-content">
                <div class="row">
                    <?php foreach ($requerimiento_compra as $fila): ?>
                        <div class="col-md-3">
                            <div class="panel">
                                <div class="panel-header">
                                    <h5>
                                        <?php echo $fila->getRequerimiento()->getId() ?>
                                        |
                                        Comprar <?php echo $fila->getRequerimiento()->getTipoInmueble(); ?>
                                        |
                                        <font style="color:#6480AB">
                                        <b><?php echo $fila->getComisionVenta() ?></b>
                                        </font>
                                        <div class="dropdown" style="float:right;">
                                            <a style="text-decoration: none;cursor:pointer;" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <i class="glyphicon glyphicon-option-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                <li>
                                                    <a href="<?php echo url_for('negocio/detalle') . "?id=" . $fila->getId() ?>">
                                                        Detalle
                                                    </a>
                                                    <a onclick="if (confirm('Esta seguro de querer eliminar este requerimiento?') == true) {
                                                                location.replace('<?php echo url_for("soporte/estatusRequerimiento") . "?id=" . $fila->getRequerimiento()->getId() . "&valor=Eliminado" ?>');
                                                            }" href="#">
                                                        Eliminar
                                                    </a>
                                                    <?php if ($fila->getRequerimiento()->getEstatus() == "Disponible"): ?>
                                                        <a href="<?php echo url_for("soporte/estatusRequerimiento") . "?id=" . $fila->getRequerimiento()->getId() . "&valor=Vendido" ?>">
                                                            Vendido!
                                                        </a>
                                                    <?php else: ?>
                                                        <a href="<?php echo url_for("soporte/estatusRequerimiento") . "?id=" . $fila->getRequerimiento()->getId() . "&valor=Disponible" ?>">
                                                            Disponible!
                                                        </a>
                                                    <?php endif; ?>
                                                    <a href="<?php echo url_for('requerimiento/visualizar') . "?id=" . $fila->getRequerimiento()->getId() ?>">
                                                        Visualizar
                                                    </a>
                                                    <a onclick="copiar('<?php echo url_for('requerimiento/compartir', true) . "?id=" . $fila->getRequerimiento()->getId() ?>')" href="javascript:void();">
                                                        Compartir
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </h5>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12" style="text-align: center;">
                                            <div style=";background-color:#f1f3f3; text-align: center;">
                                                <img style="max-height: 100px" src="<?php echo $fila->getRequerimiento()->getDireccionImagen() ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <table style="width:100%;height: 100%" class="table">
                                                <tr>
                                                    <td style="color:#6480AB;width:80%">
                                                        <b><?php echo $fila->getRequerimiento()->getMoneda()->getCodigo() ?></b>
                                                        <?php echo number_format($fila->getRequerimiento()->getPresupuestoMin(), 0) . '-' . number_format($fila->getRequerimiento()->getPresupuestoMax(), 0) ?>
                                                    </td>
                                                    <td>
                                                        <span class="pull-right badge badge-default" style="color:black;margin-right:3px;">
                                                            <?php echo sizeof($fila->getPropiedad()->getNegocios()); ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <table class="table" style="padding: 0;">
                                                                    <tr>
                                                                        <td style="padding: 0;">
                                                                            <b><?php echo $fila->getRequerimiento()->getArea() ?></b>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Area-01.png"/>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <b><?php echo $fila->getRequerimiento()->getNiveles() ?></b>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Niveles-01.png"/>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <b><?php echo $fila->getRequerimiento()->getCantidadHabitacion() ?></b>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <b><?php echo $fila->getRequerimiento()->getCantidadParqueo() ?></b>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Parqueos-01.png"/>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <b><?php echo $fila->getRequerimiento()->getCantidadBanio() ?></b>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Baños-01.png"/>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <?php
                                                        echo substr($fila->getRequerimiento()->getDireccionCompleta(), 0, 70);
                                                        if (strlen($fila->getRequerimiento()->getDireccionCompleta()) > 70) {
                                                            echo "...";
                                                        }
                                                        ?>
                                                        <br/>
                                                        <a style="float:right;" href="<?php echo url_for("negocio/detalle") . "?id=" . $fila->getId() ?>">
                                                            Más Detalles...
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="panel panel_ocultar" id="RR">
            <div class="panel-header">
                <h5>REQUERIMIENTOS DE RENTA</h5>
            </div>
            <div class="panel-content">
                <div class="row">
                    <?php foreach ($requerimiento_renta as $fila): ?>
                        <div class="col-md-3">
                            <div class="panel">
                                <div class="panel-header">
                                    <h5>
                                        <?php echo $fila->getRequerimiento()->getId() ?>
                                        |
                                        Rentar <?php echo $fila->getRequerimiento()->getTipoInmueble(); ?>
                                        |
                                        <font style="color:#6480AB">
                                        <b><?php echo $fila->getComisionVenta() ?></b>
                                        </font>
                                        <div class="dropdown" style="float:right;">
                                            <a style="text-decoration: none;cursor:pointer;" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <i class="glyphicon glyphicon-option-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                <li>
                                                    <a href="<?php echo url_for('negocio/detalle') . "?id=" . $fila->getId() ?>">
                                                        Detalle
                                                    </a>
                                                    <a onclick="if (confirm('Esta seguro de querer eliminar este requerimiento?') == true) {
                                                                location.replace('<?php echo url_for("soporte/estatusRequerimiento") . "?id=" . $fila->getRequerimiento()->getId() . "&valor=Eliminado" ?>');
                                                            }" href="#">
                                                        Eliminar
                                                    </a>
                                                    <?php if ($fila->getRequerimiento()->getEstatus() == "Disponible"): ?>
                                                        <a href="<?php echo url_for("soporte/estatusRequerimiento") . "?id=" . $fila->getRequerimiento()->getId() . "&valor=Vendido" ?>">
                                                            Vendido!
                                                        </a>
                                                    <?php else: ?>
                                                        <a href="<?php echo url_for("soporte/estatusRequerimiento") . "?id=" . $fila->getRequerimiento()->getId() . "&valor=Disponible" ?>">
                                                            Disponible!
                                                        </a>
                                                    <?php endif; ?>
                                                    <a href="<?php echo url_for('requerimiento/visualizar') . "?id=" . $fila->getRequerimiento()->getId() ?>">
                                                        Visualizar
                                                    </a>
                                                    <a onclick="copiar('<?php echo url_for('requerimiento/compartir', true) . "?id=" . $fila->getRequerimiento()->getId() ?>')" href="javascript:void();">
                                                        Compartir
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </h5>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12" style="text-align: center;">
                                            <div style=";background-color:#f1f3f3; text-align: center;">
                                                <img style="max-height: 100px" src="<?php echo $fila->getRequerimiento()->getDireccionImagen() ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <table style="width:100%;height: 100%" class="table">
                                                <tr>
                                                    <td style="color:#6480AB;width: 80%">
                                                        <b><?php echo $fila->getRequerimiento()->getMoneda()->getCodigo() ?></b>
                                                        <?php echo number_format($fila->getRequerimiento()->getPresupuestoMin(), 0) . '-' . number_format($fila->getRequerimiento()->getPresupuestoMax(), 0) ?>
                                                    </td>
                                                    <td>
                                                        <span class="pull-right badge badge-default" style="color:black;margin-right:3px;">
                                                            <?php echo sizeof($fila->getPropiedad()->getNegocios()); ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <table class="table" style="padding: 0;">
                                                                    <tr>
                                                                        <td style="padding: 0;">
                                                                            <b><?php echo $fila->getRequerimiento()->getArea() ?></b>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Area-01.png"/>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <b><?php echo $fila->getRequerimiento()->getNiveles() ?></b>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Niveles-01.png"/>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <b><?php echo $fila->getRequerimiento()->getCantidadHabitacion() ?></b>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <b><?php echo $fila->getRequerimiento()->getCantidadParqueo() ?></b>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Parqueos-01.png"/>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <b><?php echo $fila->getRequerimiento()->getCantidadBanio() ?></b>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Baños-01.png"/>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <?php
                                                        echo substr($fila->getRequerimiento()->getDireccionCompleta(), 0, 70);
                                                        if (strlen($fila->getRequerimiento()->getDireccionCompleta()) > 70) {
                                                            echo "...";
                                                        }
                                                        ?>
                                                        <br/>
                                                        <a style="float:right;" href="<?php echo url_for("negocio/detalle") . "?id=" . $fila->getId() ?>">
                                                            Más Detalles...
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="panel panel_ocultar" id="PV">
            <div class="panel-header">
                <h5>PROPIEDADES EN VENTA</h5>
            </div>
            <div class="panel-content">
                <div class="row">
                    <?php foreach ($propiedad_venta as $fila): ?>
                        <div class="col-md-3">
                            <div class="panel">
                                <div class="panel-header">
                                    <h5>
                                        <?php echo $fila->getPropiedad()->getId() ?>
                                        |
                                        Vender <?php echo $fila->getPropiedad()->getTipoInmueble(); ?>
                                        |
                                        <font style="color:#6480AB">
                                        <b><?php echo $fila->getComisionRequerimiento() ?></b>
                                        </font>
                                        <div class="dropdown" style="float:right;">
                                            <a style="text-decoration: none;cursor:pointer;" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <i class="glyphicon glyphicon-option-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                <li>
                                                    <a href="<?php echo url_for('negocio/detalle') . "?id=" . $fila->getId() ?>">
                                                        Detalle
                                                    </a>
                                                    <a href="<?php echo url_for('vender/editar') . "?id=" . $fila->getPropiedad()->getId() ?>">
                                                        Editar
                                                    </a>
                                                    <a onclick="if (confirm('Esta seguro de querer eliminar esta propiedad?') == true) {
                                                                location.replace('<?php echo url_for("soporte/estatusPropiedad") . "?id=" . $fila->getPropiedad()->getId() . "&valor=Eliminado" ?>');
                                                            }" href="#">
                                                        Eliminar
                                                    </a>
                                                    <?php if ($fila->getPropiedad()->getEstatus() == "Disponible"): ?>
                                                        <a href="<?php echo url_for("soporte/estatusPropiedad") . "?id=" . $fila->getPropiedad()->getId() . "&valor=Vendido" ?>">
                                                            Vendido!
                                                        </a>
                                                    <?php else: ?>
                                                        <a href="<?php echo url_for("soporte/estatusPropiedad") . $fila->getPropiedad()->getId() . "&valor=Disponible" ?>">
                                                            Disponible!
                                                        </a>
                                                    <?php endif; ?>
                                                    <a href="<?php echo url_for('vender/visualizar') . "?id=" . $fila->getPropiedad()->getId() ?>">
                                                        Visualizar
                                                    </a>
                                                    <a onclick="copiar('<?php echo url_for('vender/compartir', true) . "?id=" . $fila->getPropiedad()->getId() ?>')"
                                                       href="javascript:void();">
                                                        Compartir
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </h5>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12" style="text-align: center;">
                                            <?php foreach ($fila->getPropiedad()->getPropiedadImagens() as $img): ?>
                                                <img style="max-height: 100px" src="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $img->getNombreActual() ?>"/>
                                                <?php break; ?>
                                            <?php endforeach; ?>
                                            <?php if (sizeof($fila->getPropiedad()->getPropiedadImagens()) == 0): ?>
                                                <div style=";background-color:#f1f3f3; text-align: center;">
                                                    <img style="max-height: 100px" src="<?php echo $fila->getPropiedad()->getDireccionImagen() ?>"/>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-12">
                                            <table style="width:100%;height: 100%" class="table">
                                                <tr>
                                                    <td style="color:#6480AB;width: 80%">
                                                        <b><?php echo $fila->getPropiedad()->getMoneda()->getCodigo() ?></b>
                                                        <?php echo number_format($fila->getPropiedad()->getPrecio(), 0) ?>
                                                    </td>
                                                    <td>
                                                        <span class="pull-right badge badge-default" style="color:black;margin-right:3px;">
                                                            <?php echo sizeof($fila->getRequerimiento()->getNegocios()); ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <table class="table" style="padding: 0;">
                                                                    <tr>
                                                                        <td style="padding: 0;">
                                                                            <b><?php echo $fila->getPropiedad()->getArea() ?></b>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Area-01.png"/>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <b><?php echo $fila->getPropiedad()->getNiveles() ?></b>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Niveles-01.png"/>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <b><?php echo $fila->getPropiedad()->getCantidadHabitacion() ?></b>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <b><?php echo $fila->getPropiedad()->getCantidadParqueo() ?></b>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Parqueos-01.png"/>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <b><?php echo $fila->getPropiedad()->getCantidadBanio() ?></b>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Baños-01.png"/>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <?php
                                                        echo substr($fila->getPropiedad()->getDireccionCompleta(), 0, 70);
                                                        if (strlen($fila->getPropiedad()->getDireccionCompleta()) > 70) {
                                                            echo "...";
                                                        }
                                                        ?>
                                                        <br/>
                                                        <a style="float:right;" href="<?php echo url_for("negocio/detalle") . "?id=" . $fila->getId() ?>">
                                                            Más Detalles...
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="panel panel_ocultar" id="PR">
            <div class="panel-header">
                <h5>PROPIEDADES EN RENTA</h5>
            </div>
            <div class="panel-content">
                <div class="row">
                    <?php foreach ($propiedad_renta as $fila): ?>
                        <div class="col-md-3">
                            <div class="panel">
                                <div class="panel-header">
                                    <h5>
                                        <?php echo $fila->getPropiedad()->getId() ?>
                                        |
                                        Rentar <?php echo $fila->getPropiedad()->getTipoInmueble(); ?>
                                        |
                                        <font style="color:#6480AB">
                                        <b><?php echo $fila->getComisionRequerimiento() ?></b>
                                        </font>
                                        <div class="dropdown" style="float:right;">
                                            <a style="text-decoration: none;cursor:pointer;" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <i class="glyphicon glyphicon-option-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                <li>
                                                    <a href="<?php echo url_for('negocio/detalle') . "?id=" . $fila->getId() ?>">
                                                        Detalle
                                                    </a>
                                                    <a href="<?php echo url_for('vender/editar') . "?id=" . $fila->getPropiedad()->getId() ?>">
                                                        Editar
                                                    </a>
                                                    <a onclick="if (confirm('Esta seguro de querer eliminar esta propiedad?') == true) {
                                                                location.replace('<?php echo url_for("soporte/estatusPropiedad") . "?id=" . $fila->getPropiedad()->getId() . "&valor=Eliminado" ?>');
                                                            }" href="#">
                                                        Eliminar
                                                    </a>
                                                    <?php if ($fila->getPropiedad()->getEstatus() == "Disponible"): ?>
                                                        <a href="<?php echo url_for("soporte/estatusPropiedad") . "?id=" . $fila->getPropiedad()->getId() . "&valor=Vendido" ?>">
                                                            Vendido!
                                                        </a>
                                                    <?php else: ?>
                                                        <a href="<?php echo url_for("soporte/estatusPropiedad") . $fila->getPropiedad()->getId() . "&valor=Disponible" ?>">
                                                            Disponible!
                                                        </a>
                                                    <?php endif; ?>
                                                    <a href="<?php echo url_for('vender/visualizar') . "?id=" . $fila->getPropiedad()->getId() ?>">
                                                        Visualizar
                                                    </a>
                                                    <a onclick="copiar('<?php echo url_for('vender/compartir', true) . "?id=" . $fila->getPropiedad()->getId() ?>')"
                                                       href="javascript:void();">
                                                        Compartir
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </h5>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12" style="text-align: center;">
                                            <?php foreach ($fila->getPropiedad()->getPropiedadImagens() as $img): ?>
                                                <img style="max-height: 100px" src="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $img->getNombreActual() ?>"/>
                                                <?php break; ?>
                                            <?php endforeach; ?>
                                            <?php if (sizeof($fila->getPropiedad()->getPropiedadImagens()) == 0): ?>
                                                <div style=";background-color:#f1f3f3; text-align: center;">
                                                    <img style="max-height: 100px" src="<?php echo $fila->getPropiedad()->getDireccionImagen() ?>"/>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-12">
                                            <table style="width:100%;height: 100%" class="table">
                                                <tr>
                                                    <td style="color:#6480AB;width:80%;">
                                                        <b><?php echo $fila->getPropiedad()->getMoneda()->getCodigo() ?></b>
                                                        <?php echo number_format($fila->getPropiedad()->getPrecio(), 0) ?>
                                                    </td>
                                                    <td>
                                                        <span class="pull-right badge badge-default" style="color:black;margin-right:3px;">
                                                            <?php echo sizeof($fila->getRequerimiento()->getNegocios()); ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <table class="table" style="padding: 0;">
                                                                    <tr>
                                                                        <td style="padding: 0;">
                                                                            <b><?php echo $fila->getPropiedad()->getArea() ?></b>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Area-01.png"/>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <b><?php echo $fila->getPropiedad()->getNiveles() ?></b>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Niveles-01.png"/>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <b><?php echo $fila->getPropiedad()->getCantidadHabitacion() ?></b>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <b><?php echo $fila->getPropiedad()->getCantidadParqueo() ?></b>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Parqueos-01.png"/>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <b><?php echo $fila->getPropiedad()->getCantidadBanio() ?></b>
                                                                        </td>
                                                                        <td style="padding: 0;">
                                                                            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Baños-01.png"/>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <?php
                                                        echo substr($fila->getPropiedad()->getDireccionCompleta(), 0, 70);
                                                        if (strlen($fila->getPropiedad()->getDireccionCompleta()) > 70) {
                                                            echo "...";
                                                        }
                                                        ?>
                                                        <br/>
                                                        <a style="float:right;" href="<?php echo url_for("negocio/detalle") . "?id=" . $fila->getId() ?>">
                                                            Más Detalles...
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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