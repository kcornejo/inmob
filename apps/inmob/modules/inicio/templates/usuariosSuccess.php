<?php foreach ($usuarios as $usuario): ?>
    <li class="list-unstyled list-separated"  style="cursor:pointer" onclick="window.location.href = '<?php echo url_for('usuario/visualizar') . '?id=' . $usuario->getId() ?>'">
        <?php if ($usuario->getImagen()): ?>
            <img alt="" style="width:30px" class="img-circle" src="<?php echo $usuario->getImagen() ?>"/>
        <?php else: ?>
            <img alt="" style="width:30px" class="img-circle" src="/assets/admin/layout/img/avatar.png"/>
        <?php endif; ?>
        <font style="font-size: x-small">
        <?php echo $usuario->getUsuario() ? $usuario->getUsuario() : '[SIN USUARIO]' ?>
        </font>
        <hr/>
    </li>
<?php endforeach; ?>
