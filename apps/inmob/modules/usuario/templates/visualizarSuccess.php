<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-blue">
                    <i class="fa fa-user"></i> Perfil
                </div>
                <div class="actions">
                    <?php if ($usuario->getId() == sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad')): ?>
                        <a class="btn btn-circle btn-info" href="<?php echo url_for('usuario/perfil') ?>">
                            <i class="fa fa-cogs"></i> Configurar
                        </a>
                        <a class="btn btn-circle btn-success" href="<?php echo url_for('usuario/universidad') ?>">
                            <i class="fa fa-university"></i> Estudios
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-3">
                        <?php if ($usuario->getImagen()): ?>
                            <img style="width:100%" alt="" class="img-circle" src="<?php echo $usuario->getImagen() ?>"/>
                        <?php else: ?>
                            <img style="width:100%" alt="" class="img-circle" src="/assets/admin/layout/img/avatar.png"/>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <h3><?php echo $usuario->getUsuario() ?></h3>
                                <h4>Fecha de Nacimiento: <b><?php echo $usuario->getFechaNacimiento() ?></b></h4>
                                <h4>Genero: <b><?php echo $usuario->getGenero() ?></b></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-12">
                                <h3><br/></h3>
                                <h4>Universidad: <b><?php echo $usuario->getUniversidadId() ? $usuario->getUniversidad()->getDescripcion() : '[UNIVERSIDAD NO ASIGNADA]' ?></b></h4>
                                <h4>Carrera: <b><?php echo $usuario->getCarreraId() ? $usuario->getCarrera()->getDescripcion() : '[CARRERA NO ASIGNADA]' ?></b></h4>
                                <h4>
                                    Materias: 
                                    <b>
                                        <?php foreach ($usuario->getUsuarioMaterias() as $materia): ?>
                                            <?php if ($materia->getMateriaId()): ?>
                                                <?php echo $materia->getMateria()->getDescripcion() ?>,
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </b>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9"><h4><i>"<?php echo $usuario->getFrase() ?>"</i></h4></div>
                </div>
            </div>
        </div>
    </div>
</div>