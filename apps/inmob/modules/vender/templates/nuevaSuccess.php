<?php foreach ($formulario_vender->getGlobalErrors() as $name => $error) : ?>
    <div class="alert media fade in alert-danger">
        <p><strong><?php echo ucfirst(str_replace("_", " ", $name)) ?></strong>  <?php echo $error ?></p>
    </div>
<?php endforeach ?>
<?php $errors = $formulario_vender->getErrorSchema()->getErrors() ?>
<?php if (count($errors) > 0) : ?>
    <?php foreach ($errors as $name => $error) : ?>
        <div class="alert media fade in alert-danger">
            <p><strong><?php echo ucfirst(str_replace("_", " ", $name)) ?></strong>  <?php echo $error ?></p>
        </div>
    <?php endforeach ?>
<?php endif ?>
<div class="panel">
    <div class="panel-header" style="background-color:#305da8;color:white;font-size:14pt;">
        <h3 face="Helvetica">
            <a href="#" data-toggle="modal" data-target="#modal-basic" style="color:white;">
                <i class="icon icons-arrows-03"></i>
            </a>
            Nueva Propiedad
        </h3>
    </div>
    <div class="panel-content">
        <?php echo $formulario_vender->renderFormTag(url_for("vender/nueva")); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-content">
                        <h4 class="titulo_kc">
                            OPERACIÓN E INMUEBLE
                        </h4>
                        <div class="row">
                            <div class="col-md-6">
                                <span class="subtitulo_kc">Tipo de Operacion</span>&nbsp;<span style="color:red;">*</span>
                                <?php echo $formulario_vender["tipo_operacion"]; ?>
                            </div>
                            <div class="col-md-6">
                                <span class="subtitulo_kc">Tipo de Inmueble</span>&nbsp;<span style="color:red;">*</span>
                                <?php echo $formulario_vender["tipo_inmueble"]; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-content">
                        <h4 class="titulo_kc">
                            CARACTERÍSTICAS DEL INMUEBLE
                        </h4>
                        <div class="row">
                            <div class="col-md-2">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Habitaciones&nbsp;<span style="color:red;">*</span></span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Habitaciones-01.png"/></h3>
                                <?php echo $formulario_vender["habitacion"] ?>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Baño</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Baños-01.png"/></h3>
                                <?php echo $formulario_vender["banio"] ?>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Parqueo&nbsp;<span style="color:red;">*</span></span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Parqueos-01.png"/></h3>
                                <?php echo $formulario_vender["parqueo"] ?>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Niveles</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Niveles-01.png"/></h3>
                                <?php echo $formulario_vender["niveles"] ?>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Área</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Area-01.png"/></h3>
                                <?php echo $formulario_vender["area"] ?>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Dimensiones</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Dimensiones-01.png"/></h3>
                                <table>
                                    <tr>
                                        <td><?php echo $formulario_vender["area_x"] ?></td>
                                        <td>x</td>
                                        <td><?php echo $formulario_vender["area_y"] ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Agua</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Agua-01.png"/></h3>
                                <div style="text-align: center">
                                    <?php echo $formulario_vender["tiene_agua"] ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Energia Electrica</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Energia electrica-01.png"/></h3>
                                <div style="text-align: center">
                                    <?php echo $formulario_vender["tiene_luz"] ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Comedor</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Comedor.png"/></h3>
                                <?php echo $formulario_vender["comedor"] ?>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Salas</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Sala.png"/></h3>
                                <?php echo $formulario_vender["sala"] ?>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Cocina</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Cocina.png"/></h3>
                                <?php echo $formulario_vender["cocina"] ?>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Dormitorio de Servicio</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Dormitorio de servicio.png"/></h3>
                                <div style="text-align: center">
                                    <?php echo $formulario_vender["dormitorio_servicio"] ?>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col-md-2">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Estudio</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Estudio.png"/></h3>
                                <div style="text-align: center">
                                    <?php echo $formulario_vender["estudio"] ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Cisterna</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Cisterna-01.png"/></h3>
                                <div style="text-align: center">
                                    <?php echo $formulario_vender["cisterna"] ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Jardin</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Jardin.png"/></h3>
                                <?php echo $formulario_vender["jardin"] ?>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Patio</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Patio.png"/></h3>
                                <?php echo $formulario_vender["patio"] ?>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Lavanderia</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Lavanderia.png"/></h3>
                                <div style="text-align: center">
                                    <?php echo $formulario_vender["lavanderia"] ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <span class="subtitulo_kc">Estado del inmueble&nbsp;<span style="color:red;">*</span></span>
                                <?php echo $formulario_vender["estado"]; ?>
                            </div>
                            <div class="col-md-6">
                                <span class="subtitulo_kc">Amenidades / Extras</span>
                                <?php echo $formulario_vender["amenidades"]; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-content">
                        <h4 class="titulo_kc">
                            INFORMACIÓN FINANCIERA
                        </h4>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="col-md-4">
                                    <span class="subtitulo_kc">Precio&nbsp;<span style="color:red;">*</span></span>
                                    <?php echo $formulario_vender["moneda"] ?>
                                </div>
                                <div class="col-md-6">
                                    &nbsp;
                                    <?php echo $formulario_vender["precio"] ?>
                                </div>
                                <div class="col-md-2">
                                    <span class="subtitulo_kc">Negociable</span>
                                    <?php echo $formulario_vender["precio_negociable"] ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <span class="subtitulo_kc">Forma de Pago</span>
                                <div style="text-align: center">
                                    <?php echo $formulario_vender["forma_pago"]; ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <span class="subtitulo_kc">Gastos Escritura</span>
                                <div style="text-align: center">
                                    <?php echo $formulario_vender["gastos_escritura"]; ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <span class="subtitulo_kc">Años de Construcción</span>
                                <div style="text-align: center">
                                    <?php echo $formulario_vender["anios_construccion"] ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <span class="subtitulo_kc">Mantenimiento Mensual</span>
                                <div style="text-align: center">
                                    <?php echo $formulario_vender["mantenimiento_mensual"] ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <span class="subtitulo_kc">Iusi Trimestral</span>
                                <div style="text-align: center">
                                    <?php echo $formulario_vender["iusi_trimestral"] ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <span class="subtitulo_kc">Valor Avaluo</span>
                                <div style="text-align: center">
                                    <?php echo $formulario_vender["valor_avaluo"] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-content">
                        <h4 class="titulo_kc">
                            TÉRMINOS DE NEGOCIACIÓN
                        </h4>
                        <div class="row">
                            <div class="col-md-3">
                                <span class="subtitulo_kc">Mi Comisión (%)</span>
                                <div style="text-align: center">
                                    <?php echo $formulario_vender["mi_comision"] ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <span class="subtitulo_kc">Comisión Compartida (%)</span>
                                <div style="text-align: center">
                                    <?php echo $formulario_vender["comision_compartida"] ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <span class="subtitulo_kc">Mi Comisión</span>
                                <div style="text-align: center">
                                    <input type="text" class="form-control" readonly="true" id="valor_mi_comision"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <span class="subtitulo_kc">Comisión Compartida</span>
                                <div style="text-align: center">
                                    <input type="text" class="form-control" readonly="true" id="valor_comision_compartida"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-content">
                        <h4 class="titulo_kc">
                            INFORMACIÓN DE CONTACTO
                        </h4>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="subtitulo_kc">Nombre del Cliente</span>
                                <div style="text-align: center">
                                    <?php echo $formulario_vender["nombre_cliente"] ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span class="subtitulo_kc">Correo del Cliente</span>
                                <div style="text-align: center">
                                    <?php echo $formulario_vender["correo_cliente"] ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span class="subtitulo_kc">Telefono del Cliente</span>
                                <div style="text-align: center">
                                    <?php echo $formulario_vender["telefono_cliente"] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-content">
                        <h4 class="titulo_kc">
                            UBICACIÓN
                        </h4>
                        <div class="row">
                            <div class="col-md-2">
                                <span class="subtitulo_kc">Departamento&nbsp;<span style="color:red;">*</span></span>
                                <div style="text-align: center">
                                    <?php echo $formulario_vender["departamento"] ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <span class="subtitulo_kc">Municipio&nbsp;<span style="color:red;">*</span></span>
                                <div style="text-align: center">
                                    <?php echo $formulario_vender["municipio"] ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <span class="subtitulo_kc">Zona&nbsp;<span style="color:red;">*</span></span>
                                <div style="text-align: center">
                                    <?php echo $formulario_vender["zona"] ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <span class="subtitulo_kc">KM.</span>
                                <div style="text-align: center">
                                    <?php echo $formulario_vender["km"] ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span class="subtitulo_kc">Carretera</span>
                                <div style="text-align: center">
                                    <?php echo $formulario_vender["carretera"] ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="subtitulo_kc">Dirección</span>
                                <div style="text-align: center">
                                    <?php echo $formulario_vender["direccion"] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-content">
                        <h4 class="titulo_kc">
                            COMUNIDAD
                        </h4>
                        <div class="row">
                            <div class="col-md-2">
                                <span class="subtitulo_kc">Seguridad</span>
                                <div style="text-align: center;color:#4a89dc;">
                                    <?php echo $formulario_vender["seguridad"] ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <span class="subtitulo_kc">Accesos</span>
                                <div style="text-align: center;color:#4a89dc;">
                                    <?php echo $formulario_vender["accesos"] ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <span class="subtitulo_kc">Agua</span>
                                <div style="text-align: center;color:#4a89dc;">
                                    <?php echo $formulario_vender["agua"] ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <span class="subtitulo_kc">Transporte Publico</span>
                                <div style="text-align: center;color:#4a89dc;">
                                    <?php echo $formulario_vender["transporte_publico"] ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <span class="subtitulo_kc">Transito Vehicular</span>
                                <div style="text-align: center;color:#4a89dc;">
                                    <?php echo $formulario_vender["transito_vehicular"] ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <span class="subtitulo_kc">Comunidades Colidantes</span>
                                <div style="text-align: center;color:#4a89dc;">
                                    <?php echo $formulario_vender["comunidades_colidantes"] ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <span class="subtitulo_kc">Areas de Recreación</span>
                                <div style="text-align: center;color:#4a89dc;">
                                    <?php echo $formulario_vender["areas_recreacion"] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-content">
                        <h4 class="titulo_kc">
                            IMÁGENES
                        </h4>
                        <div class="row">
                            <div class="col-md-2">
                                <div style="text-align: center;color:#4a89dc;">
                                    <?php echo $formulario_vender["archivo"] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn col-md-1 col-xs-2 col-sm-2" style="position: fixed;bottom: 20px;right: 30px;z-index: 99;border: none;background-color:#305da8;color:white;">
            <i class="fa fa-save"></i>
            <span class="hidden-sm hidden-xs">
                Guardar
            </span>
        </button>
        <!--<a class="col-md-1 col-xs-3 col-sm-1" style="position: fixed;bottom: 20px;right: 30px;z-index: 99;border: none;border-radius: 10px" href="<?php echo url_for('vender/nueva') ?>">-->
            <!--<img style="width:100%" src="/assets/img/caracteristicas/Agregar propiedad.png"/>-->
        <!--</a>-->
        <?php echo $formulario_vender->renderHiddenFields() ?>
        <?php echo "</form>"; ?>
    </div>
</div>
<div class="modal fade" id="modal-basic" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
                <h4 class="modal-title"><strong>Aviso!</strong></h4>
            </div>
            <div class="modal-body">
                Desea guardar antes de Salir?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-embossed" data-dismiss="modal" onclick="$('form').submit();">Guardar</button>
                <button type="button" class="btn btn-danger btn-embossed" data-dismiss="modal" onclick="location.href = '<?php echo url_for("vender/index") ?>'">Salir</button>
                <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<script src="/assets/global/plugins/jquery/jquery-3.1.0.min.js"></script>
<script type="text/javascript">
                    $(document).ready(function () {
                        calculo();
                        $(".calculo").on("input", function () {
                            calculo();
                        });
                    });
                    function calculo() {
                        //valor_comision_compartida
                        //valor_mi_comision
                        var mi_comision = $("#vender_form_mi_comision").val();
                        var comision_compartida = $("#vender_form_comision_compartida").val();
                        var precio = $("#vender_form_precio").val();
                        $("#valor_mi_comision").val(parseFloat(precio * mi_comision / 100).toFixed(2));
                        $("#valor_comision_compartida").val(parseFloat($("#valor_mi_comision").val() * comision_compartida / 100).toFixed(2));
                    }

</script>
