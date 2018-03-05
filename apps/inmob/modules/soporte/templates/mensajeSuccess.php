<?php foreach ($negocio->getMensajeNegocios() as $msg): ?>
    <?php if ($usuario_id == $msg->getUsuarioId()): ?>
        <div class="form-group pull-right pb-chat-labels-right">
            <span style="background-color:#d8d9ff;" class="label pb-chat-labels pb-chat-labels-primary"><?php echo $msg->getMensaje() ?></span>
        </div>
        <br/>
        <hr>
    <?php else: ?>
        <div class="form-group">
            <span style="background-color:#f5f5f5;" class="label pb-chat-labels pb-chat-labels-left"><?php echo $msg->getMensaje() ?></span>
        </div>
        <hr>
    <?php endif; ?>
<?php endforeach; ?>