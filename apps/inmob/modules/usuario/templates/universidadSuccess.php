<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-blue">
                    <i class="fa fa-university"></i> Estudios
                </div>
                <div class="actions">
                    <a class="btn btn-xs btn-warning btn-circle" href="<?php echo url_for('usuario/visualizar') . "?id=" . sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad') ?>">
                        <i class="fa fa-hand-o-left"></i> Atras
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <form class="form" method="POST" action="<?php echo url_for('usuario/universidad') ?>">
                    <div class="row">
                        <div class="col-md-2">
                            <font style="float:right;">
                            Universidad
                            </font>
                        </div>
                        <div class="col-md-9">
                            <?php echo $form['Universidad'] ?>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-2">
                            <font style="float:right;">
                            Carrera
                            </font>
                        </div>
                        <div class="col-md-9">
                            <?php echo $form['Carrera'] ?>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-2">
                            <font style="float:right;">
                            Materias
                            </font>
                        </div>
                        <div class="col-md-9">
                            <?php echo $form['Materia'] ?>
                        </div>
                    </div>
                    <?php echo $form->renderHiddenFields() ?>
                    <div class="form-actions">
                        <button class="btn btn-success btn-circle" type="submit">
                            <i class="fa fa-save"></i>
                            Guardar Datos
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>