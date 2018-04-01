<div class="row">
    <?php foreach ($propiedades as $propiedad): ?>
        <div class="col-md-3">
            <div class="panel">
                <div class="panel-header">
                    <h5>
                        PRO<?php echo $propiedad->getId() ?>
                        |
                        <?php echo $propiedad->getTipoInmueble() ?>
                        en <?php
                        if ($propiedad->getTipoOperacion() == "Vender") {
                            echo "Venta";
                        } else {
                            echo "Renta";
                        }
                        ?>
                        <div class="dropdown" style="float:right;">
                            <a style="text-decoration: none;cursor:pointer;" class="dropdown-toggle" type="button"
                               id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="glyphicon glyphicon-option-vertical"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                <li>
                                    <a href="<?php echo url_for('vender/editar') . "?id=" . $propiedad->getId() ?>">
                                        Editar
                                    </a>
                                    <a onclick="if (confirm('Esta seguro de querer eliminar esta propiedad?') == true) {
                                                location.replace('<?php echo url_for("soporte/estatusPropiedad") . "?id=" . $propiedad->getId() . "&valor=Eliminado" ?>');
                                            }" href="#">
                                        Eliminar
                                    </a>
                                    <?php if ($propiedad->getEstatus() == "Disponible"): ?>
                                        <a href="<?php echo url_for("soporte/estatusPropiedad") . "?id=" . $propiedad->getId() . "&valor=Vendido" ?>">
                                            Vendido!
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo url_for("soporte/estatusPropiedad") . "?id=" . $propiedad->getId() . "&valor=Disponible" ?>">
                                            Disponible!
                                        </a>
                                    <?php endif; ?>
                                    <a href="<?php echo url_for('vender/visualizar') . "?id=" . $propiedad->getId() ?>">
                                        Visualizar
                                    </a>
                                    <a onclick="copiar('<?php echo url_for('vender/compartir', true) . "?id=" . $propiedad->getId() ?>')"
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
                            <div style=";background-color:#f1f3f3; text-align: center;">
                                <?php foreach ($propiedad->getPropiedadImagens() as $fila): ?>
                                    <img style="max-height: 100px"
                                         src="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>"/>
                                         <?php break; ?>
                                     <?php endforeach; ?>
                                     <?php if (sizeof($propiedad->getPropiedadImagens()) == 0): ?>
                                    <div style=";background-color:#f1f3f3; text-align: center;">
                                        <img style="max-height: 100px"
                                             src="<?php echo $propiedad->getDireccionImagen() ?>"/>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <table style="width:100%;height: 100%" class="table">
                                <tr>
                                    <td style="color:#6480AB" colspan="2">
                                        <b><?php echo $propiedad->getMoneda()->getCodigo() ?></b>
                                        <?php echo number_format($propiedad->getPrecio(), 0) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php include_partial("soporte/caracteristicas_pequenio", array('objeto' => $propiedad)) ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <?php
                                        echo substr($propiedad->getDireccionCompleta(), 0, 70);
                                        if (strlen($propiedad->getDireccionCompleta()) > 70) {
                                            echo "...";
                                        }
                                        ?>
                                        <br/>
                                        <a style="float:right;" href="<?php echo url_for("vender/visualizar") . "?id=" . $propiedad->getId() ?>">
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
    <a class="col-md-1 col-xs-3 col-sm-1"
       style="position: fixed;bottom: 20px;right: 30px;z-index: 99;border: none;border-radius: 10px"
       href="<?php echo url_for('vender/nueva') ?>">
        <img style="width:100%" src="/assets/img/caracteristicas/Agregar propiedad.png"/>
    </a>
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
                                    });
</script>