<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-header" style="background-color:#305da8;color:white;font-size:14pt;">
                <h3 face="Helvetica">
                    <a href="<?php echo url_for("inicio/index") ?>" style="color:white;">
                        <i class="icon icons-arrows-03"></i>
                    </a>
                    <i class="fa fa-key"></i>
                    Cambio de Clave
                </h3>
            </div>
            <div class="panel-content">
                <form method="POST" action="<?php echo url_for('seguridad/cambioclave') ?>" class="form">
                    <div class="form-body">
                        <div class="form-group">
                            Clave:
                            <?php echo $form['clave'] ?>
                            <span class="error">
                                <?php echo $form['clave']->renderError() ?>
                            </span>
                        </div>
                        <div class="form-group">
                            Repetir la Clave
                            <?php echo $form['clave_2'] ?>
                            <span class="error">
                                <?php echo $form['clave_2']->renderError() ?>
                            </span>
                        </div>
                        <?php echo $form->renderHiddenFields() ?>
                    </div>
                    <button type="submit" class="btn col-md-1 col-xs-2 col-sm-2" style="position: fixed;bottom: 20px;right: 30px;z-index: 99;border: none;background-color:#305da8;color:white;">
                        <i class="fa fa-refresh"></i>
                        <span class="hidden-sm hidden-xs">
                            Cambiar
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>