<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered table-hover">
            <?php foreach ($propiedades as $propiedad): ?>
                <tr>
                    <td style="width:30%;text-align: center;">
                        <?php foreach ($propiedad->getPropiedadImagens() as $fila): ?>
                            <img style="max-height: 100px" src="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>"/>
                            <?php break; ?>
                        <?php endforeach; ?>
                        <?php if (sizeof($propiedad->getPropiedadImagens()) == 0): ?>
                            <div style=";background-color:#f1f3f3; text-align: center;">
                                <img style="max-height: 100px" src="/assets/img/caracteristicas/casa.png"/>
                            </div>
                        <?php endif; ?>
                    </td>
                    <td style="width:70%;vertical-align:top">
                        <table style="width:100%;height: 100%">
                            <tr>
                                <td># <?php echo $propiedad->getId() ?></td>
                                <td style="text-align: right;">
                                    <select class="ajusta_propiedad" referencia="<?php echo $propiedad->getId() ?>" >
                                        <option value="Disponible" <?php echo $propiedad->getEstatus() == "Disponible" ? "selected" : null ?>>Disponible</option>
                                        <option value="Vendido" <?php echo $propiedad->getEstatus() == "Vendido" ? "selected" : null ?>>Vendido</option>
                                    </select>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <span class="caret"></span>
                                        </button>
                                        <span class="dropdown-arrow"></span>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="<?php echo url_for('vender/editar') . "?id=" . $propiedad->getId() ?>" href='#'>
                                                    Editar
                                                </a>
                                            </li>
                                            <li>
                                                <a onclick="if (confirm('Esta seguro de querer eliminar esta propiedad?') == true) {
                                                                location.replace('<?php echo url_for('vender/eliminar') . "?id=" . $propiedad->getId() ?>')
                                                            }" href="#">
                                                    Eliminar
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
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
                                            <?php echo $propiedad->getArea() ?>
                                            <img width="25%" src="/assets/img/caracteristicas/Area-01.png"/>
                                        </div>
                                        <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                            <?php echo $propiedad->getNiveles() ?>
                                            <img width="25%" src="/assets/img/caracteristicas/Niveles-01.png"/>
                                        </div>
                                        <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                             <?php echo $propiedad->getCantidadHabitacion() ?>
                                            <img width="25%" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
                                        </div>
                                        <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                            <?php echo $propiedad->getCantidadParqueo() ?>
                                            <img width="25%" src="/assets/img/caracteristicas/Parqueos-01.png"/>
                                        </div>
                                        <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                             <?php echo $propiedad->getCantidadBanio() ?>
                                            <img width="25%" src="/assets/img/caracteristicas/Baños-01.png"/>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <hr/>
    <a class="col-md-1 col-xs-3 col-sm-1" style="position: fixed;bottom: 20px;right: 30px;z-index: 99;border: none;border-radius: 10px" href="<?php echo url_for('vender/nueva') ?>">
        <img style="width:100%" src="/assets/img/caracteristicas/Agregar propiedad.png"/>
    </a>
</div>