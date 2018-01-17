<?php foreach ($formulario->getGlobalErrors() as $name => $error) : ?>
    <div class="alert media fade in alert-danger">
        <p><strong><?php echo ucfirst(str_replace("_", " ", $name)) ?></strong>  <?php echo $error ?></p>
    </div>
<?php endforeach ?>
<?php $errors = $formulario->getErrorSchema()->getErrors() ?>
<?php if (count($errors) > 0) : ?>
    <?php foreach ($errors as $name => $error) : ?>
        <div class="alert media fade in alert-danger">
            <p><strong><?php echo ucfirst(str_replace("_", " ", $name)) ?></strong>  <?php echo $error ?></p>
        </div>
    <?php endforeach ?>
<?php endif ?>
<div class="panel">
    <div class="panel-header bg-primary">
        <h3>Editar Requerimiento
            <a class="btn btn-xs btn-warning" style="float:right;margin-top: -6px;" href="<?php echo url_for("inicio/index") ?>">
                <i class="fa fa-hand-o-left"></i>
                Atras
            </a>
        </h3>

    </div>
    <div class="panel-content">
        <?php echo $formulario->renderFormTag(url_for("requerimiento/editar") . "?id=" . $id); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-content">
                        <h4><b>Operación y Inmueble</b></h4>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Tipo de Operacion</h5>
                                <?php echo $formulario["tipo_operacion"]; ?>
                            </div>
                            <div class="col-md-6">
                                <h5>Tipo de Inmueble</h5>
                                <?php echo $formulario["tipo_inmueble"]; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-content">
                        <h4><b>Caracteristicas de Inmueble</b></h4>
                        <div class="row">
                            <div class="col-md-2">
                                <h3 style="text-align: center;">Habitaciones<br/><br/><img width="25%" src="/assets/img/caracteristicas/Habitaciones-01.png"/></h3>
                                <?php echo $formulario["habitacion"] ?>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;">Baño<br/><br/><img width="25%" src="/assets/img/caracteristicas/Baños-01.png"/></h3>
                                <?php echo $formulario["banio"] ?>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;">Parqueo<br/><br/><img width="25%" src="/assets/img/caracteristicas/Parqueos-01.png"/></h3>
                                <?php echo $formulario["parqueo"] ?>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;">Niveles<br/><br/><img width="25%" src="/assets/img/caracteristicas/Niveles-01.png"/></h3>
                                <?php echo $formulario["niveles"] ?>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;">Área<br/><br/><img width="25%" src="/assets/img/caracteristicas/Area-01.png"/></h3>
                                <?php echo $formulario["area"] ?>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;">Dimensiones<br/><br/><img width="25%" src="/assets/img/caracteristicas/Dimensiones-01.png"/></h3>
                                <table>
                                    <tr>
                                        <td><?php echo $formulario["area_x"] ?></td>
                                        <td>x</td>
                                        <td><?php echo $formulario["area_y"] ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h3 style="text-align: center;">Agua<br/><br/><img width="25%" src="/assets/img/caracteristicas/Agua-01.png"/></h3>
                                <div style="text-align: center">
                                    <?php echo $formulario["tiene_agua"] ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;">Energia Electrica<br/><br/><img width="25%" src="/assets/img/caracteristicas/Energia electrica-01.png"/></h3>
                                <div style="text-align: center">
                                    <?php echo $formulario["tiene_luz"] ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;">Comedor<br/><br/><img width="25%" src="/assets/img/caracteristicas/Comedor.png"/></h3>
                                <?php echo $formulario["comedor"] ?>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;">Salas<br/><br/><img width="25%" src="/assets/img/caracteristicas/Sala.png"/></h3>
                                <?php echo $formulario["sala"] ?>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;">Cocina<br/><br/><img width="25%" src="/assets/img/caracteristicas/Cocina.png"/></h3>
                                <?php echo $formulario["cocina"] ?>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;">Dormitorio de Servicio<br/><br/><img width="25%" src="/assets/img/caracteristicas/Dormitorio de servicio.png"/></h3>
                                <div style="text-align: center">
                                    <?php echo $formulario["dormitorio_servicio"] ?>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col-md-2">
                                <h3 style="text-align: center;">Estudio<br/><br/><img width="25%" src="/assets/img/caracteristicas/Estudio.png"/></h3>
                                <div style="text-align: center">
                                    <?php echo $formulario["estudio"] ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;">Cisterna<br/><br/><img width="25%" src="/assets/img/caracteristicas/Cisterna-01.png"/></h3>
                                <div style="text-align: center">
                                    <?php echo $formulario["cisterna"] ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;">Jardin<br/><br/><img width="25%" src="/assets/img/caracteristicas/Jardin.png"/></h3>
                                <?php echo $formulario["jardin"] ?>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;">Patio<br/><br/><img width="25%" src="/assets/img/caracteristicas/Patio.png"/></h3>
                                <?php echo $formulario["patio"] ?>
                            </div>
                            <div class="col-md-2">
                                <h3 style="text-align: center;">Lavanderia<br/><br/><img width="25%" src="/assets/img/caracteristicas/Lavanderia.png"/></h3>
                                <div style="text-align: center">
                                    <?php echo $formulario["lavanderia"] ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Estado del inmueble</h3>
                                <?php echo $formulario["estado"]; ?>
                            </div>
                            <div class="col-md-6">
                                <h3>Amenidades / Extras</h3>
                                <?php echo $formulario["amenidades"]; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-content">
                        <h4><b>Información Financiera</b></h4>
                        <div class="row">
                            <div class="col-md-3">
                                Forma de Pago
                                <div style="text-align: center">
                                    <?php echo $formulario["forma_pago"]; ?>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="col-md-3">
                                    Precio
                                    <?php echo $formulario["moneda"] ?>
                                </div>
                                <div class="col-md-3">
                                    Minino
                                    <?php echo $formulario["presupuesto_min"] ?>
                                </div>
                                <div class="col-md-3">
                                    Maximo
                                    <?php echo $formulario["presupuesto_max"] ?>
                                </div>
                                <div class="col-md-3" id="precalificacion" style="text-align: center;">
                                    Precalificacion<br/>
                                    <?php echo $formulario["precalificacion"] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" id="modulo_precalificacion">
                <div class="panel">
                    <div class="panel-content">
                        <h4><b>Precalificacion</b></h4>
                        <div class="row">
                            <div class="col-md-2">
                                Nucleo Familiar
                                <?php echo $formulario["nucleo_familiar"]; ?>
                            </div>
                            <div class="col-md-3">
                                Ingresos
                                <?php echo $formulario["ingresos"]; ?>
                            </div>
                            <div class="col-md-3">
                                Egresos
                                <?php echo $formulario["egresos"]; ?>
                            </div>
                            <div class="col-md-2">
                                Tasa de Interes Anual
                                <?php echo $formulario["tasa_interes_anual"]; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                Enganche
                                <?php echo $formulario["enganche"]; ?>
                            </div>
                            <div class="col-md-2">
                                Plazo en Años
                                <?php echo $formulario["plazo_en_anios"]; ?>
                            </div>
                            <div class="col-md-2">
                                Plazo en Meses
                                <?php echo $formulario["plazo_en_meses"]; ?>
                            </div>
                            <div class="col-md-3">
                                Monto a Financiar Maximo
                                <?php echo $formulario["monto_financiar_maximo"]; ?>
                            </div>
                            <div class="col-md-3">
                                Cuota Total Maxima Mensual
                                <?php echo $formulario["cuota_total_mensual_maxima"]; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-content">
                        <h4><b>Información de Contacto</b></h4>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Nombre del Cliente</h5>
                                <div style="text-align: center">
                                    <?php echo $formulario["nombre_cliente"] ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5>Correo del Cliente</h5>
                                <div style="text-align: center">
                                    <?php echo $formulario["correo_cliente"] ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5>Telefono del Cliente</h5>
                                <div style="text-align: center">
                                    <?php echo $formulario["telefono_cliente"] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" id="direccion">
                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <div style="float:left;">
                                <h4><b>Ubicación</b></h4>
                            </div>
                            <div style="float:right;">
                                <a class="btn btn-default btn-rounded" href="#/" onclick="mas_direccion();">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h5>Departamento</h5>
                                <div style="text-align: center">
                                    <?php echo $formulario["departamento"] ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <h5>Municipio</h5>
                                <div style="text-align: center">
                                    <?php echo $formulario["municipio"] ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <h5>Zona</h5>
                                <div style="text-align: center">
                                    <?php echo $formulario["zona"] ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <h5>KM</h5>
                                <div style="text-align: center">
                                    <?php echo $formulario["km"] ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5>Carretera</h5>
                                <div style="text-align: center">
                                    <?php echo $formulario["carretera"] ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Dirección</h5>
                                <div style="text-align: center">
                                    <?php echo $formulario["direccion"] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i>
            Guardar
        </button>
        <?php echo $formulario->renderHiddenFields() ?>
        <?php echo "</form>"; ?>
    </div>
</div>
<script src="/assets/global/plugins/jquery/jquery-3.1.0.min.js"></script>
<script type="text/javascript">
                                    $(document).ready(function () {
                                        cambio_forma_pago();
                                        cambio_financiado();
                                        calculo();
                                        $("#nuevo_requerimiento_forma_pago").on("change", function () {
                                            cambio_forma_pago();
                                            cambio_financiado();
                                        });
                                        $("#nuevo_requerimiento_precalificacion").on("change", function () {
                                            cambio_financiado();
                                        });
                                        $(".calculo").on("input", function () {
                                            calculo();
                                        });
                                    });
                                    function cambio_forma_pago() {
                                        var valor = $("#nuevo_requerimiento_forma_pago").val();
                                        if (valor == "Financiado") {
                                            $("#precalificacion").show();
                                        } else {
                                            $("#precalificacion").hide();
                                        }
                                    }
                                    function cambio_financiado() {
                                        var precalificacion = $("#nuevo_requerimiento_precalificacion").val();
                                        var forma_pago = $("#nuevo_requerimiento_forma_pago").val();
                                        if (forma_pago == "Financiado" && precalificacion == "Si") {
                                            $("#modulo_precalificacion").show();
                                            $("#nuevo_requerimiento_presupuesto_max").attr("readonly", true);
                                        } else {
                                            $("#modulo_precalificacion").hide();
                                            $("#nuevo_requerimiento_presupuesto_max").removeAttr('readonly');
                                        }
                                    }
                                    function calculo() {
                                        plazo_en_meses();
                                        monto_financiar();
                                    }
                                    function plazo_en_meses() {
                                        var plazo_anios = parseFloat($("#nuevo_requerimiento_plazo_en_anios").val());
                                        $("#nuevo_requerimiento_plazo_en_meses").val(plazo_anios * 12);
                                    }
                                    function monto_financiar() {
                                        var X = parseFloat($("#nuevo_requerimiento_tasa_interes_anual").val());
                                        var Y = parseFloat($("#nuevo_requerimiento_plazo_en_anios").val());
                                        var ingreso_neto = parseFloat($("#nuevo_requerimiento_ingresos").val() - $("#nuevo_requerimiento_egresos").val());
                                        var cuota_mensual_maxima = parseFloat(ingreso_neto * 0.363636);
                                        var W = ingreso_neto;
                                        var Z = parseFloat($("#nuevo_requerimiento_enganche").val());

                                        var presupuesto_maximo = (-((X / 12) + 1) ^ (Y * 12)) * X * Z / 12;
                                        presupuesto_maximo = (presupuesto_maximo / ((((X / 12) + 1) ^ (Y * 12)) - 1));
                                        presupuesto_maximo = presupuesto_maximo + W * (-0.363636);
                                        presupuesto_maximo = presupuesto_maximo / ((((-X / 12) * (((X / 12) + 1) ^ (Y * 12))) / ((((X / 12) + 1) ^ (Y * 12)) - 1)) - (12029 / 11200000));
                                        var Iusi = 0.009 * (presupuesto_maximo) / (1.12 * 12);
                                        var Seguro = presupuesto_maximo / 1.12 * 0.04529;
                                        var C = parseFloat(cuota_mensual_maxima - Iusi - Seguro);
                                        var Monto_Financiar = (((X / 12) + 1) ^ (-(Y * 12))) * (((X / 12) + 1) ^ (Y * 12) - 1) * C / (X / 12);
                                        Monto_Financiar = parseFloat(Monto_Financiar);
                                        $("#nuevo_requerimiento_monto_financiar_maximo").val(Monto_Financiar.toFixed(2));
                                        $("#nuevo_requerimiento_cuota_total_mensual_maxima").val(cuota_mensual_maxima.toFixed(2));
                                        $("#nuevo_requerimiento_presupuesto_max").val(presupuesto_maximo.toFixed(2));

                                    }
                                    function mas_direccion() {
                                        var valor = parseInt($("#nuevo_requerimiento_cantidad").val());
                                        valor = valor + 1;
                                        $("#nuevo_requerimiento_cantidad").val(valor);
                                        $.get("<?php echo url_for("requerimiento/direccion") ?>", {"num": valor}, function (response) {
                                            $("#direccion").append(response);
                                            BusquedaLlenaSelect();
                                        }, "html");
                                    }
                                    function menos_direccion(id) {
                                        $("#direccion_" + id).remove();
                                        var valor = $("#nuevo_requerimiento_cantidad").val();
                                        valor = valor - 1;
                                        $("#nuevo_requerimiento_cantidad").val(valor);
                                    }
</script>
