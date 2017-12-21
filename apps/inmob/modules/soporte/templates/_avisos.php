<?php if ($sf_user->hasFlash("error")): ?>
    <div class="app-alerts alert alert-danger fade in">
        <button data-dismiss="alert" class="close"></button>
        <strong>Error!</strong>&nbsp;<?php echo $sf_user->getFlash("error"); ?>
    </div>
<?php endif; ?>

<?php if ($sf_user->hasFlash("exito")): ?>
    <div class="alert alert-success">
        <button data-dismiss="alert" class="close"></button>
        <strong>Exito!</strong>&nbsp;<?php echo $sf_user->getFlash("exito"); ?>
    </div>
<?php endif; ?>
<?php $usuario = sfContext::getInstance()->getUser(); ?>
<?php if ($usuario->getAttribute('mensaje', null, 'error')): ?>
    <div class="app-alerts alert alert-danger fade in">
        <button data-dismiss="alert" class="close"></button>
        <strong>Error!</strong>&nbsp;<?php echo $usuario->getAttribute('mensaje', null, 'error'); ?>
        <?php $usuario->setAttribute('mensaje', null, 'error') ?>
    </div>
<?php endif; ?>
<?php if ($usuario->getAttribute('mensaje', null, 'exito')): ?>
    <div class="alert alert-success">
        <button data-dismiss="alert" class="close"></button>
        <strong>Exito!</strong>&nbsp;<?php echo $usuario->getAttribute('mensaje', null, 'exito'); ?>
        <?php $usuario->setAttribute('mensaje', null, 'exito') ?>
    </div>
<?php endif; ?>

<?php if ($sf_user->hasFlash("aviso")): ?>
    <div class="alert">
        <button data-dismiss="alert" class="close"></button>
        <strong>aviso!</strong>&nbsp;<?php echo $sf_user->getFlash("aviso"); ?>
    </div>
<?php endif; ?>

<?php if ($sf_user->hasFlash("info")): ?>
    <div class="alert alert-info">
        <button data-dismiss="alert" class="close"></button>
        <strong>Error!</strong>&nbsp;<?php echo $sf_user->getFlash("error"); ?>
    </div>
<?php endif; ?>
 