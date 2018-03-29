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
<?php if ($objeto->getTipoInmueble() != "Oficinas" && $objeto->getTipoInmueble() != "Local"): ?>
    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
        <?php echo $objeto->getArea() ?>
        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Area-01.png"/>
        <br/>Area<br/>
    </div>
<?php endif; ?>
<?php if ($objeto->getTipoInmueble() == "Casa" || $objeto->getTipoInmueble() == "Apartamento" || $objeto->getTipoInmueble() == "Edificio"): ?>
    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
        <?php echo $objeto->getNiveles() ?>
        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Niveles-01.png"/>
        <br/>Niveles<br/>
    </div>
<?php endif; ?>
<?php if ($objeto->getTipoInmueble() == "Casa" || $objeto->getTipoInmueble() == "Apartamento"): ?>
    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
        <?php echo $objeto->getCantidadHabitacion() ?>
        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
        <br/>Habitaciones<br/>
    </div>
<?php endif; ?>
<?php if ($objeto->getTipoInmueble() != "Terreno" && $objeto->getTipoInmueble() != "Bodega"): ?>
    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
        <?php echo $objeto->getCantidadParqueo() ?>
        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Parqueos-01.png"/>
        <br/>Parqueos<br/>
    </div>
<?php endif; ?>
<?php if ($objeto->getTipoInmueble() != "Terreno" && $objeto->getTipoInmueble() != "Bodega"): ?>
    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
        <?php echo $objeto->getCantidadBanio() ?>
        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Baños-01.png"/>
        <br/>Baños<br/>
    </div>
<?php endif; ?>
<?php if ($objeto->getTipoInmueble() != "Oficinas" && $objeto->getTipoInmueble() != "Local"): ?>
    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
        <?php echo $objeto->getAreaX() . "x" . $objeto->getAreaY() ?>
        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Dimensiones-01.png"/>
        <br/>Dimensión<br/>
    </div>
<?php endif; ?>
<?php if ($objeto->getTipoInmueble() != "Oficinas" && $objeto->getTipoInmueble() != "Local" && $objeto->getTipoInmueble() != "Edificio"): ?>
    <?php if ($objeto->getTieneAgua()): ?>
        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Agua-01.png"/>
            <br/>Agua<br/>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php if ($objeto->getTipoInmueble() != "Oficinas" && $objeto->getTipoInmueble() != "Local" && $objeto->getTipoInmueble() != "Edificio"): ?>
    <?php if ($objeto->getTieneLuz()): ?>
        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Energia electrica-01.png"/>
            <br/>Luz<br/>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php if ($objeto->getTipoInmueble() == "Casa" || $objeto->getTipoInmueble() == "Apartamento"): ?>
    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
        <?php echo $objeto->getCantidadComedor() ?>
        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Comedor.png"/>
        <br/>Comedor<br/>
    </div>

    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
        <?php echo $objeto->getCantidadSala() ?>
        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Sala.png"/>
        <br/>Sala<br/>
    </div>
    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
        <?php echo $objeto->getCantidadCocina() ?>
        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Cocina.png"/>
        <br/>Cocina<br/>
    </div>
    <?php if ($objeto->getDormitorioServicio()): ?>
        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Dormitorio de servicio.png"/>
            <br/>Dorm. de Servicio<br/>
        </div>
    <?php endif; ?>
    <?php if ($objeto->getEstudio()): ?>
        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Estudio.png"/>
            <br/>Estudio<br/>
        </div>
    <?php endif; ?>
    <?php if ($objeto->getCisterna()): ?>
        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Cisterna-01.png"/>
            <br/>Cisterna<br/>
        </div>
    <?php endif; ?>
    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
        <?php echo $objeto->getCantidadJardin() ?>
        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Jardin.png"/>
        <br/>Jardin<br/>
    </div>
    <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
        <?php echo $objeto->getCantidadPatio() ?>
        <img style="max-width: 30px;" src="/assets/img/caracteristicas/Patio.png"/>
        <br/>Patio<br/>
    </div>
    <?php if ($objeto->getLavanderia()): ?>
        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Lavanderia.png"/>
            <br/>Lavanderia<br/>
        </div>
    <?php endif; ?>
<?php endif; ?>