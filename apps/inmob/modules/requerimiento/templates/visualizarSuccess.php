<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-header"   style="background-color:#305da8;color:white;font-size:14pt;">
                <h3 face="Helvetica">
                    <a href="<?php echo url_for("requerimiento/index") ?>" style="color:white;"><i class="icon icons-arrows-03"></i></a>
                    Requerimiento en <?php
                    switch ($requerimiento->getTipoOperacion()) {
                        case "Comprar":
                            echo "Compra";
                            break;
                        case "Renta";
                            echo "Renta";
                            break;
                    }
                    ?>
                </h3>
            </div>
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-7" style=";background-color:#f1f3f3; text-align: center;">
                        <img style="max-height: 100%" src="<?php echo $requerimiento->getDireccionImagen() ?>"/>
                    </div>
                    <div class="col-md-5">
                        <div class="">
                            <div class="panel-header">
                                <h5 style="color:gray;">
                                    INFORMACION FINANCIERA
                                    <hr/>
                                </h5>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td colspan="2">
                                            Precio: <?php echo $requerimiento->getMoneda()->getCodigo() . " " . number_format($requerimiento->getPresupuestoMin(), 0) . ' - ' . number_format($requerimiento->getPresupuestoMax(), 0) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Forma de pago: <?php echo $requerimiento->getFormaPago() ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div style="float:left;">
                            <h3>
                                <b><?php echo $requerimiento->getMoneda()->getCodigo() ?></b>
                                <?php echo number_format($requerimiento->getPresupuestoMin(), 2) ?> - <?php echo number_format($requerimiento->getPresupuestoMax(), 2) ?>
                            </h3>
                        </div>
                        <div style="float:right;">
                            <h5>
                                <?php echo $requerimiento->getCreatedAt("d/m/Y") ?>
                            </h5>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 bg-gray-light">
                        <br/>
                        <div class="col-md-2 col-sm-4 col-xs-4" style="float:left">
                            <img style="max-height: 60px;" src="/assets/img/caracteristicas/usuario.png"/>
                        </div>
                        <div class="col-md-10 col-sm-8 col-xs-8" >
                            <?php echo $requerimiento->getUsuario()->getNombreCompleto() ?><br/>
                            <?php echo $requerimiento->getUsuario()->getEmail() ?><br/>
                            <?php echo $requerimiento->getUsuario()->getNumeroTelefono() ?><br/>    
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <br/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h5 style="color:gray;">
                        CARACTERISTICAS DEL INMUEBLE
                        <hr/>
                    </h5>
                    <br/>
                    <?php include_partial('soporte/caracteristicas', array('objeto' => $requerimiento)) ?>
                    <div class="col-md-12">
                        <?php $contador = 1 ?>
                        <?php foreach ($requerimiento->getDireccionRequerimientos() as $dir): ?>
                            <h5 style="color:gray;">
                                UBICACION <?php echo $contador ?>
                                <hr/>
                            </h5>
                            <?php echo $dir->getDireccionCompleta()  ?>
                            <?php $contador ++ ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>