<div class="row">
    <div class="col-md-12">
        <?php foreach ($requerimientos as $requerimiento): ?>
            <div class="panel">
                <div class="panel-header">
                    <h5>
                        <?php echo $requerimiento->getId(); ?>
                        |
                        <?php echo $requerimiento->getTipoInmueble() ?>
                        en <?php
                        if ($requerimiento->getTipoOperacion() == "Comprar") {
                            echo "Compra";
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
                                    <a href="<?php echo url_for('requerimiento/editar') . "?id=" . $requerimiento->getId() ?>">
                                        Editar
                                    </a>
                                </li>
                                <li>
                                    <a onclick="if (confirm('Esta seguro de querer eliminar este requerimiento?') == true) {
                                                location.replace('<?php echo url_for('requerimiento/eliminar') . "?id=" . $requerimiento->getId() ?>')
                                            }" href="#">
                                        Eliminar
                                    </a>
                                    <?php if ($requerimiento->getEstatus() == "Disponible"): ?>
                                        <a href="<?php echo url_for("soporte/estatusRequerimiento") . "?id=" . $requerimiento->getId() . "&valor=Vendido" ?>">
                                            Vendido!
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo url_for("soporte/estatusRequerimiento") . "?id=" . $requerimiento->getId() . "&valor=Disponible" ?>">
                                            Disponible!
                                        </a>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>

                    </h5>
                </div>
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-2" style="text-align: center;">
                            <div style=";background-color:#f1f3f3; text-align: center;">
                                <img style="max-height: 100px" src="/assets/img/caracteristicas/casa.png"/>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <table style="width:100%;height: 100%">
                                <tr>
                                    <td style="color:#6480AB" colspan="2">
                                        <b><?php echo $requerimiento->getMoneda()->getCodigo() ?></b>
                                        <?php echo number_format($requerimiento->getPresupuestoMin(), 0) . '-' . number_format($requerimiento->getPresupuestoMax(), 0) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <?php foreach ($requerimiento->getDireccionRequerimientos() as $fila): ?>
                                            <?php
                                            echo $fila->getDireccion();
                                            break;
                                            ?>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="row">
                                            <br/><br/>
                                            <div class="col-md-2 col-xs-3 col-sm-3" style="text-align: center;">
                                                <b><?php echo $requerimiento->getArea() ?>&nbsp;</b>
                                                <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Area-01.png"/>
                                            </div>
                                            <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                                <b><?php echo $requerimiento->getNiveles() ?>&nbsp;</b>
                                                <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Niveles-01.png"/>
                                            </div>
                                            <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                                <b><?php echo $requerimiento->getCantidadHabitacion() ?>&nbsp;</b>
                                                <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
                                            </div>
                                            <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                                <b><?php echo $requerimiento->getCantidadParqueo() ?>&nbsp;</b>
                                                <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Parqueos-01.png"/>
                                            </div>
                                            <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                                <b><?php echo $requerimiento->getCantidadBanio() ?>&nbsp;</b>
                                                <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Baños-01.png"/>
                                            </div>
                                            <br/><br/>
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
    <a class="col-md-1 col-xs-3 col-sm-1" style="position: fixed;bottom: 20px;right: 30px;z-index: 99;" href="<?php echo url_for('requerimiento/nueva') ?>">
        <img style="width:100%" src="/assets/img/caracteristicas/Agregar requerimiento.png"/>
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