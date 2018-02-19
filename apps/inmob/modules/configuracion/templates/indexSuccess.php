<div class="row">
    <div class="panel">
        <div class="panel-header" style="background-color:#305da8;color:white;font-size:14pt;">
            <h3 face="Helvetica">
                Configuracion
            </h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Tipo de Formato</th>
                        <th>
                            Detalle
                        </th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Registro de Usuario</td>
                        <td>
                            Este formato es para el correo que se envia cuando se registra el usuario para verificar su token.
                        </td>
                        <td>
                            <a class="btn btn-success" href="<?php echo url_for("configuracion/editar") . "?tipo=Registro" ?>">
                                Editar
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Clave Olvidada</td>
                        <td>
                            Este formato es para el correo que se envia cuando el usuario olvida su clave.
                        </td>
                        <td>
                            <a class="btn btn-success" href="<?php echo url_for("configuracion/editar") . "?tipo=Clave" ?>">
                                Editar
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Negocio</td>
                        <td>
                            Este formato es para el correo que se envia cuando se encuentra un negocio.
                        </td>
                        <td>
                            <a class="btn btn-success" href="<?php echo url_for("configuracion/editar") . "?tipo=Negocio" ?>">
                                Editar
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Principal</td>
                        <td>
                            Este formato es para la pantalla principal.
                        </td>
                        <td>
                            <a class="btn btn-success" href="<?php echo url_for("configuracion/editar") . "?tipo=Principal" ?>">
                                Editar
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>