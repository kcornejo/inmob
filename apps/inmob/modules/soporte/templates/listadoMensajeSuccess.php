<?php foreach ($negocio->getMensajeNegocios() as $msg): ?>
    <?php if ($usuario_id == $msg->getUsuarioId()): ?>
        <div class="form-group pull-right pb-chat-labels-right">
            <span style="font-size: 8pt;">
                <?php echo $msg->getUsuario()->getUsuario()?>&nbsp;<?php echo $msg->getFechaMsg()?>
                <br/>
            </span>
            <span style="background-color:#d8d9ff;color:black;" class="label pb-chat-labels pb-chat-labels-primary">
                <?php echo $msg->getMensaje() ?>
            </span>
        </div>
    <?php else: ?>
        <div class="form-group">
            <span style="font-size: 8pt;">
                <?php echo $msg->getUsuario()->getUsuario()?>&nbsp;<?php echo $msg->getFechaMsg()?>
                <br/>
            </span>
            <span style="background-color:#f5f5f5;color:black;" class="label pb-chat-labels pb-chat-labels-left">
                <?php echo $msg->getMensaje() ?>
            </span>
        </div>
    <?php endif; ?>
    <br/><br/>
<?php endforeach; ?>