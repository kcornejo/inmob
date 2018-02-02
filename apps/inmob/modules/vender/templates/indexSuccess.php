<div class="row">
    <div class="col-md-12">
        <?php foreach ($propiedades as $propiedad): ?>
            <div class="panel">
                <div class="panel-header">
                    <h5>
                        <?php echo $propiedad->getId(); ?> | 
                        <?php echo $propiedad->getTipoInmueble() ?>
                        en <?php
                        if ($propiedad->getTipoOperacion() == "Vender") {
                            echo "Venta";
                        } else {
                            echo "Renta";
                        }
                        ?>
                        <div class="dropdown" style="float:right;">
                            <a style="text-decoration: none;cursor:pointer;" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="glyphicon glyphicon-option-vertical"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                <li>
                                    <a href="<?php echo url_for('vender/editar') . "?id=" . $propiedad->getId() ?>'">
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
                            <table style="width:100%;height: 100%;" class="table">
                                <tr>
                                    <td style="color:#6480AB">
                                        <b><?php echo $propiedad->getMoneda()->getCodigo() ?></b>
                                        <?php echo number_format($propiedad->getPrecio(), 2) ?>
                                    </td>
                                    <td style="text-align: right;">
                                        <select class="ajusta_propiedad" referencia="<?php echo $propiedad->getId() ?>" >
                                            <option value="Disponible" <?php echo $propiedad->getEstatus() == "Disponible" ? "selected" : null ?>>Disponible</option>
                                            <option value="Vendido" <?php echo $propiedad->getEstatus() == "Vendido" ? "selected" : null ?>>Vendido</option>
                                        </select>
                                    </td>
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
                                <tr>
                                    <td colspan="2"><?php echo $propiedad->getDireccion() ?></td>
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
<script src="/assets/global/plugins/jquery/jquery-3.1.0.min.js"></script>
<script type="text/javascript">
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
                                    });
</script>