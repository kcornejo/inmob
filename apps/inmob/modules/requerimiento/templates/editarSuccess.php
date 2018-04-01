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
    <div class="panel-header"  style="background-color:#305da8;color:white;font-size:14pt;">
        <h3 face="Helvetica">
            <a href="#" data-toggle="modal" data-target="#modal-basic" style="color:white;"><i class="icon icons-arrows-03"></i></a>
            Editar Requerimiento
        </h3>
    </div>
    <div class="panel-content">
        <?php echo $formulario->renderFormTag(url_for("requerimiento/editar") . "?id=" . $id); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="panel-content">
                        <h4 class="titulo_kc">
                            OPERACIÓN E INMUEBLE
                            <hr/>
                        </h4>
                        <div class="row">
                            <div class="col-md-6">
                                <span class="subtitulo_kc">Tipo de operacion</span>&nbsp;<span style="color:red;">*</span>
                                <?php echo $formulario["tipo_operacion"]; ?>
                            </div>
                            <div class="col-md-6">
                                <span class="subtitulo_kc">Tipo de inmueble</span>&nbsp;<span style="color:red;">*</span>
                                <?php echo $formulario["tipo_inmueble"]; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="">
                    <div class="panel-content">
                        <h4 class="titulo_kc">
                            CARACTERÍSTICAS DEL INMUEBLE
                            <hr/>
                        </h4>
                        <div class="row">
                            <div class="col-md-2 ocultar oficina">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Cubículos</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Estudio.png"/></h3>
                                <?php echo $formulario_vender["cubiculo"] ?>
                            </div>
                            <div class="col-md-2 ocultar casa">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Habitaciones&nbsp;<span style="color:red;">*</span></span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Habitaciones-01.png"/></h3>
                                <?php echo $formulario["habitacion"] ?>
                            </div>
                            <div class="col-md-2 ocultar edificio">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Oficinas&nbsp;<span style="color:red;">*</span></span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Estudio.png"/></h3>
                                <?php echo $formulario["oficina"] ?>
                            </div>
                            <div class="col-md-2 ocultar casa oficina edificio">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Baño</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Baños-01.png"/></h3>
                                <?php echo $formulario["banio"] ?>
                            </div>
                            <div class="col-md-2 ocultar casa oficina edificio">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Parqueo&nbsp;<span style="color:red;">*</span></span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Parqueos-01.png"/></h3>
                                <?php echo $formulario["parqueo"] ?>
                            </div>
                            <div class="col-md-2 ocultar casa edificio">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Niveles</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Niveles-01.png"/></h3>
                                <?php echo $formulario["niveles"] ?>
                            </div>
                            <div class="col-md-2 ocultar casa oficina terreno edificio bodega">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Área</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Area-01.png"/></h3>
                                <?php echo $formulario["area"] ?>
                            </div>
                            <div class="col-md-2 ocultar casa oficina terreno edificio bodega">
                                <h3 style="text-align: center;"><span class="subtitulo_kc">Dimensiones</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Dimensiones-01.png"/></h3>
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
                            <br/>
                            <div class="col-md-12">
                                <div class="panel-group panel-accordion" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4>
                                                <a class="collapsed titulo_kc" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="background-color:#ECEDEE">
                                                    Más características
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-2 ocultar casa terreno bodega">
                                                        <h3 style="text-align: center;"><span class="subtitulo_kc">Agua</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Agua-01.png"/></h3>
                                                        <div style="text-align: center">
                                                            <?php echo $formulario["tiene_agua"] ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 ocultar casa terreno bodega">
                                                        <h3 style="text-align: center;"><span class="subtitulo_kc">Energia electrica</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Energia electrica-01.png"/></h3>
                                                        <div style="text-align: center">
                                                            <?php echo $formulario["tiene_luz"] ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 ocultar casa">
                                                        <h3 style="text-align: center;"><span class="subtitulo_kc">Comedor</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Comedor.png"/></h3>
                                                        <?php echo $formulario["comedor"] ?>
                                                    </div>
                                                    <div class="col-md-2 ocultar casa">
                                                        <h3 style="text-align: center;"><span class="subtitulo_kc">Salas</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Sala.png"/></h3>
                                                        <?php echo $formulario["sala"] ?>
                                                    </div>
                                                    <div class="col-md-2 ocultar casa">
                                                        <h3 style="text-align: center;"><span class="subtitulo_kc">Cocina</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Cocina.png"/></h3>
                                                        <?php echo $formulario["cocina"] ?>
                                                    </div>
                                                    <div class="col-md-2 ocultar casa">
                                                        <h3 style="text-align: center;"><span class="subtitulo_kc">Dormitorio de servicio</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Dormitorio de servicio.png"/></h3>
                                                        <div style="text-align: center">
                                                            <?php echo $formulario["dormitorio_servicio"] ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class="col-md-2 ocultar casa">
                                                        <h3 style="text-align: center;"><span class="subtitulo_kc">Estudio</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Estudio.png"/></h3>
                                                        <div style="text-align: center">
                                                            <?php echo $formulario["estudio"] ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 ocultar casa">
                                                        <h3 style="text-align: center;"><span class="subtitulo_kc">Cisterna</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Cisterna-01.png"/></h3>
                                                        <div style="text-align: center">
                                                            <?php echo $formulario["cisterna"] ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 ocultar casa">
                                                        <h3 style="text-align: center;"><span class="subtitulo_kc">Jardin</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Jardin.png"/></h3>
                                                        <?php echo $formulario["jardin"] ?>
                                                    </div>
                                                    <div class="col-md-2 ocultar casa">
                                                        <h3 style="text-align: center;"><span class="subtitulo_kc">Patio</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Patio.png"/></h3>
                                                        <?php echo $formulario["patio"] ?>
                                                    </div>
                                                    <div class="col-md-2 ocultar casa">
                                                        <h3 style="text-align: center;"><span class="subtitulo_kc">Lavanderia</span><br/><br/><img width="25%" src="/assets/img/caracteristicas/Lavanderia.png"/></h3>
                                                        <div style="text-align: center">
                                                            <?php echo $formulario["lavanderia"] ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <span class="subtitulo_kc">Estado del inmueble&nbsp;<span style="color:red;">*</span></span>
                                <?php echo $formulario["estado"]; ?>
                            </div>
                            <div class="col-md-6">
                                <span class="subtitulo_kc">Amenidades / extras</span>
                                <?php echo $formulario["amenidades"]; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="">
                    <div class="panel-content">
                        <h4 class="titulo_kc">
                            INFORMACIÓN FINANCIERA
                            <hr/>
                        </h4>
                        <div class="row">
                            <div class="col-md-3">
                                <span class="subtitulo_kc">Forma de pago</span>
                                <div style="text-align: center">
                                    <?php echo $formulario["forma_pago"]; ?>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="col-md-3">
                                    <span class="subtitulo_kc">Precio&nbsp;<span style="color:red;">*</span></span>
                                    <?php echo $formulario["moneda"] ?>
                                </div>
                                <div class="col-md-3">
                                    <span class="subtitulo_kc">Minino</span>
                                    <?php echo $formulario["presupuesto_min"] ?>
                                </div>
                                <div class="col-md-3">
                                    <span class="subtitulo_kc">Maximo</span>
                                    <?php echo $formulario["presupuesto_max"] ?>
                                </div>
                                <div class="col-md-3" id="precalificacion" style="text-align: center;">
                                    <span class="subtitulo_kc">Precalificacion</span><br/>
                                    <?php echo $formulario["precalificacion"] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" id="modulo_precalificacion">
                <div class="">
                    <div class="panel-content">
                        <h4 class="titulo_kc">
                            PRECALIFICACIÓN
                            <hr/>
                        </h4>
                        <div class="row">
                            <div class="col-md-2">
                                <span class="subtitulo_kc">Nucleo familiar</span>
                                <?php echo $formulario["nucleo_familiar"]; ?>
                            </div>
                            <div class="col-md-3">
                                <span class="subtitulo_kc">Ingresos</span>
                                <?php echo $formulario["ingresos"]; ?>
                            </div>
                            <div class="col-md-3">
                                <span class="subtitulo_kc">Egresos</span>
                                <?php echo $formulario["egresos"]; ?>
                            </div>
                            <div class="col-md-2">
                                <span class="subtitulo_kc">Tasa de interes anual</span>
                                <?php echo $formulario["tasa_interes_anual"]; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <span class="subtitulo_kc">Enganche</span>
                                <?php echo $formulario["enganche"]; ?>
                            </div>
                            <div class="col-md-2">
                                <span class="subtitulo_kc">Plazo en años</span>
                                <?php echo $formulario["plazo_en_anios"]; ?>
                            </div>
                            <div class="col-md-2">
                                <span class="subtitulo_kc">Plazo en meses</span>
                                <?php echo $formulario["plazo_en_meses"]; ?>
                            </div>
                            <div class="col-md-3">
                                <span class="subtitulo_kc">Monto a financiar maximo</span>
                                <?php echo $formulario["monto_financiar_maximo"]; ?>
                            </div>
                            <div class="col-md-3">
                                <span class="subtitulo_kc">Cuota total maxima mensual</span>
                                <?php echo $formulario["cuota_total_mensual_maxima"]; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="">
                    <div class="panel-content">
                        <h4 class="titulo_kc">
                            INFORMACIÓN DE CONTACTO
                            <hr/>
                        </h4>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="subtitulo_kc">Nombre del cliente</span>
                                <div style="text-align: center">
                                    <?php echo $formulario["nombre_cliente"] ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span class="subtitulo_kc">Correo del cliente</span>
                                <div style="text-align: center">
                                    <?php echo $formulario["correo_cliente"] ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span class="subtitulo_kc">Telefono del cliente</span>
                                <div style="text-align: center">
                                    <?php echo $formulario["telefono_cliente"] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" id="direccion">
                <div class="">
                    <div class="panel-content">
                        <div class="row">
                            <div style="float:left;">
                                <span class="titulo_kc">UBICACIÓN</span>
                            </div>
                            <div style="float:right;">
                                <a class="btn btn-default btn-rounded" href="#/" onclick="mas_direccion();">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <span class="subtitulo_kc">Departamento</span>
                                <div style="text-align: center">
                                    <?php echo $formulario["departamento"] ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <span class="subtitulo_kc">Municipio</span>
                                <div style="text-align: center">
                                    <?php echo $formulario["municipio"] ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <span class="subtitulo_kc">Zona</span>
                                <div style="text-align: center">
                                    <?php echo $formulario["zona"] ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <span class="subtitulo_kc">KM.</span>
                                <div style="text-align: center">
                                    <?php echo $formulario["km"] ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span class="subtitulo_kc">Carretera</span>
                                <div style="text-align: center">
                                    <?php echo $formulario["carretera"] ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="subtitulo_kc">Dirección</span>
                                <div style="text-align: center">
                                    <?php echo $formulario["direccion"] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php for ($i = 2; $i < $cantidad; $i++): ?>
                    <div class=""  id="direccion_<?php echo $i ?>" >
                        <div class="panel-content">
                            <div class="row">
                                <div style="float:left;">
                                    <span class="titulo_kc">UBICACIÓN <?php echo $i ?></span>
                                </div>
                                <div style="float:right;">
                                    <a class="btn btn-default btn-rounded" href="#/" onclick="menos_direccion(<?php echo $i ?>);">
                                        <i class="fa fa-minus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <span class="subtitulo_kc">Departamento</span>
                                    <div style="text-align: center">
                                        <?php echo $formulario["departamento_" . $i] ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <span class="subtitulo_kc">Municipio</span>
                                    <div style="text-align: center">
                                        <?php echo $formulario["municipio_" . $i] ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <span class="subtitulo_kc">Zona</span>
                                    <div style="text-align: center">
                                        <?php echo $formulario["zona_" . $i] ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <span class="subtitulo_kc">KM.</span>
                                    <div style="text-align: center">
                                        <?php echo $formulario["km_" . $i] ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <span class="subtitulo_kc">Carretera</span>
                                    <div style="text-align: center">
                                        <?php echo $formulario["carretera_" . $i] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="subtitulo_kc">Dirección</span>
                                    <div style="text-align: center">
                                        <?php echo $formulario["direccion_" . $i] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
        <button type="submit" class="btn col-md-1 col-xs-2 col-sm-2" style="position: fixed;bottom: 20px;right: 30px;z-index: 99;border: none;background-color:#305da8;color:white;">
            <i class="fa fa-save"></i>
            <span class="hidden-sm hidden-xs">
                Guardar
            </span>
        </button>
        <?php echo $formulario->renderHiddenFields() ?>
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
                <button type="button" class="btn btn-danger btn-embossed" data-dismiss="modal" onclick="location.href = '<?php echo url_for("requerimiento/index") ?>'">Salir</button>
                <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
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
                        $("#nuevo_requerimiento_tipo_inmueble").on('change', function () {
                            ocultar($("#nuevo_requerimiento_tipo_inmueble").val());
                        });
                        ocultar($("#nuevo_requerimiento_tipo_inmueble").val());
                    });
                    function ocultar(valor) {
                        $(".ocultar").hide();
                        switch (valor) {
                            case "Casa":
                                $(".casa").show();
                                break;
                            case "Apartamento":
                                $(".casa").show();
                                break;
                            case "Terreno":
                                $(".terreno").show();
                                break;
                            case "Oficinas":
                                $(".oficina").show();
                                break;
                            case "Local":
                                $(".oficina").show();
                                break;
                            case "Edificio":
                                $(".edificio").show();
                                break;
                            case "Bodega":
                                $(".bodega").show();
                                break;
                        }
                    }
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
                            calculo();
                        } else {
                            $("#modulo_precalificacion").hide();
                            $("#nuevo_requerimiento_presupuesto_max").removeAttr('readonly');
                        }
                    }
                    function calculo() {
                        var precalificacion = $("#nuevo_requerimiento_precalificacion").val();
                        if (precalificacion == "Si") {
                            plazo_en_meses();
                            monto_financiar();
                        }
                    }
                    function plazo_en_meses() {
                        var plazo_anios = parseFloat($("#nuevo_requerimiento_plazo_en_anios").val());
                        $("#nuevo_requerimiento_plazo_en_meses").val(plazo_anios * 12);
                    }
                    function monto_financiar() {
                        var X = parseFloat(limpieza_coma($("#nuevo_requerimiento_tasa_interes_anual").val()));
                        var Y = parseFloat(limpieza_coma($("#nuevo_requerimiento_plazo_en_anios").val()));
                        var ingreso_neto = parseFloat(limpieza_coma($("#nuevo_requerimiento_ingresos").val()) - limpieza_coma($("#nuevo_requerimiento_egresos").val()));
                        var cuota_mensual_maxima = parseFloat(ingreso_neto * 0.3636363636363636);
                        var W = ingreso_neto;
                        var Z = parseFloat(limpieza_coma($("#nuevo_requerimiento_enganche").val()));
                        var TASA_INTERES_ANUAL = X / 100;
                        var presupuesto_maximo = (-(((Math.pow(((TASA_INTERES_ANUAL / 12) + 1), (Y * 12))) * ((TASA_INTERES_ANUAL / 12)) * Z) / (Math.pow(((TASA_INTERES_ANUAL / 12) + 1), (Y * 12)) - 1)) - cuota_mensual_maxima) / (-(((TASA_INTERES_ANUAL / 12) * (Math.pow(((TASA_INTERES_ANUAL / 12) + 1), (Y * 12)))) / ((Math.pow(((TASA_INTERES_ANUAL / 12) + 1), (Y * 12))) - 1)) - (12029 / 11200000));
                        var Iusi = (0.009 * (presupuesto_maximo)) / (1.12 * 12);
                        var Seguro = (0.01 * presupuesto_maximo * 0.04529) / 1.12;
                        var C = parseFloat(cuota_mensual_maxima - Iusi - Seguro);
                        var Monto_Financiar = ((Math.pow(((TASA_INTERES_ANUAL / 12) + 1), (-(Y * 12)))) * (Math.pow(((TASA_INTERES_ANUAL / 12) + 1), (Y * 12)) - 1) * C) / (TASA_INTERES_ANUAL / 12);
                        if (isNaN(Monto_Financiar)) {
                            $("#nuevo_requerimiento_monto_financiar_maximo").val(0);
                        } else {
                            $("#nuevo_requerimiento_monto_financiar_maximo").val(Monto_Financiar.toFixed(2));
                        }
                        $("#nuevo_requerimiento_cuota_total_mensual_maxima").val(cuota_mensual_maxima.toFixed(2));
                        if (isNaN(presupuesto_maximo)) {
                            $("#nuevo_requerimiento_presupuesto_max").val(0);
                        } else {
                            $("#nuevo_requerimiento_presupuesto_max").val(presupuesto_maximo.toFixed(2));
                        }
                        numero($("#nuevo_requerimiento_presupuesto_max"));
                        numero($("#nuevo_requerimiento_cuota_total_mensual_maxima"));
                        numero($("#nuevo_requerimiento_monto_financiar_maximo"));
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
                    function atras() {
                        $('<p>Are you sure?</p>').dialog({
                            buttons: {
                                "Yes": function () {
                                    alert('you chose yes');
                                },
                                "No": function () {
                                    alert('you chose no');
                                },
                                "Cancel": function () {
                                    alert('you chose cancel');
                                    dialog.dialog('close');
                                }
                            }
                        });
                    }
</script>
