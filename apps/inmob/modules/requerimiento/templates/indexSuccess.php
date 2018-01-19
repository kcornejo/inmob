<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered table-hover">
            <?php foreach ($requerimientos as $requerimiento): ?>
                <tr>
                    <td style="width:30%;text-align: center;">
                        <div style=";background-color:#f1f3f3; text-align: center;">
                            <img style="max-height: 100px" src="/assets/img/caracteristicas/casa.png"/>
                        </div>
                    </td>
                    <td style="width:70%;vertical-align:top">
                        <table style="width:100%;height: 100%">
                            <tr>
                                <td># <?php echo $requerimiento->getId() ?></td>
                                <td style="text-align: right;">
                                    <select class="ajusta_requerimiento" referencia="<?php echo $requerimiento->getId() ?>" >
                                        <option value="Disponible" <?php echo $requerimiento->getEstatus() == "Disponible" ? "selected" : null ?>>Disponible</option>
                                        <option value="Vendido" <?php echo $requerimiento->getEstatus() == "Vendido" ? "selected" : null ?>>Vendido</option>
                                    </select>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-xs btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="<?php echo url_for('requerimiento/editar') . "?id=" . $requerimiento->getId() ?>" href='#'>
                                                    Editar
                                                </a>
                                            </li>
                                            <li>
                                                <a onclick="if (confirm('Esta seguro de querer eliminar este requerimiento?') == true) {
                                                                location.replace('<?php echo url_for('requerimiento/eliminar') . "?id=" . $requerimiento->getId() ?>')
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
                                    if ($requerimiento->getTipoOperacion() == "Comprar") {
                                        echo "Compra";
                                    } else {
                                        echo "Renta";
                                    }
                                    ?>
                                </td>
                                <td style="text-align:right;">
                                    <b><?php echo $requerimiento->getMonedaRelatedByMonedaId()->getCodigo() ?></b>
                                    <?php echo number_format($requerimiento->getPresupuestoMin(), 2) . '-' . number_format($requerimiento->getPresupuestoMax(), 2) ?>
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
                                        <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                            <?php echo $requerimiento->getArea() ?>
                                            <img width="25%" src="/assets/img/caracteristicas/Area-01.png"/>
                                        </div>
                                        <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                            <?php echo $requerimiento->getNiveles() ?>
                                            <img width="25%" src="/assets/img/caracteristicas/Niveles-01.png"/>
                                        </div>
                                        <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                             <?php echo $requerimiento->getCantidadHabitacion() ?>
                                            <img width="25%" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
                                        </div>
                                        <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                            <?php echo $requerimiento->getCantidadParqueo() ?>
                                            <img width="25%" src="/assets/img/caracteristicas/Parqueos-01.png"/>
                                        </div>
                                        <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                             <?php echo $requerimiento->getCantidadBanio() ?>
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