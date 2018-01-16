<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-sharp">
                    <i class="fa fa-key"></i>
                    Cambio de Clave
                </div>
            </div>
            <div class="portlet-body">
                <form method="POST" action="<?php echo url_for('seguridad/cambioclave') ?>" class="form">
                    <div class="form-body">
                        <div class="form-group">
                            Clave:
                            <?php echo $form['Clave'] ?>
                            <span class="error">
                                <?php echo $form['Clave']->renderError() ?>
                            </span>
                        </div>
                        <div class="form-group">
                            Repetir la Clave
                            <?php echo $form['Repetir'] ?>
                            <span class="error">
                                <?php echo $form['Repetir']->renderError() ?>
                            </span>
                        </div>
                        <?php echo $form->renderHiddenFields() ?>
                    </div>
                    <div class="form-actions">
                        <button class="btn btn-info" type="submit">
                            <i class="fa fa-refresh"></i>
                            Cambiar Clave
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>