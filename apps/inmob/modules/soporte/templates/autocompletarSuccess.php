<?php if (sizeof($archivos) > 0): ?>
    <li class="list-group-item"><b>Archivos</b></li>
    <?php foreach ($archivos as $archivo): ?>
        <li class="list-group-item list-group-item-info"  style="cursor:pointer;z-index: 100000" onclick="window.location.href = '<?php echo url_for('archivo/detalle') . '?id=' . $archivo->getId() ?>'">
            <i class="fa fa-file"></i> <?php echo $archivo->getDescripcion(); ?>
            <i>Creado por <?php echo $archivo->getUsuario(); ?> a las <?php echo $archivo->getCreatedAt("d/m/Y H:i:s"); ?>
            </i>
        </li>
    <?php endforeach;?>
<?php endif;?>
<?php if (sizeof($usuarios) > 0): ?>
    <li class="list-group-item"><b>Usuarios</b></li>
    <?php foreach ($usuarios as $usuario): ?>
        <li class="list-group-item list-group-item-info"  style="cursor:pointer;z-index: 100000" onclick="window.location.href = '<?php echo url_for('usuario/visualizar') . '?id=' . $usuario->getId() ?>'">
            <?php if ($usuario->getImagen()): ?>
                <img alt="" class="img-circle" src="<?php echo $usuario->getImagen() ?>" style="width:13%"/>
            <?php else: ?>
                <img alt="" class="img-circle" src="/assets/admin/layout/img/avatar.png"/>
            <?php endif;?>
            <?php echo $usuario->getUsuario(); ?></i>
        </li>
    <?php endforeach;?>
<?php endif;?>
<li class="list-group-item list-group-item-warning"  style="cursor:pointer;z-index: 100000" onclick="window.location.href = '<?php echo url_for('soporte/busqueda') ?>'">
    <i class="fa fa-search"></i>
    Busqueda Avanzada
</li>