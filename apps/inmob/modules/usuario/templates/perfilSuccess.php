<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-purple-sharp">
                    <i class="fa fa-user"></i>
                    Perfil
                </div>
                <div class="actions">
                    <a class="btn btn-xs btn-warning btn-circle" href="<?php echo url_for('usuario/visualizar') . "?id=" . sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad') ?>">
                        <i class="fa fa-hand-o-left"></i> Atras
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <?php echo $form->renderFormTag(url_for('usuario/perfil')) ?>
                <table class="table">
                    <tbody>
                        <tr>
                            <td></td>
                            <td>
                                <?php if (sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'imagen')): ?>
                                    <img alt="" style="width:25%" class="img-circle" src="<?php echo sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'imagen') ?>"/>
                                <?php else: ?>
                                    <img alt="" style="width:25%" class="img-circle" src="/assets/admin/layout/img/avatar.png"/>
                                <?php endif; ?>
                            </td>
                            <td>
                            </td>
                        </tr>

                        <tr>
                            <td>Imagen</td>
                            <td><?php echo $form['Archivo'] ?></td>
                            <td>
                                <span class="error">
                                    <?php echo $form['Archivo']->renderError() ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Nombre de Perfil</td>
                            <td><?php echo $form['Nombre'] ?></td>
                            <td>
                                <span class="error">
                                    <?php echo $form['Nombre']->renderError() ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Genero</td>
                            <td><?php echo $form['Genero'] ?></td>
                            <td>
                                <span class="error">
                                    <?php echo $form['Genero']->renderError() ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Pais</td>
                            <td>
                                <?php echo $form['Pais'] ?>
                            </td>
                            <td>
                                <span class="error">
                                    <?php echo $form['Pais']->renderError() ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Fecha de Nacimiento</td>
                            <td><?php echo $form['Fecha_Nacimiento'] ?></td>
                            <td>
                                <span class="error">
                                    <?php echo $form['Fecha_Nacimiento']->renderError() ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Sobre mi</td>
                            <td><?php echo $form['Frase'] ?></td>
                            <td>
                                <span class="error">
                                    <?php echo $form['Frase']->renderError() ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Tema</td>
                            <td><?php echo $form['Tema'] ?></td>
                            <td>
                                <span class="error">
                                    <?php echo $form['Tema']->renderError() ?>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php echo $form->renderHiddenFields() ?>
                <div class="form-actions">
                    <button class="btn btn-info btn-circle" type="submit">
                        <i class="fa fa-cogs"></i>
                        Actualizar
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>