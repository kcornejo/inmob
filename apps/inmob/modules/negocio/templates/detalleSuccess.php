<?php
//Yo subi el requerimiento, quiero ver propiedades
?>
<?php if ($negocio->getUsuarioReq() == $usuario_id): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-content">
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
                                    Vender Casa
                                <?php else: ?>
                                    Rentar Casa
                                <?php endif; ?>
                                |
                                <font style="color:#6480AB">
                                <b><?php echo $negocio->getComisionRequerimiento() ?></b>
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
                                <b><?php echo $negocio->getRequerimiento()->getMoneda()->getCodigo() . ' ' . number_format($negocio->getRequerimiento()->getPresupuestoMin(), 0) . ' - ' . number_format($negocio->getRequerimiento()->getPresupuestoMax(), 0) ?></b>
                                </font>
                            </h5>
                            <div class="col-md-6">
                                <div class="col-md-2 col-xs-3 col-sm-3" style="text-align: center;">
                                    <b><?php echo $negocio->getPropiedad()->getArea() ?>&nbsp;</b>
                                    <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Area-01.png"/>
                                </div>
                                <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                    <b><?php echo $negocio->getPropiedad()->getNiveles() ?>&nbsp;</b>
                                    <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Niveles-01.png"/>
                                </div>
                                <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                    <b><?php echo $negocio->getPropiedad()->getCantidadHabitacion() ?>&nbsp;</b>
                                    <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
                                </div>
                                <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                    <b><?php echo $negocio->getPropiedad()->getCantidadParqueo() ?>&nbsp;</b>
                                    <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Parqueos-01.png"/>
                                </div>
                                <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                    <b><?php echo $negocio->getPropiedad()->getCantidadBanio() ?>&nbsp;</b>
                                    <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Baños-01.png"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                </div>
            </div>
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12">
                            <?php foreach ($registros as $fila): ?>
                                <div class="col-md-3">
                                    <div class="panel">
                                        <div class="panel-header">
                                            <h5>
                                                <?php echo $fila->getId() ?>
                                                |
                                                Comprar casa
                                                |
                                                <font style="color:#6480AB">
                                                <b><?php echo $fila->getComisionVenta() ?></b>
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
                                        <div class="panel">
                                            <div class="row">
                                                <div class="col-md-12" style="text-align: center;">
                                                    <div style=";background-color:#f1f3f3; text-align: center;">
                                                        <img style="max-height: 100px" src="/assets/img/caracteristicas/casa.png"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <table style="width:100%;height: 100%">
                                                        <tr>
                                                            <td style="color:#6480AB" colspan="2">
                                                                <b><?php echo $fila->getRequerimiento()->getMoneda()->getCodigo() ?></b>
                                                                <?php echo number_format($fila->getRequerimiento()->getPresupuestoMin(), 0) . '-' . number_format($fila->getRequerimiento()->getPresupuestoMax(), 0) ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <div class="row">
                                                                    <br/><br/>
                                                                    <div class="col-md-2 col-xs-3 col-sm-3" style="text-align: center;">
                                                                        <b><?php echo $fila->getRequerimiento()->getArea() ?>&nbsp;</b>
                                                                        <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Area-01.png"/>
                                                                    </div>
                                                                    <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                                                        <b><?php echo $fila->getRequerimiento()->getNiveles() ?>&nbsp;</b>
                                                                        <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Niveles-01.png"/>
                                                                    </div>
                                                                    <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                                                        <b><?php echo $fila->getRequerimiento()->getCantidadHabitacion() ?>&nbsp;</b>
                                                                        <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
                                                                    </div>
                                                                    <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                                                        <b><?php echo $fila->getRequerimiento()->getCantidadParqueo() ?>&nbsp;</b>
                                                                        <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Parqueos-01.png"/>
                                                                    </div>
                                                                    <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                                                        <b><?php echo $fila->getRequerimiento()->getCantidadBanio() ?>&nbsp;</b>
                                                                        <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Baños-01.png"/>
                                                                    </div>
                                                                    <br/><br/>
                                                                </div>
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
    </div>
<?php else: ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-2" style="text-align: center;">
                            <div style=";background-color:#f1f3f3; text-align: center;">
                                <img style="max-height: 100px" src="/assets/img/caracteristicas/casa.png"/>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <h5>
                                <?php echo $negocio->getRequerimiento()->getId() ?>
                                |
                                <?php if ($negocio->getRequerimiento()->getTipoOperacion() == "Vender"): ?>
                                    Vender Casa
                                <?php else: ?>
                                    Rentar Casa
                                <?php endif; ?>
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
                                <b><?php echo $negocio->getRequerimiento()->getMoneda()->getCodigo() . ' ' . number_format($negocio->getRequerimiento()->getPresupuestoMin(), 0) . ' - ' . number_format($negocio->getRequerimiento()->getPresupuestoMax(), 0) ?></b>
                                </font>
                            </h5>
                            <div class="col-md-6">
                                <div class="col-md-2 col-xs-3 col-sm-3" style="text-align: center;">
                                    <b><?php echo $negocio->getPropiedad()->getArea() ?>&nbsp;</b>
                                    <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Area-01.png"/>
                                </div>
                                <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                    <b><?php echo $negocio->getPropiedad()->getNiveles() ?>&nbsp;</b>
                                    <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Niveles-01.png"/>
                                </div>
                                <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                    <b><?php echo $negocio->getPropiedad()->getCantidadHabitacion() ?>&nbsp;</b>
                                    <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
                                </div>
                                <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                    <b><?php echo $negocio->getPropiedad()->getCantidadParqueo() ?>&nbsp;</b>
                                    <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Parqueos-01.png"/>
                                </div>
                                <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                    <b><?php echo $negocio->getPropiedad()->getCantidadBanio() ?>&nbsp;</b>
                                    <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Baños-01.png"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                </div>
            </div>
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12">
                            <?php foreach ($registros as $fila): ?>
                                <div class="col-md-3">
                                    <div class="panel">
                                        <div class="panel-header">
                                            <h5>
                                                <?php echo $fila->getId() ?>
                                                |
                                                Comprar casa
                                                |
                                                <font style="color:#6480AB">
                                                <b><?php echo $fila->getComisionVenta() ?></b>
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
                                        <div class="panel">
                                            <div class="row">
                                                <div class="col-md-12" style="text-align: center;">
                                                    <div style=";background-color:#f1f3f3; text-align: center;">
                                                        <img style="max-height: 100px" src="/assets/img/caracteristicas/casa.png"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <table style="width:100%;height: 100%">
                                                        <tr>
                                                            <td style="color:#6480AB" colspan="2">
                                                                <b><?php echo $fila->getRequerimiento()->getMoneda()->getCodigo() ?></b>
                                                                <?php echo number_format($fila->getRequerimiento()->getPresupuestoMin(), 0) . '-' . number_format($fila->getRequerimiento()->getPresupuestoMax(), 0) ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <div class="row">
                                                                    <br/><br/>
                                                                    <div class="col-md-2 col-xs-3 col-sm-3" style="text-align: center;">
                                                                        <b><?php echo $fila->getRequerimiento()->getArea() ?>&nbsp;</b>
                                                                        <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Area-01.png"/>
                                                                    </div>
                                                                    <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                                                        <b><?php echo $fila->getRequerimiento()->getNiveles() ?>&nbsp;</b>
                                                                        <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Niveles-01.png"/>
                                                                    </div>
                                                                    <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                                                        <b><?php echo $fila->getRequerimiento()->getCantidadHabitacion() ?>&nbsp;</b>
                                                                        <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
                                                                    </div>
                                                                    <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                                                        <b><?php echo $fila->getRequerimiento()->getCantidadParqueo() ?>&nbsp;</b>
                                                                        <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Parqueos-01.png"/>
                                                                    </div>
                                                                    <div class="col-md-2 col-xs-2 col-sm-2" style="text-align: center;">
                                                                        <b><?php echo $fila->getRequerimiento()->getCantidadBanio() ?>&nbsp;</b>
                                                                        <img style="max-width: 30px;position:absolute;margin-top:-10px;" src="/assets/img/caracteristicas/Baños-01.png"/>
                                                                    </div>
                                                                    <br/><br/>
                                                                </div>
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
    </div>
<?php endif; ?>
