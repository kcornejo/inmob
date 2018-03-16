<?php if ($negocio->getUsuarioProp() == $usuario_id): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel" style="overflow:hidden;">
                <div class="panel-content">
                    <h5>Mi registro</h5>
                    <hr/>
                    <div class="row">
                        <div class="col-md-2">
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
                        </div>
                        <div class="col-md-10">
                            <h5>
                                <?php echo $negocio->getPropiedad()->getId() ?>
                                |
                                <?php if ($negocio->getPropiedad()->getTipoOperacion() == "Vender"): ?>
                                    Vender
                                <?php else: ?>
                                    Rentar
                                <?php endif; ?>
                                &nbsp;<?php echo $negocio->getPropiedad()->getTipoInmueble(); ?>
                                |
                                <font style="color:#6480AB">
                                <b><?php echo $negocio->getComisionVenta() ?></b>
                                </font>
                                <div class="dropdown" style="float:right;">
                                    <a style="text-decoration: none;cursor:pointer;" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class="glyphicon glyphicon-option-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                        <li>
                                            <a href="<?php echo url_for('negocio/visualizar') . "?id=" . $negocio->getId() ?>">
                                                Visualizar
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <br/>
                                <font style="color:#6480AB">
                                <br/>
                                <b><?php echo $negocio->getPropiedad()->getMoneda()->getCodigo() . ' ' . number_format($negocio->getPropiedad()->getPrecio(), 0) ?></b>
                                </font>
                            </h5>
                            <div class="col-md-6">
                                <table class="table" style="padding: 0;">
                                    <tr>
                                        <td style="padding: 0;">
                                            <b><?php echo $negocio->getPropiedad()->getArea() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 25px;margin-top:-10px;" src="/assets/img/caracteristicas/Area-01.png"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <b><?php echo $negocio->getPropiedad()->getNiveles() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 25px;margin-top:-10px;" src="/assets/img/caracteristicas/Niveles-01.png"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <b><?php echo $negocio->getPropiedad()->getCantidadHabitacion() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 25px;margin-top:-10px;" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <b><?php echo $negocio->getPropiedad()->getCantidadParqueo() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 25px;margin-top:-10px;" src="/assets/img/caracteristicas/Parqueos-01.png"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <b><?php echo $negocio->getPropiedad()->getCantidadBanio() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 25px;margin-top:-10px;" src="/assets/img/caracteristicas/Baños-01.png"/>
                                        </td>
                                    </tr>
                                </table>
                                <?php echo $negocio->getPropiedad()->getDireccionCompleta();?>
                            </div>
                        </div>
                    </div>
                    <br/>
                </div>
            </div>
            <div class="panel" style="overflow:auto;">
                <div class="panel-content">
                    <h5>Los negocios de mi registro</h5>
                    <hr/>
                    <div class="row">
                        <?php foreach ($registros as $fila): ?>
                            <div class="col-md-3">
                                <div class="panel">
                                    <div class="panel-header">
                                        <h5>
                                            <?php echo $fila->getId() ?>
                                            |
                                            <?php if ($fila->getRequerimiento()->getTipoOperacion() == "Comprar"): ?>
                                                Comprar
                                            <?php else: ?>
                                                Rentar
                                            <?php endif; ?>
                                            &nbsp;<?php echo $fila->getRequerimiento()->getTipoInmueble(); ?>
                                            |
                                            <font style="color:#6480AB">
                                            <b><?php echo $fila->getComisionRequerimiento() ?></b>
                                            </font>
                                            <div class="dropdown" style="float:right;">
                                                <a style="text-decoration: none;cursor:pointer;" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <i class="glyphicon glyphicon-option-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                    <li>
                                                        <a href="<?php echo url_for('negocio/visualizar') . "?id=" . $fila->getId() ?>">
                                                            Visualizar
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
                                                    <img style="max-height: 100px" src="<?php echo $fila->getRequerimiento()->getDireccionImagen() ?>"/>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <table style="width:100%;height: 100%" class="table">
                                                    <tr>
                                                        <td style="color:#6480AB" colspan="2">
                                                            <b><?php echo $fila->getRequerimiento()->getMoneda()->getCodigo() ?></b>
                                                            <?php echo number_format($fila->getRequerimiento()->getPresupuestoMin(), 0) . '-' . number_format($fila->getRequerimiento()->getPresupuestoMax(), 0) ?>
                                                            <span class="pull-right badge" style="color:white;margin-right:3px;background-color:#6480AB;">
                                                                <?php echo $fila->getMensajesPendientes(); ?>
                                                            </span>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <table class="table" style="padding: 0;">
                                                                        <tr>
                                                                            <td style="padding: 0;">
                                                                                <b><?php echo $fila->getRequerimiento()->getArea() ?></b>
                                                                            </td>
                                                                            <td style="padding: 0;">
                                                                                <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Area-01.png"/>
                                                                            </td>
                                                                            <td style="padding: 0;">
                                                                                <b><?php echo $fila->getRequerimiento()->getNiveles() ?></b>
                                                                            </td>
                                                                            <td style="padding: 0;">
                                                                                <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Niveles-01.png"/>
                                                                            </td>
                                                                            <td style="padding: 0;">
                                                                                <b><?php echo $fila->getRequerimiento()->getCantidadHabitacion() ?></b>
                                                                            </td>
                                                                            <td style="padding: 0;">
                                                                                <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
                                                                            </td>
                                                                            <td style="padding: 0;">
                                                                                <b><?php echo $fila->getRequerimiento()->getCantidadParqueo() ?></b>
                                                                            </td>
                                                                            <td style="padding: 0;">
                                                                                <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Parqueos-01.png"/>
                                                                            </td>
                                                                            <td style="padding: 0;">
                                                                                <b><?php echo $fila->getRequerimiento()->getCantidadBanio() ?></b>
                                                                            </td>
                                                                            <td style="padding: 0;">
                                                                                <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Baños-01.png"/>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    <tr>
                                                        <td colspan="2">
                                                            <?php
                                                            echo substr($fila->getRequerimiento()->getDireccionCompleta(), 0, 50);
                                                            if (strlen($fila->getRequerimiento()->getDireccionCompleta()) > 50) {
                                                                echo "...";
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-content">
                    <h5>Mi registro</h5>
                    <hr/>
                    <div class="row">
                        <div class="col-md-2" style="text-align: center;">
                            <div style=";background-color:#f1f3f3; text-align: center;">
                                <img style="max-height: 100px" src="<?php echo $negocio->getRequerimiento()->getDireccionImagen() ?>"/>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <h5>
                                <?php echo $negocio->getRequerimiento()->getId() ?>
                                |
                                <?php if ($negocio->getRequerimiento()->getTipoOperacion() == "Comprar"): ?>
                                    Comprar
                                <?php else: ?>
                                    Rentar
                                <?php endif; ?>
                                &nbsp;<?php echo $negocio->getRequerimiento()->getTipoInmueble(); ?>
                                |
                                <font style="color:#6480AB">
                                <b><?php echo $negocio->getRequerimiento()->getMoneda()->getCodigo() . ' ' . number_format($negocio->getRequerimiento()->getPresupuestoMin(), 0) . ' - ' . number_format($negocio->getRequerimiento()->getPresupuestoMax(), 0) ?></b>
                                </font>
                                <div class="dropdown" style="float:right;">
                                    <a style="text-decoration: none;cursor:pointer;" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class="glyphicon glyphicon-option-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                        <li>
                                            <a href="<?php echo url_for('negocio/visualizar') . "?id=" . $negocio->getId() ?>">
                                                Visualizar
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <br/>

                            </h5>
                            <div class="col-md-6">
                                <br/>
                                <table class="table" style="padding: 0;">
                                    <tr>
                                        <td style="padding: 0;">
                                            <b><?php echo $negocio->getRequerimiento()->getArea() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 25px;margin-top:-10px;" src="/assets/img/caracteristicas/Area-01.png"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <b><?php echo $negocio->getRequerimiento()->getNiveles() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 25px;margin-top:-10px;" src="/assets/img/caracteristicas/Niveles-01.png"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <b><?php echo $negocio->getRequerimiento()->getCantidadHabitacion() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 25px;margin-top:-10px;" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <b><?php echo $negocio->getRequerimiento()->getCantidadParqueo() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 25px;margin-top:-10px;" src="/assets/img/caracteristicas/Parqueos-01.png"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <b><?php echo $negocio->getRequerimiento()->getCantidadBanio() ?></b>
                                        </td>
                                        <td style="padding: 0;">
                                            <img style="max-width: 25px;margin-top:-10px;" src="/assets/img/caracteristicas/Baños-01.png"/>
                                        </td>
                                    </tr>
                                </table>
                                <?php echo $negocio->getRequerimiento()->getDireccionCompleta();?>
                            </div>
                        </div>
                    </div>
                    <br/>
                </div>
            </div>
            <div class="panel">
                <div class="panel-content">
                    <h5>Los negocios de mi registro</h5>
                    <hr/>
                    <div class="row">
                        <?php foreach ($registros as $fila): ?>
                            <div class="col-md-3">
                                <div class="panel">
                                    <div class="panel-header">
                                        <h5>
                                            <?php echo $fila->getId() ?>
                                            |
                                            <?php if ($fila->getPropiedad()->getTipoOperacion() == "Vender"): ?>
                                                Vender
                                            <?php else: ?>
                                                Rentar
                                            <?php endif; ?>
                                            &nbsp;<?php echo $fila->getPropiedad()->getTipoInmueble(); ?>
                                            |
                                            <font style="color:#6480AB">
                                            <b><?php echo $fila->getComisionRequerimiento() ?></b>
                                            </font>
                                            <div class="dropdown" style="float:right;">
                                                <a style="text-decoration: none;cursor:pointer;" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <i class="glyphicon glyphicon-option-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                    <li>
                                                        <a href="<?php echo url_for('negocio/visualizar') . "?id=" . $fila->getId() ?>">
                                                            Visualizar
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </h5>
                                    </div>
                                    <div class="panel-content">
                                        <div class="row">
                                            <div class="col-md-12" style="text-align: center;">
                                                <div style=";background-color:#f1f3f3; text-align: center;">
                                                    <?php foreach ($fila->getPropiedad()->getPropiedadImagens() as $fila): ?>
                                                        <img style="max-height: 100px" src="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>"/>
                                                        <?php break; ?>
                                                    <?php endforeach; ?>
                                                    <?php if (sizeof($fila->getPropiedad()->getPropiedadImagens()) == 0): ?>
                                                        <div style=";background-color:#f1f3f3; text-align: center;">
                                                            <img style="max-height: 100px" src="<?php echo $fila->getPropiedad()->getDireccionImagen() ?>"/>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <table style="width:100%;height: 100%" class="table">
                                                    <tr>
                                                        <td style="color:#6480AB" colspan="2">
                                                            <b><?php echo $fila->getPropiedad()->getMoneda()->getCodigo() ?></b>
                                                            <?php echo number_format($fila->getPropiedad()->getPrecio(), 0) ?>
                                                            <span class="pull-right badge" style="color:white;margin-right:3px;background-color:#6480AB;">
                                                                <?php echo $fila->getMensajesPendientes(); ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <table class="table" style="padding: 0;">
                                                                        <tr>
                                                                            <td style="padding: 0;">
                                                                                <b><?php echo $fila->getPropiedad()->getArea() ?></b>
                                                                            </td>
                                                                            <td style="padding: 0;">
                                                                                <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Area-01.png"/>
                                                                            </td>
                                                                            <td style="padding: 0;">
                                                                                <b><?php echo $fila->getPropiedad()->getNiveles() ?></b>
                                                                            </td>
                                                                            <td style="padding: 0;">
                                                                                <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Niveles-01.png"/>
                                                                            </td>
                                                                            <td style="padding: 0;">
                                                                                <b><?php echo $fila->getPropiedad()->getCantidadHabitacion() ?></b>
                                                                            </td>
                                                                            <td style="padding: 0;">
                                                                                <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
                                                                            </td>
                                                                            <td style="padding: 0;">
                                                                                <b><?php echo $fila->getPropiedad()->getCantidadParqueo() ?></b>
                                                                            </td>
                                                                            <td style="padding: 0;">
                                                                                <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Parqueos-01.png"/>
                                                                            </td>
                                                                            <td style="padding: 0;">
                                                                                <b><?php echo $fila->getPropiedad()->getCantidadBanio() ?></b>
                                                                            </td>
                                                                            <td style="padding: 0;">
                                                                                <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Baños-01.png"/>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <?php
                                                            echo substr($fila->getPropiedad()->getDireccionCompleta(), 0, 50);
                                                            if (strlen($fila->getPropiedad()->getDireccionCompleta()) > 50) {
                                                                echo "...";
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
