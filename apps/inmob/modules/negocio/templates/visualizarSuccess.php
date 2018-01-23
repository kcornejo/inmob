<?php if ($usuario_id == $negocio->getUsuarioReq()): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-header" style="background-color:#305da8;color:white;font-size:14pt;">
                    <h3 face="Helvetica">
                        <a style="color:white;" href="<?php echo url_for("negocio/index") ?>"><i class="icon icons-arrows-03"></i></a>
                        Casa en <?php
                        switch ($negocio->getPropiedad()->getTipoOperacion()) {
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
                        <div class="col-md-12" style=";background-color:#f1f3f3; text-align: center;">
                            <?php $contador = false; ?>
                            <?php foreach ($negocio->getPropiedad()->getPropiedadImagens() as $fila): ?>
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
                            <?php if (sizeof($negocio->getPropiedad()->getPropiedadImagens()) == 0): ?>
                                <img style="max-height: 100%" src="/assets/img/caracteristicas/casa.png"/>
                            <?php endif; ?>  
                        </div>
                        <div class="col-md-12">
                            <div style="float:left;">
                                <h3>
                                    <b><?php echo $negocio->getPropiedad()->getMoneda()->getCodigo() ?></b>
                                    <?php echo number_format($negocio->getPropiedad()->getPrecio(), 2) ?>
                                    <?php if ($negocio->getPropiedad()->getNegociable()):; ?>
                                        &nbsp;Negociable
                                    <?php endif; ?>
                                </h3>
                            </div>
                            <div style="float:right;">
                                <h5>
                                    <?php echo $negocio->getPropiedad()->getCreatedAt("d/m/Y") ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 bg-gray-light">
                            <br/>
                            <div class="col-md-2 col-sm-4 col-xs-4" style="float:left">
                                <img style="max-height: 60px;" src="/assets/img/caracteristicas/usuario.png"/>
                            </div>
                            <div class="col-md-10 col-sm-8 col-xs-8" >
                                <?php echo $negocio->getPropiedad()->getUsuario()->getNombreCompleto() ?><br/>
                                <?php echo $negocio->getPropiedad()->getUsuario()->getEmail() ?><br/>
                                <?php echo $negocio->getPropiedad()->getUsuario()->getNumeroTelefono() ?><br/>    
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <br/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <br/>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <?php echo $negocio->getPropiedad()->getArea() ?>
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Area-01.png"/>
                            <br/><br/>
                        </div>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <?php echo $negocio->getPropiedad()->getNiveles() ?>
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Niveles-01.png"/>
                            <br/><br/>
                        </div>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <?php echo $negocio->getPropiedad()->getCantidadHabitacion() ?>
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
                            <br/><br/>
                        </div>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <?php echo $negocio->getPropiedad()->getCantidadParqueo() ?>
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Parqueos-01.png"/>
                            <br/><br/>
                        </div>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <?php echo $negocio->getPropiedad()->getCantidadBanio() ?>
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Baños-01.png"/>
                            <br/><br/>
                        </div>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <?php echo $negocio->getPropiedad()->getAreaX() . "x" . $negocio->getPropiedad()->getAreaY() ?>
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Dimensiones-01.png"/>
                            <br/><br/>
                        </div>
                        <?php if ($negocio->getPropiedad()->getTieneAgua()): ?>
                            <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                <img style="max-width: 30px;" src="/assets/img/caracteristicas/Agua-01.png"/>
                                <br/><br/>
                            </div>
                        <?php endif; ?>
                        <?php if ($negocio->getPropiedad()->getTieneLuz()): ?>
                            <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                <img style="max-width: 30px;" src="/assets/img/caracteristicas/Energia electrica-01.png"/>
                                <br/><br/>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <?php echo $negocio->getPropiedad()->getCantidadComedor() ?>
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Comedor.png"/>
                            <br/><br/>
                        </div>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <?php echo $negocio->getPropiedad()->getCantidadSala() ?>
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Sala.png"/>
                            <br/><br/>
                        </div>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <?php echo $negocio->getPropiedad()->getCantidadCocina() ?>
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Cocina.png"/>
                            <br/><br/>
                        </div>
                        <?php if ($negocio->getPropiedad()->getDormitorioServicio()): ?>
                            <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                <img style="max-width: 30px;" src="/assets/img/caracteristicas/Dormitorio de servicio.png"/>
                                <br/><br/>
                            </div>
                        <?php endif; ?>
                        <?php if ($negocio->getPropiedad()->getEstudio()): ?>
                            <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                <img style="max-width: 30px;" src="/assets/img/caracteristicas/Estudio.png"/>
                                <br/><br/>
                            </div>
                        <?php endif; ?>
                        <?php if ($negocio->getPropiedad()->getCisterna()): ?>
                            <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                <img style="max-width: 30px;" src="/assets/img/caracteristicas/Cisterna-01.png"/>
                                <br/><br/>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <?php echo $negocio->getPropiedad()->getCantidadJardin() ?>
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Jardin.png"/>
                            <br/><br/>
                        </div>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <?php echo $negocio->getPropiedad()->getCantidadPatio() ?>
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Patio.png"/>
                            <br/><br/>
                        </div>
                        <?php if ($negocio->getPropiedad()->getLavanderia()): ?>
                            <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                <img style="max-width: 30px;" src="/assets/img/caracteristicas/Lavanderia.png"/>
                                <br/><br/>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="col-md-1 col-xs-3 col-sm-1" target="_blank" style="position: fixed;bottom: 20px;right: 30px;z-index: 99;border: none;border-radius: 10px" href="tel:<?php echo $negocio->getPropiedad()->getUsuario()->getNumeroTelefono() ?>">
        <img style="width:100%" src="/assets/img/caracteristicas/Negocios - llamar.png"/>
    </a>
<?php else: ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-header bg-primary">
                    <h3>
                        Requerimiento en <?php
                        switch ($negocio->getRequerimiento()->getTipoOperacion()) {
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
                        <div class="col-md-12" style=";background-color:#f1f3f3; text-align: center;">
                            <?php $contador = false; ?>
                            <?php foreach ($negocio->getPropiedad()->getPropiedadImagens() as $fila): ?>
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
                            <?php if (sizeof($negocio->getPropiedad()->getPropiedadImagens()) == 0): ?>
                                <img style="max-height: 100%" src="/assets/img/caracteristicas/casa.png"/>
                            <?php endif; ?>  
                        </div>
                        <div class="col-md-12">
                            <div style="float:left;">
                                <h3>
                                    <b><?php echo $negocio->getRequerimiento()->getMonedaRelatedByMonedaId()->getCodigo() ?></b>
                                    <?php echo number_format($negocio->getRequerimiento()->getPresupuestoMin(), 2) ?> - <?php echo number_format($negocio->getRequerimiento()->getPresupuestoMax(), 2) ?>
                                </h3>
                            </div>
                            <div style="float:right;">
                                <h5>
                                    <?php echo $negocio->getRequerimiento()->getCreatedAt("d/m/Y") ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 bg-gray-light">
                            <br/>
                            <div class="col-md-2 col-sm-4 col-xs-4" style="float:left">
                                <img style="max-height: 60px;" src="/assets/img/caracteristicas/usuario.png"/>
                            </div>
                            <div class="col-md-10 col-sm-8 col-xs-8" >
                                <?php echo $negocio->getRequerimiento()->getUsuario()->getNombreCompleto() ?><br/>
                                <?php echo $negocio->getRequerimiento()->getUsuario()->getEmail() ?><br/>
                                <?php echo $negocio->getRequerimiento()->getUsuario()->getNumeroTelefono() ?><br/>    
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <br/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <br/>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <?php echo $negocio->getPropiedad()->getArea() ?>
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Area-01.png"/>
                            <br/><br/>
                        </div>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <?php echo $negocio->getPropiedad()->getNiveles() ?>
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Niveles-01.png"/>
                            <br/><br/>
                        </div>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <?php echo $negocio->getPropiedad()->getCantidadHabitacion() ?>
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
                            <br/><br/>
                        </div>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <?php echo $negocio->getPropiedad()->getCantidadParqueo() ?>
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Parqueos-01.png"/>
                            <br/><br/>
                        </div>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <?php echo $negocio->getPropiedad()->getCantidadBanio() ?>
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Baños-01.png"/>
                            <br/><br/>
                        </div>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <?php echo $negocio->getPropiedad()->getAreaX() . "x" . $negocio->getPropiedad()->getAreaY() ?>
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Dimensiones-01.png"/>
                            <br/><br/>
                        </div>
                        <?php if ($negocio->getPropiedad()->getTieneAgua()): ?>
                            <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                <img style="max-width: 30px;" src="/assets/img/caracteristicas/Agua-01.png"/>
                                <br/><br/>
                            </div>
                        <?php endif; ?>
                        <?php if ($negocio->getPropiedad()->getTieneLuz()): ?>
                            <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                <img style="max-width: 30px;" src="/assets/img/caracteristicas/Energia electrica-01.png"/>
                                <br/><br/>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <?php echo $negocio->getPropiedad()->getCantidadComedor() ?>
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Comedor.png"/>
                            <br/><br/>
                        </div>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <?php echo $negocio->getPropiedad()->getCantidadSala() ?>
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Sala.png"/>
                            <br/><br/>
                        </div>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <?php echo $negocio->getPropiedad()->getCantidadCocina() ?>
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Cocina.png"/>
                            <br/><br/>
                        </div>
                        <?php if ($negocio->getPropiedad()->getDormitorioServicio()): ?>
                            <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                <img style="max-width: 30px;" src="/assets/img/caracteristicas/Dormitorio de servicio.png"/>
                                <br/><br/>
                            </div>
                        <?php endif; ?>
                        <?php if ($negocio->getPropiedad()->getEstudio()): ?>
                            <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                <img style="max-width: 30px;" src="/assets/img/caracteristicas/Estudio.png"/>
                                <br/><br/>
                            </div>
                        <?php endif; ?>
                        <?php if ($negocio->getPropiedad()->getCisterna()): ?>
                            <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                <img style="max-width: 30px;" src="/assets/img/caracteristicas/Cisterna-01.png"/>
                                <br/><br/>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <?php echo $negocio->getPropiedad()->getCantidadJardin() ?>
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Jardin.png"/>
                            <br/><br/>
                        </div>
                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                            <?php echo $negocio->getPropiedad()->getCantidadPatio() ?>
                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Patio.png"/>
                            <br/><br/>
                        </div>
                        <?php if ($negocio->getPropiedad()->getLavanderia()): ?>
                            <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                <img style="max-width: 30px;" src="/assets/img/caracteristicas/Lavanderia.png"/>
                                <br/><br/>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="col-md-1 col-xs-3 col-sm-1" target="_blank" style="position: fixed;bottom: 20px;right: 30px;z-index: 99;border: none;border-radius: 10px" href="tel:<?php echo $negocio->getRequerimiento()->getUsuario()->getNumeroTelefono() ?>">
        <img style="width:100%" src="/assets/img/caracteristicas/Negocios - llamar.png"/>
    </a>
<?php endif; ?>
