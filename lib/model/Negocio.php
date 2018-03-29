<?php

/**
 * Skeleton subclass for representing a row from the 'negocio' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * 01/14/18 19:18:11
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class Negocio extends BaseNegocio {

    public function getMensajesPendientes() {
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $negocio_id = $this->getId();
        $MensajeNegocio = MensajeNegocioQuery::create()
                ->where("negocio_id = $negocio_id and usuario_id != $usuario_id and visto = 0")
                ->find();
        return sizeof($MensajeNegocio);
    }

    public function getVisto() {
        $visto = false;
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        if ($this->getUsuarioReq() == $usuario_id) {
            $visto = $this->getUsuarioReqVisto();
        } else {
            $visto = $this->getUsuarioPropVisto();
        }
        return $visto;
    }

    public function getDireccionCompleta() {
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $Propiedad = $this->getPropiedad();
        if ($this->getUsuarioProp() == $usuario_id) {
            $DireccionRequerimiento = DireccionRequerimientoQuery::create()->findByRequerimientoId($this->getRequerimientoId());
            $listado = array();
            foreach ($DireccionRequerimiento as $dir) {
                if (($Propiedad->getZona() == $dir->getZona() && $Propiedad->getMunicipio() == $dir->getMunicipio()) || ($Propiedad->getCarreteraId() && $Propiedad->getCarreteraId() == $dir->getCarreteraId())) {
                    $listado[] = trim($dir->getZona()) ? "Zona: " . trim($dir->getZona()) : null;
                    $listado[] = trim($dir->getCarretera()) ? "Carretera: " . trim($dir->getCarretera()) : null;
                    $listado[] = trim($dir->getKm()) ? "Km: " . trim($dir->getKm()) : null;
                    $listado[] = trim($dir->getMunicipio()) ? "Muni: " . trim($dir->getMunicipio()) : null;
                    $listado[] = trim($dir->getDepartamento()) ? "Depto: " . trim($dir->getDepartamento()) : null;
                    $listado[] = trim($dir->getDireccion()) ? "Dirección: " . trim($dir->getDireccion()) : null;
                    break;
                }
            }
            $listado = array_filter($listado);
            return implode(", ", $listado);
        } else {
            return $this->getPropiedad()->getDireccionCompleta();
        }
    }

    static function buscaRequerimiento(Propiedad $Propiedad) {
        $negocio = NegocioQuery::create()
                ->filterByPropiedadId($Propiedad->getId())
                ->find();
        foreach ($negocio as $n) {
            $n->setActivo(false);
            $n->save();
        }
        sfContext::getInstance()->getUser()->setAttribute('filtro', false, "Requerimiento");
        $Requerimientos = RequerimientoQuery::create()->find();
        foreach ($Requerimientos as $fila) {
            self::match($Propiedad, $fila);
        }
    }

    static function buscaPropiedad(Requerimiento $Requerimiento) {
        $negocio = NegocioQuery::create()
                ->filterByRequerimientoId($Requerimiento->getId())
                ->find();
        foreach ($negocio as $n) {
            $n->setActivo(false);
            $n->save();
        }
        sfContext::getInstance()->getUser()->setAttribute('filtro', false, "Propiedad");
        $Propiedades = PropiedadQuery::create()->find();
        foreach ($Propiedades as $fila) {
            self::match($fila, $Requerimiento);
        }
    }

    public function getComision() {
        $monto = $this->getPropiedad()->getPrecio() * ($this->getPropiedad()->getMiComision() / 100);
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        if ($this->getUsuarioReq() == $usuario_id) {
            $monto = $monto * ($this->getPropiedad()->getComisionCompartida() / 100);
        } else {
            $monto = $monto * ((100 - $this->getPropiedad()->getComisionCompartida()) / 100);
        }
        if ($this->getPropiedad()->getMoneda()->getCodigo() != 'GTQ') {
            $MonedaQuetzal = MonedaQuery::create()->findOneBySimbolo('GTQ');
            if ($MonedaQuetzal) {
                $TasaCambio = TasaCambioQuery::create()
                        ->filterByMonedaOrigen($this->getPropiedad()->getMonedaId())
                        ->filterByMonedaDestino($MonedaQuetzal->getId())
                        ->findOne();
                if ($TasaCambio) {
                    $monto *= $TasaCambio->getMonto();
                }
            }
        }
        return $monto;
    }

    public function getMaximaComision() {
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $monto_maximo = 0;
        if ($this->getUsuarioProp() == $usuario_id) {
            $Negocios = NegocioQuery::create()
                    ->filterByPropiedadId($this->getPropiedadId())
                    ->filterByActivo(true)
                    ->find();
            foreach ($Negocios as $neg) {
                $monto = $neg->getComision();
                if ($monto_maximo <= $monto) {
                    $monto_maximo = $monto;
                }
            }
        } else {
            $Negocios = NegocioQuery::create()
                    ->filterByRequerimientoId($this->getRequerimientoId())
                    ->filterByActivo(true)
                    ->find();
            foreach ($Negocios as $neg) {
                $monto = $neg->getComision();
                if ($monto_maximo <= $monto) {
                    $monto_maximo = $monto;
                }
            }
        }
        return "GTQ " . number_format($monto_maximo);
    }

    public static function getComisionRequerimientoCompra() {
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $requerimiento = RequerimientoQuery::create()
                ->filterByUsuarioId($usuario_id)
                ->where("estatus !=  'Eliminado' and tipo_operacion = 'Comprar'")
                ->orderById('DESC')
                ->find();
        $monto = 0;
        foreach ($requerimiento as $n) {
            $monto += (int) str_replace(",", "", substr($n->getMaximaComision(), 4));
        }
        return "GTQ " . number_format($monto);
    }

    public static function getComisionRequerimientoVenta() {
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $requerimiento = RequerimientoQuery::create()
                ->filterByUsuarioId($usuario_id)
                ->where("estatus !=  'Eliminado' and tipo_operacion != 'Comprar'")
                ->orderById('DESC')
                ->find();
        $monto = 0;
        foreach ($requerimiento as $n) {
            $monto += (int) str_replace(",", "", substr($n->getMaximaComision(), 4));
        }
        return "GTQ " . number_format($monto);
    }

    public static function getComisionPropiedadVenta() {
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $Negocios = PropiedadQuery::create()
                ->filterByUsuarioId($usuario_id)
                ->where("estatus !=  'Eliminado' and tipo_operacion = 'Vender'")
                ->orderById('DESC')
                ->find();
        $monto = 0;
        foreach ($Negocios as $n) {
            $monto += (int) str_replace(",", "", substr($n->getMaximaComision(), 4));
        }
        return "GTQ " . number_format($monto);
    }

    public static function getComisionPropiedadRenta() {
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $Negocios = PropiedadQuery::create()
                ->filterByUsuarioId($usuario_id)
                ->where("estatus !=  'Eliminado' and tipo_operacion != 'Vender'")
                ->orderById('DESC')
                ->find();
        $monto = 0;
        foreach ($Negocios as $n) {
            $monto += (int) str_replace(",", "", substr($n->getMaximaComision(), 4));
        }
        return "GTQ " . number_format($monto);
    }

    public function getCantidadMensajesSinLeer() {
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $negocio_id = $this->getId();
        $MensajeNegocio = MensajeNegocioQuery::create()
                ->where("negocio_id = $negocio_id and usuario_id != $usuario_id and visto = 0")
                ->find();
        return sizeof($MensajeNegocio);
    }

    public function getTotalComisiones() {
        $monto = (int) str_replace(",", "", substr(self::getComisionRequerimientoCompra(), 4));
        $monto += (int) str_replace(",", "", substr(self::getComisionRequerimientoVenta(), 4));
        $monto += (int) str_replace(",", "", substr(self::getComisionPropiedadVenta(), 4));
        $monto += (int) str_replace(",", "", substr(self::getComisionPropiedadRenta(), 4));
        return "GTQ " . number_format($monto);
    }

    public function getComisionRequerimientoSM() {
        $Propiedad = $this->getPropiedad();
        $COMISION = $Propiedad->getMiComision() / 100 * $Propiedad->getPrecio();
        $COMISION_REQ = $COMISION * ($Propiedad->getComisionCompartida()) / 100;
        return $Propiedad->getMoneda()->getSimbolo() . " " . number_format($COMISION_REQ, 0);
    }

    public function getComisionVentaSM() {
        $Propiedad = $this->getPropiedad();
        $COMISION = $Propiedad->getMiComision() / 100 * $Propiedad->getPrecio();
        $COMISION_VENTA = $COMISION * (100 - $Propiedad->getComisionCompartida()) / 100;
        return $Propiedad->getMoneda()->getSimbolo() . " " . number_format($COMISION_VENTA, 0);
    }

    public function getComisionRequerimiento() {
        $Propiedad = $this->getPropiedad();
        $COMISION = $Propiedad->getMiComision() / 100 * $Propiedad->getPrecio();
        $COMISION_REQ = $COMISION * ($Propiedad->getComisionCompartida()) / 100;
        return $Propiedad->getMoneda()->getSimbolo() . " " . number_format($COMISION_REQ, 0);
    }

    public function getComisionVenta() {
        $Propiedad = $this->getPropiedad();
        $COMISION = $Propiedad->getMiComision() / 100 * $Propiedad->getPrecio();
        $COMISION_VENTA = $COMISION * (100 - $Propiedad->getComisionCompartida()) / 100;
        return $Propiedad->getMoneda()->getSimbolo() . " " . number_format($COMISION_VENTA, 0);
    }

    static function match(Propiedad $Propiedad, Requerimiento $Requerimiento) {
        $no_negocio = false;
        if ($Propiedad->getMonedaId() == $Requerimiento->getMonedaId()) {
            if (!($Propiedad->getPrecio() >= $Requerimiento->getPresupuestoMin() && $Propiedad->getPrecio() <= $Requerimiento->getPresupuestoMax())) {
                $no_negocio = true;
            }
        } else {
            $precio = $Propiedad->getPrecio();
            $MonedaOrigen = $Propiedad->getMonedaId();
            $MonedaDestino = $Requerimiento->getMonedaId();
            $TasaCambio = TasaCambioQuery::create()
                    ->filterByMonedaOrigen($MonedaOrigen)
                    ->filterByMonedaDestino($MonedaDestino)
                    ->findOne();
            if ($TasaCambio) {
                $precio = $precio * $TasaCambio->getMonto();
                if (!($precio >= $Requerimiento->getPresupuestoMin() && $precio <= $Requerimiento->getPresupuestoMax())) {
                    $no_negocio = true;
                }
            } else {
                $no_negocio = true;
            }
        }

        $direccion = false;
        $DireccionRequerimiento = DireccionRequerimientoQuery::create()->findByRequerimientoId($Requerimiento->getId());
        foreach ($DireccionRequerimiento as $dir) {
            if (($Propiedad->getZona() == $dir->getZona() && $Propiedad->getMunicipio() == $dir->getMunicipio()) || ($Propiedad->getCarreteraId() && $Propiedad->getCarreteraId() == $dir->getCarreteraId())) {
                $direccion = true;
                break;
            }
        }
        if (!$direccion) {
            $no_negocio = true;
        }
        switch ($Propiedad->getTipoOperacion()) {
            case "Rentar":
                if ($Requerimiento->getTipoOPeracion() != "Rentar") {
                    $no_negocio = true;
                }
                break;
            case "Vender":
                if ($Requerimiento->getTipoOPeracion() != "Comprar") {
                    $no_negocio = true;
                }
                break;
        }
        if ($Propiedad->getTipoInmueble() != $Requerimiento->getTipoInmueble()) {
            $no_negocio = true;
        }
        if ($Propiedad->getFormaPago() != $Requerimiento->getFormaPago()) {
            $no_negocio = true;
        }
        if (!($Propiedad->getEstado() == $Requerimiento->getEstado() || $Requerimiento->getEstado() == 'Indiferente')) {
            $no_negocio = true;
        }
        if ($Propiedad->getTipoInmueble() == "Casa") {
            if ($Propiedad->getCantidadHabitacion() < $Requerimiento->getCantidadHabitacion()) {
                $no_negocio = true;
            }
        }
        if ($Propiedad->getTipoInmueble() == "Edificio") {
            if ($Propiedad->getCantidadOficina() < $Requerimiento->getCantidadOficina()) {
                $no_negocio = true;
            }
        }
        if ($Propiedad->getTipoInmueble() == "Casa" || $Propiedad->getTipoInmueble() == "Edificio") {
            if ($Propiedad->getCantidadParqueo() < $Requerimiento->getCantidadParqueo()) {
                $no_negocio = true;
            }
        }
        if ($Propiedad->getEstatus() != "Disponible" || $Requerimiento->getEstatus() != "Disponible") {
            $no_negocio = true;
        }
        if ($Propiedad->getTipoInmueble() == "Terreno" || $Propiedad->getTipoInmueble() == "Oficina" || $Propiedad->getTipoInmueble() == "Local" || $Propiedad->getTipoInmueble() == "Bodega") {
            if ($Propiedad->getArea() < $Requerimiento->getArea()) {
                $no_negocio = true;
            }
        }
        if (!$no_negocio && $Propiedad->getId() && $Requerimiento->getId()) {
            $Negocio = NegocioQuery::create()
                    ->filterByRequerimientoId($Requerimiento->getId())
                    ->filterByPropiedadId($Propiedad->getId())
                    ->findOne();
            if (!$Negocio) {
                $Negocio = new Negocio();
            }
            $Negocio->setUsuarioReqVisto(false);
            $Negocio->setUsuarioPropVisto(false);
            $Negocio->setRequerimientoId($Requerimiento->getId());
            $Negocio->setPropiedadId($Propiedad->getId());
            $Negocio->setUsuarioReq($Requerimiento->getUsuarioId());
            $Negocio->setUsuarioProp($Propiedad->getUsuarioId());
            $Negocio->setActivo(true);
            $Negocio->save();
            $asunto = "Nuevo Negocio";
            $link = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            $link = explode("/requerimiento", $link);
            $link = $link[0];
            $link = explode("/vender", $link);
            $link = $link[0];
            $link = $link . "/negocio/visualizar?id=" . $Negocio->getId();
            $comodin = array();
            $comodin["%LINK%"] = $link;
            $comodin["%FECHA%"] = date("d/m/Y");
            $contenido_correo = FormatoCorreo::getFormato("Negocio", $comodin);
            $COMISION = $Propiedad->getMiComision() / 100 * $Propiedad->getPrecio();
            $COMISION_VENTA = $COMISION * (100 - $Propiedad->getComisionCompartida()) / 100;
            $COMISION_REQ = $COMISION * ($Propiedad->getComisionCompartida()) / 100;
            $contenido_correo = str_replace("%USUARIO%", $Requerimiento->getUsuario()->getEmail(), $contenido_correo);
            $contenido_correo = str_replace("%RENTA%", $Propiedad->getMoneda()->getCodigo() . " " . number_format($COMISION_REQ, 0), $contenido_correo);
            $contenido_correo = str_replace("%LINK%", $link, $contenido_correo);
            $CorreoPendienteReq = new CorreoPendiente();
            $CorreoPendienteReq->setEnviado(false);
            $CorreoPendienteReq->setBeneficiario($Requerimiento->getUsuario()->getEmail());
            $CorreoPendienteReq->setAsunto($asunto);
            $CorreoPendienteReq->setContenido($contenido_correo);
            $CorreoPendienteReq->save();

            $contenido_correo = Negocio::texto_correo();
            $contenido_correo = str_replace("%USUARIO%", $Propiedad->getUsuario()->getUsuario(), $contenido_correo);
            $contenido_correo = str_replace("%RENTA%", $Propiedad->getMoneda()->getCodigo() . " " . number_format($COMISION_VENTA, 0), $contenido_correo);
            $contenido_correo = str_replace("%LINK%", $link, $contenido_correo);
            $CorreoPendienteProp = new CorreoPendiente();
            $CorreoPendienteProp->setEnviado(false);
            $CorreoPendienteProp->setBeneficiario($Propiedad->getUsuario()->getEmail());
            $CorreoPendienteProp->setAsunto($asunto);
            $CorreoPendienteProp->setContenido($contenido_correo);
            $CorreoPendienteProp->save();
        }
    }

    public static function texto_correo() {
        $string = '<html>
    <body>
    <center>
        <div style="width:60%;background-color:#274C92;">
            <h1 style="color:white;">
                <b>BEX</b>
            </h1>
        </div>
        <div style="width:60%;color:#6085C6;">
            <b style="font-size:15pt;">
                Hola %USUARIO%
            </b>
        </div>
        <div style="width:60%;">
            <br/>
            <b>
                Tienes un nuevo negocio disponible con una rentabilidad de %RENTA%
            </b>
            <br/>
        </div>
        <br/>
        <div style="width:50%;background-color:#274C90;height: 5%;">
            <a href="%LINK%">
                <b style=" color:white;">
                    VER NEGOCIO
                </b>
            </a>
        </div>
    </center>
</body>
</html>';
        return $string;
    }

}
