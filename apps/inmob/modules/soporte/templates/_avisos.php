<?php if ($sf_user->hasFlash("error")): ?>
    <div class="alert media fade in alert-danger">
        <p class="letra">
            <strong>Error!</strong>&nbsp;<?php echo $sf_user->getFlash("error"); ?>
        </p>
    </div>
<?php endif; ?>

<?php if ($sf_user->hasFlash("exito")): ?>
    <div class="alert media fade in alert-success">
        <p class="letra">
            <strong>Exito!</strong>&nbsp;<?php echo $sf_user->getFlash("exito"); ?>
        </p>
    </div>
<?php endif; ?>
<?php $usuario = sfContext::getInstance()->getUser(); ?>
<?php if ($usuario->getAttribute('mensaje', null, 'error')): ?>
    <div class="alert media fade in alert-error">
        <p class="letra">
            <strong>Error!</strong>&nbsp;<?php $usuario->setAttribute('mensaje', null, 'error') ?>
        </p>
    </div>
<?php endif; ?>
<?php if ($usuario->getAttribute('mensaje', null, 'exito')): ?>
    <div class="alert media fade in alert-success">
        <p class="letra">
            <strong>Exito!</strong>&nbsp;<?php $usuario->setAttribute('mensaje', null, 'exito') ?>
        </p>
    </div>
<?php endif; ?>

<?php if ($sf_user->hasFlash("aviso")): ?>
    <div class="alert media fade in alert-info">
        <p class="letra">
            <strong>Aviso!</strong>&nbsp;<?php echo $sf_user->getFlash("aviso"); ?>
        </p>
    </div>
<?php endif; ?>

<?php if ($sf_user->hasFlash("info")): ?>
    <div class="alert media fade in alert-info">
        <p class="letra">
            <strong>Información!</strong>&nbsp;<?php echo $sf_user->getFlash("error"); ?>
        </p>
    </div>
<?php endif; ?>
 