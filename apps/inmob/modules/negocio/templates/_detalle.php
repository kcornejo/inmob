<?php
$usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
if ($propiedad_id) {
    $registros = NegocioQuery::create()
            ->filterByPropiedadId($propiedad_id)
            ->filterByActivo(true)
            ->find();
} else {
    $registros = NegocioQuery::create()
            ->filterByRequerimientoId($requerimiento_id)
            ->filterByActivo(true)
            ->joinPropiedad("propiedad")
            ->withColumn("propiedad.mi_comision / 100 * propiedad.precio * propiedad.comision_compartida /100", "comision_requerimiento")
            ->orderBy("comision_requerimiento", 'desc')
            ->groupById()
            ->find();
}
?>
<?php if ($propiedad_id): ?>
    <div class="row">
        <?php foreach ($registros as $fila): ?>
            <div class="col-md-3">
                <div class="panel panel-sombra-completa" style="border-left: #000">
                    <div class="panel-header">
                        <h5>
                            REQ<?php echo $fila->getRequerimiento()->getId() ?>
                            |
                            <?php if ($fila->getRequerimiento()->getTipoOperacion() == "Comprar"): ?>
                                Comprar
                            <?php else: ?>
                                Rentar
                            <?php endif; ?>
                            &nbsp;<?php echo $fila->getRequerimiento()->getTipoInmueble(); ?>
                            <div class="dropdown" style="float:right;">
                                <a style="text-decoration: none;cursor:pointer;" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="glyphicon glyphicon-option-vertical"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                    <li>
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
                                <div style=";background-color:#f1f3f3; text-align: center;<?php if (!$fila->getVisto()): ?>border-left: 6px solid #25d366;<?php endif; ?>">
                                    <img style="max-height: 100px" src="<?php echo $fila->getRequerimiento()->getDireccionImagen() ?>"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table style="width:100%;height: 100%" class="table">
                                    <tr>
                                        <td style="color:#6480AB" colspan="2">
                                            <b><?php echo $fila->getRequerimiento()->getMoneda()->getCodigo() ?></b>
                                            <?php echo number_format($fila->getRequerimiento()->getPresupuestoMin(), 0) . '-' . number_format($fila->getRequerimiento()->getPresupuestoMax(), 0) ?>
                                            <span class="pull-right badge" style="color:white;margin-right:3px;background-color:#6480AB;">
                                                <?php echo $fila->getMensajesPendientes(); ?>
                                            </span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <?php include_partial("soporte/caracteristicas_pequenio", array('objeto' => $fila->getRequerimiento())) ?>
                                                </div>
                                            </div>
                                        </td>
                                    <tr>
                                        <td colspan="2">
                                            <?php
                                            echo substr($fila->getDireccionCompleta(), 0, 50);
                                            if (strlen($fila->getDireccionCompleta()) > 50) {
                                                echo "...";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <?php if ($fila->getMensajesPendientes() > 0): ?>
                                            <td>
                                                <a class="btn btn-xs" style="color:white;background-color:#305da7;border-radius: 20px;float:left" href="<?php echo url_for('negocio/visualizar') . "?id=" . $fila->getId() . "&mensaje=1" ?>" >
                                                    Ver Mensajes
                                                </a>
                                            </td>
                                        <?php endif; ?>
                                        <td>
                                            <a class="btn btn-xs" style="color:white;background-color:#25d366;border-radius: 20px;float:right" href="<?php echo url_for('negocio/visualizar') . "?id=" . $fila->getId() ?>" >
                                                Ver Negocio
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
<?php else: ?>
    <div class="row">
        <?php foreach ($registros as $fila): ?>
            <div class="col-md-3">
                <div class="panel panel-sombra-completa">
                    <div class="panel-header">
                        <h5>
                            PRO<?php echo $fila->getPropiedad()->getId() ?>
                            |
                            <?php if ($fila->getPropiedad()->getTipoOperacion() == "Vender"): ?>
                                Vender
                            <?php else: ?>
                                Rentar
                            <?php endif; ?>
                            &nbsp;<?php echo $fila->getPropiedad()->getTipoInmueble(); ?>
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
                                        <a onclick="copiar('<?php echo url_for('vender/compartir', true) . "?id=" . $fila->getPropiedad()->getId() ?>')" href="javascript:void();">
                                            Compartir
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </h5>
                    </div>
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-12" style="text-align: center;">
                                <div style=";background-color:#f1f3f3; text-align: center;<?php if (!$fila->getVisto()): ?>border-left: 6px solid #25d366;<?php endif; ?>">
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
                            </div>
                            <div class="col-md-12">
                                <table style="width:100%;height: 100%" class="table">
                                    <tr>
                                        <td style="color:#6480AB" colspan="2">
                                            <b><?php echo $fila->getPropiedad()->getMoneda()->getCodigo() ?></b>
                                            <?php echo number_format($fila->getPropiedad()->getPrecio(), 0) ?>
                                            <span class="pull-right badge" style="color:white;margin-right:3px;background-color:#6480AB;">
                                                <?php echo $fila->getMensajesPendientes(); ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <?php include_partial("soporte/caracteristicas_pequenio", array('objeto' => $fila->getPropiedad())) ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php
                                            echo substr($fila->getPropiedad()->getDireccionCompleta(), 0, 50);
                                            if (strlen($fila->getPropiedad()->getDireccionCompleta()) > 50) {
                                                echo "...";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <?php if ($fila->getMensajesPendientes() > 0): ?>
                                            <td>
                                                <a class="btn btn-xs" style="color:white;background-color:#305da7;border-radius: 20px;float:left" href="<?php echo url_for('negocio/visualizar') . "?id=" . $fila->getId() . "&mensaje=1" ?>" >
                                                    Ver Mensajes
                                                </a>
                                            </td>
                                        <?php endif; ?>
                                        <td>
                                            <a class="btn btn-xs" style="color:white;background-color:#25d366;border-radius: 20px;float:right" href="<?php echo url_for('negocio/visualizar') . "?id=" . $fila->getId() ?>" >
                                                Ver Negocio
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
<?php endif; ?>
<?php if (sizeof($registros) == 0): ?>
    <center>
        <b>[SIN REGISTROS]</b>
    </center>
<?php endif; ?>
