<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-header"   style="background-color:#305da8;color:white;font-size:14pt;">
                <h3 face="Helvetica">
                    <a href="<?php echo url_for("vender/index") ?>" style="color:white;"><i class="icon icons-arrows-03"></i></a>
                    <?php echo $propiedad->getTipoInmueble() ?> en <?php
                    switch ($propiedad->getTipoOperacion()) {
                        case "Vender":
                            echo "Venta";
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
                        <?php $contador = false; ?>
                        <?php foreach ($propiedad->getPropiedadImagens() as $fila): ?>
                            <?php if (!$contador): ?>
                                <a class="fancybox" rel="group" href="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>">
                                    <img  src="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>" alt="" style="width:100%"/>
                                </a>
                                <br/><br/>
                            <?php else: ?>
                                <a class="fancybox col-xs-4 col-md-2" rel="group" href="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>">
                                    <img  src="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>" alt="" style="width:100%"/>
                                </a>
                            <?php endif; ?>
                            <?php $contador = true ?>
                        <?php endforeach; ?>
                        <?php if (sizeof($propiedad->getPropiedadImagens()) == 0): ?>
                            <img style="max-height: 100%" src="<?php echo $propiedad->getDireccionImagen() ?>"/>
                        <?php endif; ?>  
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
                                            Precio: <?php echo $propiedad->getMoneda()->getCodigo() . " " . number_format($propiedad->getPrecio(), 0) ?>
                                            &nbsp;<?php echo $propiedad->getNegociable() ? "NEGOCIABLE" : "NO NEGOCIABLE" ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Forma de pago: <?php echo $propiedad->getFormaPago() ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Mantenimiento mensual: <?php echo $propiedad->getMoneda()->getCodigo() . " " . number_format($propiedad->getMantenimientoMensual(), 0) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Iusi trimestral: <?php echo $propiedad->getMoneda()->getCodigo() . " " . number_format($propiedad->getIusiSemestral(), 0) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $propiedad->getIncluyeGastosEscritura() ? "INCLUYE GASTOS DE ESCRITURA" : "NO INCLUYE GASTOS DE ESCRITURA" ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center">
                                    <center>
                                        Comunidad: <input disabled="true" type="number" class="rating" data-readonly value="<?php echo $propiedad->getComunidad() ?>"/>
                                    </center>
                                    </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div style="float:left;">
                            <h3>
                                <b><?php echo $propiedad->getMoneda()->getCodigo() ?></b>
                                <?php echo number_format($propiedad->getPrecio(), 0) ?>
                                <?php if ($propiedad->getNegociable()):; ?>
                                    &nbsp;Negociable
                                <?php endif; ?>
                            </h3>
                        </div>
                        <div style="float:right;">
                            <h5>
                                <?php echo $propiedad->getCreatedAt("d/m/Y") ?>
                            </h5>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 bg-gray-light">
                        <br/>
                        <div class="col-md-2 col-sm-4 col-xs-4" style="float:left">
                            <img style="max-height: 60px;" src="/assets/img/caracteristicas/usuario.png"/>
                        </div>
                        <div class="col-md-10 col-sm-8 col-xs-8" >
                            <?php echo $propiedad->getUsuario()->getNombreCompleto() ?><br/>
                            <?php echo $propiedad->getUsuario()->getEmail() ?><br/>
                            <?php echo $propiedad->getUsuario()->getNumeroTelefono() ?><br/>    
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
                    <?php include_partial('soporte/caracteristicas', array('objeto' => $propiedad)) ?>
                    <div class="col-md-12">
                        <h5 style="color:gray;">
                            UBICACION
                            <hr/>
                        </h5>
                        <?php $propiedad = $propiedad; ?>
                        <?php echo $propiedad->getZona() ? "Zona " . $propiedad->getZona() . ", " : null ?>
                        <?php echo $propiedad->getCarretera() ? "Carretera " . $propiedad->getCarretera() . ", " : null ?>
                        <?php echo $propiedad->getKm() ? "Km " . $propiedad->getKm() . ", " : null ?>
                        <?php echo $propiedad->getMunicipio() ? $propiedad->getMunicipio() . ", " : null ?>
                        <?php echo $propiedad->getDepartamento() ? $propiedad->getDepartamento() . ", " : null ?>
                        <?php echo $propiedad->getDireccion() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>