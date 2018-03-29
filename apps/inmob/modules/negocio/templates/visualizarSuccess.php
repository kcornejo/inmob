<?php if ($usuario_id == $negocio->getUsuarioReq()): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-header"   style="background-color:#305da8;color:white;font-size:14pt;">
                    <h3 face="Helvetica">
                        <a href="<?php echo url_for("negocio/index") ?>" style="color:white;"><i class="icon icons-arrows-03"></i></a>
                        <?php echo $negocio->getPropiedad()->getTipoInmueble() ?> en <?php
                        switch ($negocio->getPropiedad()->getTipoOperacion()) {
                            case "Vender":
                                echo "Venta";
                                break;
                            case "Renta";
                                echo "Renta";
                                break;
                        }
                        ?>
                    </h3>
                </div>
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-7 visible-md-block visible-lg-block" style=";background-color:#f1f3f3; text-align: center;height: 375px;">
                            <?php $contador = false; ?>
                            <?php foreach ($negocio->getPropiedad()->getPropiedadImagens() as $fila): ?>
                                <?php if (!$contador): ?>
                                    <a class="fancybox" rel="group_max" href="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>">
                                        <img  src="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>" alt="" style="max-height: 100%;height: 100%;"/>
                                    </a>
                                    <br/><br/>
                                <?php endif; ?>
                                <?php $contador = true ?>
                            <?php endforeach; ?>
                            <?php if (sizeof($negocio->getPropiedad()->getPropiedadImagens()) == 0): ?>
                                <img style="max-height: 100%;height: 100%;" src="<?php echo $negocio->getPropiedad()->getDireccionImagen() ?>"/>
                            <?php endif; ?>  
                        </div>
                        <div class="col-md-7 visible-sm-block visible-xs-block" style=";background-color:#f1f3f3; text-align: center; ">
                            <?php $contador = false; ?>
                            <?php foreach ($negocio->getPropiedad()->getPropiedadImagens() as $fila): ?>
                                <?php if (!$contador): ?>
                                    <a class="fancybox" rel="group_min" href="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>">
                                        <img  src="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>" alt="" style="width: 100%;"/>
                                    </a>
                                <?php endif; ?>
                                <?php $contador = true ?>
                            <?php endforeach; ?>
                            <?php if (sizeof($negocio->getPropiedad()->getPropiedadImagens()) == 0): ?>
                                <img style="max-height: 100%;height: 100%;" src="<?php echo $negocio->getPropiedad()->getDireccionImagen() ?>"/>
                            <?php endif; ?>  
                        </div>
                        <div class="col-md-5">
                            <div class="panel">
                                <div class="panel-header">
                                    <h5 style="color:gray;">
                                        INFORMACION FINANCIERA
                                        <hr/>
                                    </h5>
                                </div>
                                <div class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <td colspan="2">
                                                Precio: <?php echo $negocio->getPropiedad()->getMoneda()->getCodigo() . " " . number_format($negocio->getPropiedad()->getPrecio(), 0) ?>
                                                &nbsp;<?php echo $negocio->getPropiedad()->getNegociable() ? "NEGOCIABLE" : "NO NEGOCIABLE" ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                Forma de Pago: <?php echo $negocio->getPropiedad()->getFormaPago() ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                Mantenimiento Mensual: <?php echo $negocio->getPropiedad()->getMoneda()->getCodigo() . " " . number_format($negocio->getPropiedad()->getMantenimientoMensual(), 0) ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                Iusi Trimestral: <?php echo $negocio->getPropiedad()->getMoneda()->getCodigo() . " " . number_format($negocio->getPropiedad()->getIusiSemestral(), 0) ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <?php echo $negocio->getPropiedad()->getIncluyeGastosEscritura() ? "INCLUYE GASTOS DE ESCRITURA" : "NO INCLUYE GASTOS DE ESCRITURA" ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center">
                                        <center>
                                            Comunidad: <input disabled="true" type="number" class="rating" data-readonly value="<?php echo $negocio->getPropiedad()->getComunidad() ?>"/>
                                        </center>
                                        </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 visible-md-block visible-lg-block">
                            <?php $paso = false; ?>
                            <?php foreach ($negocio->getPropiedad()->getPropiedadImagens() as $fila): ?>
                                <?php if ($paso): ?>
                                    <a class="fancybox" rel="group_min" href="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>">
                                        <img  src="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>" alt="" style="max-height: 100%;height: 30px;"/>
                                    </a>
                                <?php endif; ?>
                                <?php $paso = true; ?>
                            <?php endforeach; ?>

                        </div>
                        <div style="display:none;">
                            <?php $paso = false; ?>
                            <?php foreach ($negocio->getPropiedad()->getPropiedadImagens() as $fila): ?>
                                <?php if ($paso): ?>
                                    <a class="fancybox" rel="group_max" href="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>">
                                        <img  src="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>" alt="" style="max-height: 100%;height: 30px;"/>
                                    </a>
                                <?php endif; ?>
                                <?php $paso = true; ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-md-12">
                            <div style="float:left;">
                                <h5 style="color:gray;">
                                    INFORMACION DE CONTACTO
                                </h5>
                            </div>
                            <div style="float:right;">
                                <h5 style="color:gray;">
                                    <?php echo $negocio->getPropiedad()->getCreatedAt("d/m/Y") ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr/>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 bg-gray-light">
                            <br/>
                            <div class="col-md-1 col-sm-4 col-xs-4" style="float:left">
                                <img style="max-height: 60px;" src="/assets/img/caracteristicas/usuario.png"/>
                            </div>
                            <div class="col-md-11 col-sm-8 col-xs-8" style="hyphens: auto" >
                                <?php echo $negocio->getPropiedad()->getUsuario()->getNombreCompleto() ?><br/>
                                <?php echo $negocio->getPropiedad()->getUsuario()->getEmail() ?><br/>
                                <?php echo $negocio->getPropiedad()->getUsuario()->getNumeroTelefono() ?><br/>    
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <br/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h5 style="color:gray;">
                                CARACTERISTICAS DEL INMUEBLE
                                <hr/>
                            </h5>
                            <?php include_partial("soporte/caracteristicas", array("negocio" => $negocio)); ?>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h5 style="color:gray;">
                                UBICACION
                            </h5>
                            <hr/>
                            <?php echo $negocio->getDireccionCompleta(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-header"   style="background-color:#305da8;color:white;font-size:14pt;">
                    <h3 face="Helvetica">
                        <a href="<?php echo url_for("negocio/index") ?>" style="color:white;"><i class="icon icons-arrows-03"></i></a>
                        Requerimiento en <?php
                        switch ($negocio->getRequerimiento()->getTipoOperacion()) {
                            case "Comprar":
                                echo "Compra";
                                break;
                            case "Renta";
                                echo "Renta";
                                break;
                        }
                        ?>
                    </h3>
                </div>
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-7 visible-md-block visible-lg-block" style=";background-color:#f1f3f3; text-align: center;height: 375px;">
                            <?php $contador = false; ?>
                            <?php foreach ($negocio->getPropiedad()->getPropiedadImagens() as $fila): ?>
                                <?php if (!$contador): ?>
                                    <a class="fancybox" rel="group" href="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>">
                                        <img  src="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>" alt="" style="width:100%;height: 100%"/>
                                    </a>
                                    <br/><br/>
                                <?php else: ?>
                                    <a class="fancybox col-xs-4 col-md-2" rel="group" href="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>">
                                        <img  src="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>" alt="" style="width:100%;height: 100%"/>
                                    </a>
                                <?php endif; ?>
                                <?php $contador = true ?>
                            <?php endforeach; ?>
                            <?php if (sizeof($negocio->getPropiedad()->getPropiedadImagens()) == 0): ?>
                                <img style="max-height: 100%;height: 100%" src="<?php echo $negocio->getPropiedad()->getDireccionImagen() ?>"/>
                            <?php endif; ?>  
                        </div>
                        <div class="col-md-7 visible-xs-block visible-sm-block" style=";background-color:#f1f3f3; text-align: center;">
                            <?php $contador = false; ?>
                            <?php foreach ($negocio->getPropiedad()->getPropiedadImagens() as $fila): ?>
                                <?php if (!$contador): ?>
                                    <a class="fancybox" rel="group" href="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>">
                                        <img  src="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>" alt="" style="width:100%;height: 100%"/>
                                    </a>
                                    <br/><br/>
                                <?php else: ?>
                                    <a class="fancybox col-xs-4 col-md-2" rel="group" href="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>">
                                        <img  src="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>" alt="" style="width:100%;height: 100%"/>
                                    </a>
                                <?php endif; ?>
                                <?php $contador = true ?>
                            <?php endforeach; ?>
                            <?php if (sizeof($negocio->getPropiedad()->getPropiedadImagens()) == 0): ?>
                                <img style="max-height: 100%;height: 100%" src="<?php echo $negocio->getPropiedad()->getDireccionImagen() ?>"/>
                            <?php endif; ?>  
                        </div>
                        <div class="col-md-5">
                            <div class="panel visible-md-block visible-lg-block" style="height: 375px;">
                                <div class="panel-header">
                                    <h5 style="color:gray;">
                                        INFORMACION FINANCIERA
                                        <hr/>
                                    </h5>
                                </div>
                                <div class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <td colspan="2">
                                                Precio: <?php echo $negocio->getRequerimiento()->getMoneda()->getCodigo() . " " . number_format($negocio->getRequerimiento()->getPresupuestoMin(), 0) . "-" . number_format($negocio->getRequerimiento()->getPresupuestoMax(), 0) ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                Forma de Pago: <?php echo $negocio->getPropiedad()->getFormaPago() ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="panel visible-xs-block visible-sm-block">
                                <div class="panel-header">
                                    <h5 style="color:gray;">
                                        INFORMACION FINANCIERA
                                        <hr/>
                                    </h5>
                                </div>
                                <div class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <td colspan="2">
                                                Precio: <?php echo $negocio->getRequerimiento()->getMoneda()->getCodigo() . " " . number_format($negocio->getRequerimiento()->getPresupuestoMin(), 0) . "-" . number_format($negocio->getRequerimiento()->getPresupuestoMax(), 0) ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                Forma de Pago: <?php echo $negocio->getPropiedad()->getFormaPago() ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div style="float:left;">
                                <h5 style="color:gray;">
                                    INFORMACION DE CONTACTO
                                </h5>
                            </div>
                            <div style="float:right;">
                                <h5 style="color:gray;">
                                    <?php echo $negocio->getPropiedad()->getCreatedAt("d/m/Y") ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr/>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 bg-gray-light">
                            <br/>
                            <div class="col-md-1 col-sm-4 col-xs-4" style="float:left">
                                <img style="max-height: 60px;" src="/assets/img/caracteristicas/usuario.png"/>
                            </div>
                            <div class="col-md-11 col-sm-8 col-xs-8"  style="hyphens: auto">
                                <?php echo $negocio->getRequerimiento()->getUsuario()->getNombreCompleto() ?><br/>
                                <?php echo $negocio->getRequerimiento()->getUsuario()->getEmail() ?><br/>
                                <?php echo $negocio->getRequerimiento()->getUsuario()->getNumeroTelefono() ?><br/>    
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <br/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h5 style="color:gray;">
                                CARACTERISTICAS DEL INMUEBLE
                                <hr/>
                            </h5>
                            <?php include_partial("soporte/caracteristicas", array("negocio" => $negocio)); ?>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h5 style="color:gray;">
                                UBICACION
                            </h5>
                            <hr/>
                            <?php echo $negocio->getDireccionCompleta(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="row">
    <a data-toggle="modal" class="col-md-1 col-xs-3 col-sm-1" data-target="#modal-cotizador" style="position: fixed;bottom: 20px;left: 30px;z-index: 99;border: none;border-radius: 10px;cursor:pointer;">
        <img style="width:100%" src="/assets/img/caracteristicas/Negocios - cotizador.png"/>
    </a>
    <a onclick="avisos();" data-toggle="modal" class="col-md-1 col-xs-3 col-sm-1" data-target="#modal-chat" style="position: fixed;bottom: 20px;left: 40%;z-index: 99;border: none;border-radius: 10px;cursor:pointer;">
        <img style="width:100%" src="/assets/img/caracteristicas/Negocios - chat.png"/>
    </a>
    <a class="col-md-1 col-xs-3 col-sm-1" target="_blank" style="position: fixed;bottom: 20px;right: 30px;z-index: 99;border: none;border-radius: 10px" href="tel:<?php echo $negocio->getRequerimiento()->getUsuario()->getNumeroTelefono() ?>">
        <img style="width:100%" src="/assets/img/caracteristicas/Negocios - llamar.png"/>
    </a>
</div>
<div class="modal fade" id="modal-chat" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
                <h4 class="modal-title"><strong>Chat</strong></h4>
            </div>
            <div class="modal-body">
                <div class="panel-body" id="historial">
                    <?php $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad'); ?>
                    <?php foreach ($negocio->getMensajeNegocios() as $msg): ?>
                        <?php if ($usuario_id == $msg->getUsuarioId()): ?>
                            <div class="form-group pull-right pb-chat-labels-right">
                                <span class="label label-primary pb-chat-labels pb-chat-labels-primary"><?php echo $msg->getMensaje() ?></span>
                            </div>
                            <br/>
                            <hr>
                        <?php else: ?>
                            <div class="form-group">
                                <span class="label label-default pb-chat-labels pb-chat-labels-left"><?php echo $msg->getMensaje() ?></span>
                            </div>
                            <hr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-11 col-xs-10">
                            <textarea class="form-control pb-chat-textarea" id="texto_mensaje" placeholder="Ingrese su mensaje aqui..."></textarea>
                        </div>
                        <div class="col-md-1 col-xs-2 pb-btn-circle-div">
                            <button class="btn btn-xs btn-primary btn-circle pb-chat-btn-circle" onclick="mensaje();"><span class="fa fa-chevron-right"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-cotizador" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
                <h4 class="modal-title"><strong>Cotizador</strong></h4>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                    Precio de Venta
                    <table class="table">
                        <tr>
                            <td style="width:30%">
                                <select id="moneda_venta" class="form-control input-small actualizar_select">
                                    <?php foreach ($monedas as $fila): ?>
                                        <option value="<?php echo $fila->getCodigo() ?>">
                                            <?php echo $fila->getCodigo() ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td style="width:70%">
                                <input type="text"  value="<?php echo $negocio->getPropiedad()->getPrecio() ?>" id="precio_venta" class="form-control actualizar_input ken_number" style="text-align: right"/>
                            </td>
                        </tr>
                    </table>
                    Enganche
                    <table class="table">
                        <tr>
                            <td class="moneda_contenido">

                            </td>
                            <td>
                                <input type="text" value="<?php echo $negocio->getPropiedad()->getPrecio() / 10 ?>"  id="enganche" class="form-control actualizar_input ken_number" style="text-align: right"/>
                            </td>
                            <td>

                            </td>
                        </tr>
                    </table>
                    Plazo en años
                    <table class="table">
                        <tr>
                            <td>
                                <input type="number" value="25"  id="plazo_anios" class="form-control actualizar_input" style="text-align: right"/>
                            </td>
                            <td id="plazo_meses">

                            </td>
                        </tr>
                    </table>
                    Banco
                    <table class="table">
                        <tr>
                            <td>
                                <select class="form-control actualizar_select" id="banco">
                                    <?php foreach ($bancos as $banco): ?>
                                        <option value="<?php echo $banco->getId() ?>">
                                            <?php echo $banco->getDescripcion() ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                    Tasa de Interés Anual
                    <table class="table">
                        <tr>
                            <td>
                                <input type="number" value="8"  id="tasa_interes_anual" class="form-control actualizar_input" style="text-align: right"/>
                            </td>
                            <td>
                                %
                            </td>
                        </tr>
                    </table>
                    <hr/>
                    Monto a Financiar
                    <table class="table">
                        <tr>
                            <td class="moneda_contenido">

                            </td>
                            <td>
                                <input type="text" readonly="readonly"  id="monto_financiar" class="form-control actualizar_input ken_number" style="text-align: right"/>
                            </td>
                        </tr>
                    </table>
                    Cuota Nivelada
                    <table class="table">
                        <tr>
                            <td class="moneda_contenido">

                            </td>
                            <td>
                                <input type="text" readonly="readonly"  id="cuota_nivelada" class="form-control actualizar_input ken_number" style="text-align: right"/>
                            </td>
                        </tr>
                    </table>
                    IUSI
                    <table class="table">
                        <tr>
                            <td class="moneda_contenido">

                            </td>
                            <td>
                                <input type="text"  readonly="readonly" id="iusi" class="form-control actualizar_input ken_number" style="text-align: right"/>
                            </td>
                        </tr>
                    </table>
                    Seguro contra siniestros
                    <table class="table">
                        <tr>
                            <td class="moneda_contenido">

                            </td>
                            <td>
                                <input type="text" readonly="readonly" id="seguro_contra_siniestros" class="form-control actualizar_input ken_number" style="text-align: right"/>
                            </td>
                        </tr>
                    </table>
                    <hr/>
                    Cuota Total
                    <table class="table">
                        <tr>
                            <td class="moneda_contenido">

                            </td>
                            <td>
                                <input type="text" readonly="readonly" id="cuota_total" class="form-control actualizar_input ken_number" style="text-align: right"/>
                            </td>
                        </tr>
                    </table>
                    Ingreso del núcleo familiar
                    <table class="table">
                        <tr>
                            <td class="moneda_contenido">

                            </td>
                            <td>
                                <input type="text" readonly="readonly" id="nucleo_familiar" class="form-control actualizar_input ken_number" style="text-align: right"/>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="relacion_cuota_interes"/>
<input type="hidden" id="seguro_banco"/>
<input type="hidden" id="factor_construccion"/>
<script src="/assets/global/plugins/jquery/jquery-3.1.0.min.js"></script>
<script type="text/javascript">
                                $(document).ready(function () {
<?php if ($mensaje_abrir): ?>
                                        $("#modal-chat").modal();
                                        avisos();
<?php endif; ?>
                                    listadoMensaje();
                                    setInterval(listadoMensaje, 5000);
                                    $(".actualizar_select").on('change', function () {
                                        banco();
                                        actualizar();
                                    });
                                    $(".actualizar_input").on('input', function () {
                                        banco();
                                        actualizar();
                                    });

                                    banco();
                                    actualizar();

                                });
                                function banco() {
                                    var valor = $("#banco").val();
                                    $.get("<?php echo url_for('soporte/banco') ?>", {valor: valor}, function (response) {
                                        $("#seguro_banco").val(response.seguro_banco);
                                        $("#relacion_cuota_interes").val(response.relacion_cuota_interes);
                                        $("#factor_construccion").val(response.factor_construccion);
                                        actualizar();
                                    }, 'json');
                                }
                                function actualizar() {
                                    var valor = $("#moneda_venta").val();
                                    $(".moneda_contenido").html(valor);
                                    var plazo_anio = $("#plazo_anios").val();
                                    $("#plazo_meses").html(plazo_anio * 12);
                                    var monto_financiar = limpieza_coma($("#precio_venta").val()) - limpieza_coma($("#enganche").val());
                                    var interes_anual = $("#tasa_interes_anual").val() / 100;
                                    $("#monto_financiar").val(monto_financiar.toFixed(2));
                                    var cuota_nivelada = ((monto_financiar * (interes_anual / 12)) * Math.pow((1 + (interes_anual / 12)), (plazo_anio * 12))) / (Math.pow((1 + (interes_anual / 12)), (plazo_anio * 12)) - 1);
                                    $("#cuota_nivelada").val(cuota_nivelada.toFixed(2));
                                    var precio_venta = limpieza_coma($("#precio_venta").val());
                                    var iusi = (((((precio_venta / 1.12)) * 0.009) / 12));
                                    var factor_construccion = $("#factor_construccion").val();
                                    var seguro_banco = $("#seguro_banco").val();
                                    $("#iusi").val(iusi.toFixed(2));
                                    var seguro = ((precio_venta * factor_construccion) * seguro_banco) / 12;
                                    $("#seguro_contra_siniestros").val(seguro.toFixed(2));
                                    var cuota_total = cuota_nivelada + iusi + seguro;
                                    $("#cuota_total").val(cuota_total.toFixed(2));
                                    var nucleo_familiar = cuota_total / $("#relacion_cuota_interes").val();
                                    $("#nucleo_familiar").val(nucleo_familiar.toFixed(2));
                                    numero($("#nucleo_familiar"));
                                    numero($("#cuota_total"));
                                    numero($("#seguro_contra_siniestros"));
                                    numero($("#iusi"));
                                    numero($("#cuota_nivelada"));
                                    numero($("#monto_financiar"));
                                }
                                function mensaje() {
                                    var mensaje = $("#texto_mensaje").val();
                                    $.post("<?php echo url_for('soporte/mensaje') ?>", {negocio_id: "<?php echo $negocio->getId() ?>", mensaje: mensaje}, function (response) {
                                        $("#texto_mensaje").val("");
                                        listadoMensaje();
                                    });
                                }
                                function listadoMensaje() {
                                    $.get("<?php echo url_for('soporte/listadoMensaje') ?>", {negocio_id: "<?php echo $negocio->getId() ?>"}, function (response) {
                                        $("#historial").html(response);
                                    });
                                }
                                function avisos() {
                                    $.get("<?php echo url_for('soporte/aviso') ?>", {negocio_id: "<?php echo $negocio->getId() ?>"}, function () {});
                                }
</script>