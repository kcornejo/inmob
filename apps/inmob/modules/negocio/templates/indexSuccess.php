<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered table-hover">
            <?php foreach ($negocios as $negocio): ?>
                <tr onclick="location.replace('<?php echo url_for('negocio/visualizar') . "?id=" . $negocio->getId() ?>')">
                    <td style="width:30%;text-align: center;">
                        <div style=";background-color:#f1f3f3; text-align: center;">
                            <img style="max-height: 100px" src="/assets/img/caracteristicas/casa.png"/>
                        </div>
                    </td>
                    <td style="width:70%">
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