
<ul id="myTab6" class="nav nav-tabs">
    <li class="active"><a href="#tab6_1" data-toggle="tab" aria-expanded="true">Vender Propiedad</a></li>
    <li class=""><a href="#tab6_2" data-toggle="tab" aria-expanded="false">Requerimiento Propiedad</a></li>
    <li class=""><a href="#tab6_3" data-toggle="tab" aria-expanded="false">Negocio</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade active in" id="tab6_1">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered table-hover">
                    <?php foreach ($propiedades as $propiedad): ?>
                        <tr>
                            <td style="width:40%">
                                <?php foreach ($propiedad->getPropiedadImagens() as $fila): ?>
                                    <img style="width:100%" src="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>"/>
                                    <?php break; ?>
                                <?php endforeach; ?>
                                <?php if (sizeof($propiedad->getPropiedadImagens()) == 0): ?>
                                    <div style=";background-color:#f1f3f3; text-align: center;">
                                        <img style="width:100%" src="/assets/img/caracteristicas/casa.png"/>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td style="width:60%;vertical-align:top">
                                <table style="width:100%;height: 100%">
                                    <tr>
                                        <td># <?php echo $propiedad->getId() ?></td>
                                        <td style="text-align:right;">
                                            <b><?php echo $propiedad->getMoneda()->getCodigo() ?></b>
                                            <?php echo number_format($propiedad->getPrecio(), 2) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Casa en <?php
                                            if ($propiedad->getTipoOperacion() == "Vender") {
                                                echo "Venta";
                                            } else {
                                                echo "Renta";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="text-align: right;">
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
                                            <select class="ajusta_propiedad" referencia="<?php echo $propiedad->getId() ?>" >
                                                <option value="Disponible" <?php echo $propiedad->getEstatus() == "Disponible" ? "selected" : null ?>>Disponible</option>
                                                <option value="Vendido" <?php echo $propiedad->getEstatus() == "Vendido" ? "selected" : null ?>>Vendido</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <hr/>
            <button style="float:right" onclick="location.replace('<?php echo url_for('vender/nueva') ?>');" type="button" class="btn btn-icon btn-rounded btn-primary"><i class="fa fa-plus"></i></button>
        </div>
    </div>
    <div class="tab-pane fade" id="tab6_2">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered table-hover">
                    <?php foreach ($requerimientos as $requerimiento): ?>
                        <tr>
                            <td style="width:40%">
                                <div style=";background-color:#f1f3f3; text-align: center;">
                                    <img style="width:100%" src="/assets/img/caracteristicas/casa.png"/>
                                </div>
                            </td>
                            <td style="width:60%;vertical-align:top">
                                <table style="width:100%;height: 100%">
                                    <tr>
                                        <td># <?php echo $requerimiento->getId() ?></td>
                                        <td style="text-align:right;">
                                            <b><?php echo $requerimiento->getMonedaRelatedByMonedaId()->getCodigo() ?></b>
                                            <?php echo number_format($requerimiento->getPresupuestoMin(), 2) . '-' . number_format($requerimiento->getPresupuestoMax(), 2) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Casa en <?php
                                            if ($requerimiento->getTipoOperacion() == "Comprar") {
                                                echo "Compra";
                                            } else {
                                                echo "Renta";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="text-align: right;">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="caret"></span>
                                                </button>
                                                <span class="dropdown-arrow"></span>
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
                                            <select class="ajusta_requerimiento" referencia="<?php echo $requerimiento->getId() ?>" >
                                                <option value="Disponible" <?php echo $requerimiento->getEstatus() == "Disponible" ? "selected" : null ?>>Disponible</option>
                                                <option value="Vendido" <?php echo $requerimiento->getEstatus() == "Vendido" ? "selected" : null ?>>Vendido</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <hr/>
            <button style="float:right" onclick="location.replace('<?php echo url_for('requerimiento/nueva') ?>');" type="button" class="btn btn-icon btn-rounded btn-primary"><i class="fa fa-plus"></i></button>
        </div>
    </div>
    <div class="tab-pane fade" id="tab6_3">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered table-hover">
                    <?php foreach ($negocios as $negocio): ?>
                        <tr onclick="location.replace('<?php echo url_for('negocio/visualizar') . "?id=" . $negocio->getId() ?>')">
                            <td style="width:40%">
                                <div style=";background-color:#f1f3f3; text-align: center;">
                                    <img style="width:100%" src="/assets/img/caracteristicas/casa.png"/>
                                </div>
                            </td>
                            <td style="width:60%">
                                <table style="width:100%;">
                                    <tr>
                                        <td>Propiedad #<?php echo $negocio->getPropiedadId() ?></td>
                                        <td style="text-align:right;">
                                            Requerimiento #<?php echo $negocio->getRequerimientoId() ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
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
                                    $.get("<?php echo url_for("soporte/estatusPropiedad") ?>", {"id" : referencia, "valor" : valor});
                                });
                                $(".ajusta_requerimiento").on('change', function () {
                                    var referencia = $(this).attr("referencia");
                                    var valor = $(this).val();
                                    $.get("<?php echo url_for("soporte/estatusRequerimiento") ?>", {"id" : referencia, "valor" : valor});
                                });
                            });
</script>