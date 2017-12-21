<?php foreach ($archivos as $archivo): ?>
    <li class="list-unstyled list-separated" style="cursor:pointer" onclick="window.location.href = '<?php echo url_for('archivo/detalle') . '?id=' . $archivo->getId() ?>'">
        <?php if ($archivo->getUsuario()->getImagen()): ?>
            <img alt="" style="width:30px"  class="img-circle" src="<?php echo$archivo->getUsuario()->getImagen() ?>"/>
        <?php else: ?>
            <img alt="" style="width:30px"  class="img-circle" src="/assets/admin/layout/img/avatar.png"/>
        <?php endif; ?>
        <font style="font-size: x-small">
        <?php echo $archivo->getUsuario() ? $archivo->getUsuario()->getUsuario() : '[SIN USUARIO]' ?> subio
        <b><?php echo $archivo->getNombreArchivoOriginal() ?></b>
        </font>
        <hr/>
    </li>
<?php endforeach; ?>
