<?php
$usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
if ($negocio) {
    if ($negocio->getUsuarioProp() == $usuario_id) {
        $objeto = $negocio->getRequerimiento();
    } else {
        $objeto = $negocio->getPropiedad();
    }
}
?>
<?php if ($objeto->getTipoInmueble() == "Oficinas"): ?>
    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
        <span style="font-size: x-large">
            <?php echo $objeto->getCantidadCubiculo() ?>
        </span>
        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Estudio.png"/>
        <br/>Area<br/><br/>
    </div>
<?php endif; ?>
<?php if ($objeto->getTipoInmueble() != "Oficinas" && $objeto->getTipoInmueble() != "Local"): ?>
    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
        <span style="font-size: x-large">
            <?php echo $objeto->getArea() ?>
        </span>
        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Area-01.png"/>
        <br/>Area<br/><br/>
    </div>
<?php endif; ?>
<?php if ($objeto->getTipoInmueble() == "Casa" || $objeto->getTipoInmueble() == "Apartamento" || $objeto->getTipoInmueble() == "Edificio"): ?>
    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
        <span style="font-size: x-large">
            <?php echo $objeto->getNiveles() ?>
        </span>
        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Niveles-01.png"/>
        <br/>Niveles<br/><br/>
    </div>
<?php endif; ?>
<?php if ($objeto->getTipoInmueble() == "Casa" || $objeto->getTipoInmueble() == "Apartamento"): ?>
    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
        <span style="font-size: x-large">
            <?php echo $objeto->getCantidadHabitacion() ?>
        </span>
        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
        <br/>Habitaciones<br/><br/>
    </div>
<?php endif; ?>
<?php if ($objeto->getTipoInmueble() != "Terreno" && $objeto->getTipoInmueble() != "Bodega"): ?>
    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
        <span style="font-size: x-large">
            <?php echo $objeto->getCantidadParqueo() ?>
        </span>
        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Parqueos-01.png"/>
        <br/>Parqueos<br/><br/>
    </div>
<?php endif; ?>
<?php if ($objeto->getTipoInmueble() != "Terreno" && $objeto->getTipoInmueble() != "Bodega"): ?>
    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
        <span style="font-size: x-large">
            <?php echo $objeto->getCantidadBanio() ?>
        </span>
        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Baños-01.png"/>
        <br/>Baños<br/><br/>
    </div>
<?php endif; ?>
<?php if ($objeto->getTipoInmueble() != "Oficinas" && $objeto->getTipoInmueble() != "Local"): ?>
    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
        <span style="font-size: x-large">
            <?php echo $objeto->getAreaX() . "x" . $objeto->getAreaY() ?>
        </span>
        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Dimensiones-01.png"/>
        <br/>Dimensión<br/><br/>
    </div>
<?php endif; ?>
<?php if ($objeto->getTipoInmueble() != "Oficinas" && $objeto->getTipoInmueble() != "Local" && $objeto->getTipoInmueble() != "Edificio"): ?>
    <?php if ($objeto->getTieneAgua()): ?>
        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Agua-01.png"/>
            <br/>Agua<br/><br/>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php if ($objeto->getTipoInmueble() != "Oficinas" && $objeto->getTipoInmueble() != "Local" && $objeto->getTipoInmueble() != "Edificio"): ?>
    <?php if ($objeto->getTieneLuz()): ?>
        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Energia electrica-01.png"/>
            <br/>Luz<br/><br/>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php if ($objeto->getTipoInmueble() == "Casa" || $objeto->getTipoInmueble() == "Apartamento"): ?>
    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
        <span style="font-size: x-large">
            <?php echo $objeto->getCantidadComedor() ?>
        </span>
        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Comedor.png"/>
        <br/>Comedor<br/><br/>
    </div>

    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
        <span style="font-size: x-large">
            <?php echo $objeto->getCantidadSala() ?>
        </span>
        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Sala.png"/>
        <br/>Sala<br/><br/>
    </div>
    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
        <span style="font-size: x-large">
            <?php echo $objeto->getCantidadCocina() ?>
        </span>
        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Cocina.png"/>
        <br/>Cocina<br/><br/>
    </div>
    <?php if ($objeto->getDormitorioServicio()): ?>
        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Dormitorio de servicio.png"/>
            <br/>Dorm. de Servicio<br/><br/>
        </div>
    <?php endif; ?>
    <?php if ($objeto->getEstudio()): ?>
        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Estudio.png"/>
            <br/>Estudio<br/><br/>
        </div>
    <?php endif; ?>
    <?php if ($objeto->getCisterna()): ?>
        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Cisterna-01.png"/>
            <br/>Cisterna<br/><br/>
        </div>
    <?php endif; ?>
    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
        <span style="font-size: x-large">
            <?php echo $objeto->getCantidadJardin() ?>
        </span>
        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Jardin.png"/>
        <br/>Jardin<br/><br/>
    </div>
    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
        <span style="font-size: x-large">
            <?php echo $objeto->getCantidadPatio() ?>
        </span>
        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Patio.png"/>
        <br/>Patio<br/><br/>
    </div>
    <?php if ($objeto->getLavanderia()): ?>
        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Lavanderia.png"/>
            <br/>Lavanderia<br/><br/>
        </div>
    <?php endif; ?>
<?php endif; ?>