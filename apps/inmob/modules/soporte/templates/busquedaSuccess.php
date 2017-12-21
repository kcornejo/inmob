<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-purple-sharp">
                    <i class="fa fa-search">
                    </i>
                    Busqueda Avanzada
                </div>
            </div>
            <div class="portlet-body">
                <form action="<?php echo url_for('soporte/busqueda')?>" class="form" method="POST">
                    <div class="form-body">
                        <div class="form-group">
                            Tipo:
                            <?php echo $form["Tipo"]?>
                        </div>
                        <div class="form-group">
                            Busqueda:
                            <?php echo $form["Valor"]?>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button class="btn btn-circle btn-success" type="submit">
                            <i class="fa fa-search">
                            </i>
                            Buscar
                        </button>
                    </div>
                    <?php echo $form->renderHiddenFields()?>
                </form>
            </div>
        </div>
        <?php if(sizeof($usuarios) >
        0):?>
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-purple-sharp">
                    <i class="fa fa-list">
                    </i>
                    Usuarios
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>
                                    Imagen
                                </th>
                                <th>
                                    Usuario
                                </th>
                                <th>
                                    Accion
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($usuarios as $usuario):?>
                            <tr>
                                <td>
                                    <?php if ($usuario->
                                    getImagen()): ?>
                                    <img alt="" class="img-circle" src="<?php echo $usuario->getImagen() ?>" style="width:30%"/>
                                    <?php else: ?>
                                    <img alt="" class="img-circle" src="/assets/admin/layout/img/avatar.png" style="width:30%"/>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo $usuario->
                                    getUsuario()?>
                                </td>
                                <td>
                                	<a class="btn btn-circle btn-info" href="<?php echo url_for('usuario/visualizar'). "?id=".$usuario->getId() ?>">
                                	<i class="fa fa-eye"></i>
                                		Visualizar
                                	</a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php endif;?>
        <?php if(sizeof($archivos) >
        0):?>
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-purple-sharp">
                    <i class="fa fa-list">
                    </i>
                    Usuarios
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>
                                    Descripcion
                                </th>
                                <th>
                                    Nombre
                                </th>
                                <th>
                                    Accion
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($archivos as $archivo):?>
                            <tr>
                                <td>
                                   <?php echo $archivo->getDescripcion()?>
                                </td>
                                <td>
                                    <?php echo $archivo->getNombreArchivoOriginal()?>
                                </td>
                                <td>
                                	<a class="btn btn-circle btn-info" href="<?php echo url_for('archivo/detalle'). "?id=".$archivo->getId() ?>">
                                	<i class="fa fa-eye"></i>
                                		Visualizar
                                	</a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php endif;?>
    </div>
</div>
