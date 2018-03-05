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
                        <div class="panel">
                            <div class="panel-header">
                                <h5 style="color:gray;">
                                    INFORMACION FINANCIERA
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
                                            Forma de Pago: <?php echo $requerimiento->getFormaPago() ?>
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
                    </h5>
                    <br/>
                    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                        <?php echo $requerimiento->getArea() ?>
                        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Area-01.png"/>
                        <br/><br/>
                    </div>
                    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                        <?php echo $requerimiento->getNiveles() ?>
                        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Niveles-01.png"/>
                        <br/><br/>
                    </div>
                    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                        <?php echo $requerimiento->getCantidadHabitacion() ?>
                        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
                        <br/><br/>
                    </div>
                    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                        <?php echo $requerimiento->getCantidadParqueo() ?>
                        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Parqueos-01.png"/>
                        <br/><br/>
                    </div>
                    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                        <?php echo $requerimiento->getCantidadBanio() ?>
                        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Baños-01.png"/>
                        <br/><br/>
                    </div>
                    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                        <?php echo $requerimiento->getAreaX() . "x" . $requerimiento->getAreaY() ?>
                        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Dimensiones-01.png"/>
                        <br/><br/>
                    </div>
                    <?php if ($requerimiento->getTieneAgua()): ?>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Agua-01.png"/>
                            <br/><br/>
                        </div>
                    <?php endif; ?>
                    <?php if ($requerimiento->getTieneLuz()): ?>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Energia electrica-01.png"/>
                            <br/><br/>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                        <?php echo $requerimiento->getCantidadComedor() ?>
                        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Comedor.png"/>
                        <br/><br/>
                    </div>
                    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                        <?php echo $requerimiento->getCantidadSala() ?>
                        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Sala.png"/>
                        <br/><br/>
                    </div>
                    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                        <?php echo $requerimiento->getCantidadCocina() ?>
                        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Cocina.png"/>
                        <br/><br/>
                    </div>
                    <?php if ($requerimiento->getDormitorioServicio()): ?>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Dormitorio de servicio.png"/>
                            <br/><br/>
                        </div>
                    <?php endif; ?>
                    <?php if ($requerimiento->getEstudio()): ?>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Estudio.png"/>
                            <br/><br/>
                        </div>
                    <?php endif; ?>
                    <?php if ($requerimiento->getCisterna()): ?>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Cisterna-01.png"/>
                            <br/><br/>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                        <?php echo $requerimiento->getCantidadJardin() ?>
                        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Jardin.png"/>
                        <br/><br/>
                    </div>
                    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                        <?php echo $requerimiento->getCantidadPatio() ?>
                        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Patio.png"/>
                        <br/><br/>
                    </div>
                    <?php if ($requerimiento->getLavanderia()): ?>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Lavanderia.png"/>
                            <br/><br/>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-12">
                        <?php $contador = 1 ?>
                        <?php foreach ($requerimiento->getDireccionRequerimientos() as $dir): ?>
                            <h5 style="color:gray;">
                                UBICACION <?php echo $contador ?>
                            </h5>
                            <?php $propiedad = $dir; ?>
                            <?php echo $propiedad->getZona() ? "Zona " . $propiedad->getZona() . ", " : null ?>
                            <?php echo $propiedad->getCarretera() ? "Carretera " . $propiedad->getCarretera() . ", " : null ?>
                            <?php echo $propiedad->getKm() ? "Km " . $propiedad->getKm() . ", " : null ?>
                            <?php echo $propiedad->getMunicipio() ? $propiedad->getMunicipio() . ", " : null ?>
                            <?php echo $propiedad->getDepartamento() ? $propiedad->getDepartamento() . ", " : null ?>
                            <?php echo $propiedad->getDireccion() ?>
                            <?php $contador ++ ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>