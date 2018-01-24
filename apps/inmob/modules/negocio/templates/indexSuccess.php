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
                <h5>Requerimientos de Compra</h5>
            </div>
            <div class="panel-content">
                <?php foreach ($requerimiento_compra as $fila): ?>
                    <div class="row" onclick="location.href = '<?php echo url_for("negocio/visualizar") . "?id=" . $fila->getId() ?>'">
                        <div class="col-md-2" style="text-align: center;">
                            <div style=";background-color:#f1f3f3; text-align: center;">
                                <img style="max-height: 100px" src="/assets/img/caracteristicas/casa.png"/>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <table style="width:100%;height: 100%">
                                <tr>
                                    <td># <?php echo $fila->getRequerimiento()->getId() ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <?php foreach ($fila->getRequerimiento()->getDireccionRequerimientos() as $dir): ?>
                                            <?php
                                            echo $dir->getDireccion();
                                            break;
                                            ?>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:right;">
                                        <b><?php echo $fila->getRequerimiento()->getMoneda()->getCodigo() ?></b>
                                        <?php echo number_format($fila->getRequerimiento()->getPresupuestoMin(), 2) . '-' . number_format($fila->getRequerimiento()->getPresupuestoMax(), 2) ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr/>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="panel panel_ocultar" id="RR">
            <div class="panel-header">
                <h5>Requerimientos de Renta</h5>
            </div>
            <div class="panel-content">
                <?php foreach ($requerimiento_renta as $fila): ?>
                    <div class="row" onclick="location.href = '<?php echo url_for("negocio/visualizar") . "?id=" . $fila->getId() ?>'">
                        <div class="col-md-2" style="text-align: center;">
                            <div style=";background-color:#f1f3f3; text-align: center;">
                                <img style="max-height: 100px" src="/assets/img/caracteristicas/casa.png"/>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <table style="width:100%;height: 100%">
                                <tr>
                                    <td># <?php echo $fila->getRequerimiento()->getId() ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <?php foreach ($fila->getRequerimiento()->getDireccionRequerimientos() as $dir): ?>
                                            <?php
                                            echo $dir->getDireccion();
                                            break;
                                            ?>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:right;">
                                        <b><?php echo $fila->getRequerimiento()->getMoneda()->getCodigo() ?></b>
                                        <?php echo number_format($fila->getRequerimiento()->getPresupuestoMin(), 2) . '-' . number_format($fila->getRequerimiento()->getPresupuestoMax(), 2) ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr/>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="panel panel_ocultar" id="PV">
            <div class="panel-header">
                <h5>Propiedades en Venta</h5>
            </div>
            <div class="panel-content">
                <?php foreach ($propiedad_venta as $fila): ?>
                    <div class="row" onclick="location.href = '<?php echo url_for("negocio/visualizar") . "?id=" . $fila->getId() ?>'">
                        <div class="col-md-2" style="text-align: center;">
                            <div style="; text-align: center;">
                                <?php foreach ($fila->getPropiedad()->getPropiedadImagens() as $fila): ?>
                                    <img style="max-height: 100px" src="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>"/>
                                    <?php break; ?>
                                <?php endforeach; ?>
                                <?php if (sizeof($fila->getPropiedad()->getPropiedadImagens()) == 0): ?>
                                    <div style=";background-color:#f1f3f3; text-align: center;">
                                        <img style="max-height: 100px" src="/assets/img/caracteristicas/casa.png"/>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <table style="width:100%;height: 100%">
                                <tr>
                                    <td># <?php echo $fila->getPropiedad()->getId() ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <?php echo $fila->getPropiedad()->getDireccion() ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:right;">
                                        <b><?php echo $fila->getPropiedad()->getMoneda()->getCodigo() ?></b>
                                        <?php echo number_format($fila->getPropiedad()->getPrecio(), 2) ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr/>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="panel panel_ocultar" id="PR">
            <div class="panel-header">
                <h5>Propiedades en Renta</h5>
            </div>
            <div class="panel-content">
                <?php foreach ($propiedad_renta as $fila): ?>
                    <div class="row" onclick="location.href = '<?php echo url_for("negocio/visualizar") . "?id=" . $fila->getId() ?>'">
                        <div class="col-md-2" style="text-align: center;">
                            <div style="; text-align: center;">
                                <?php foreach ($fila->getPropiedad()->getPropiedadImagens() as $fila): ?>
                                    <img style="max-height: 100px" src="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>"/>
                                    <?php break; ?>
                                <?php endforeach; ?>
                                <?php if (sizeof($fila->getPropiedad()->getPropiedadImagens()) == 0): ?>
                                    <div style=";background-color:#f1f3f3; text-align: center;">
                                        <img style="max-height: 100px" src="/assets/img/caracteristicas/casa.png"/>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <table style="width:100%;height: 100%">
                                <tr>
                                    <td># <?php echo $fila->getPropiedad()->getId() ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <?php echo $fila->getPropiedad()->getDireccion() ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:right;">
                                        <b><?php echo $fila->getPropiedad()->getMoneda()->getCodigo() ?></b>
                                        <?php echo number_format($fila->getPropiedad()->getPrecio(), 2) ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr/>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
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