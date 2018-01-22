<div class="row">
    <div class="col-md-12">
        <?php foreach ($propiedades as $propiedad): ?>
            <div class="panel">
                <div class="panel-header">
                    <h5>
                        <i>
                            <?php echo $propiedad->getUpdatedAt("d/m/Y H:i"); ?>
                        </i>
                        <a onclick="if (confirm('Esta seguro de querer eliminar esta propiedad?') == true) {
                                    location.replace('<?php echo url_for('vender/eliminar') . "?id=" . $propiedad->getId() ?>')
                                }" href="#" class="btn btn-xs btn-danger" style="float:right;margin-top: -6px;font-size: x-small">
                            <i class="fa fa-times-circle-o"></i>
                        </a>
                        <a onclick="location.href = '<?php echo url_for('vender/editar') . "?id=" . $propiedad->getId() ?>'" class="btn btn-xs btn-blue" style="float:right;margin-top: -6px;font-size: x-small" href="#">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </h5>
                </div>
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-2" style="text-align: center;">
                            <?php foreach ($propiedad->getPropiedadImagens() as $fila): ?>
                                <img style="max-height: 100px" src="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>"/>
                                <?php break; ?>
                            <?php endforeach; ?>
                            <?php if (sizeof($propiedad->getPropiedadImagens()) == 0): ?>
                                <div style=";background-color:#f1f3f3; text-align: center;">
                                    <img style="max-height: 100px" src="/assets/img/caracteristicas/casa.png"/>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-10">
                            <table style="width:100%;height: 100%">
                                <tr>
                                    <td><b># <?php echo $propiedad->getId() ?></b></td>
                                    <td style="text-align: right;">
                                        <select class="ajusta_propiedad" referencia="<?php echo $propiedad->getId() ?>" >
                                            <option value="Disponible" <?php echo $propiedad->getEstatus() == "Disponible" ? "selected" : null ?>>Disponible</option>
                                            <option value="Vendido" <?php echo $propiedad->getEstatus() == "Vendido" ? "selected" : null ?>>Vendido</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Casa en <?php
                                        if ($propiedad->getTipoOperacion() == "Vender") {
                                            echo "Venta";
                                        } else {
                                            echo "Renta";
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align:right;">
                                        <b><?php echo $propiedad->getMoneda()->getCodigo() ?></b>
                                        <?php echo number_format($propiedad->getPrecio(), 2) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><?php echo $propiedad->getDireccion() ?></td>

                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="row">
                                            <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                                <b><?php echo $propiedad->getArea() ?></b>
                                                <img style="max-width: 30px;" src="/assets/img/caracteristicas/Area-01.png"/>
                                            </div>
                                            <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                                <b><?php echo $propiedad->getNiveles() ?></b>
                                                <img style="max-width: 30px;" src="/assets/img/caracteristicas/Niveles-01.png"/>
                                            </div>
                                            <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                                <b><?php echo $propiedad->getCantidadHabitacion() ?></b>
                                                <img style="max-width: 30px;" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
                                            </div>
                                            <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                                <b><?php echo $propiedad->getCantidadParqueo() ?></b>
                                                <img style="max-width: 30px;" src="/assets/img/caracteristicas/Parqueos-01.png"/>
                                            </div>
                                            <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                                <b><?php echo $propiedad->getCantidadBanio() ?></b>
                                                <img style="max-width: 30px;" src="/assets/img/caracteristicas/Baños-01.png"/>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <hr/>
    <a class="col-md-1 col-xs-3 col-sm-1" style="position: fixed;bottom: 20px;right: 30px;z-index: 99;border: none;border-radius: 10px" href="<?php echo url_for('vender/nueva') ?>">
        <img style="width:100%" src="/assets/img/caracteristicas/Agregar propiedad.png"/>
    </a>
</div>