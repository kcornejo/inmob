<?php

class Propiedad extends BasePropiedad {

    public function getVisto() {
        $visto = true;
        foreach ($this->getNegociosDisponibles() as $neg) {
            if (!$neg->getVisto()) {
                $visto = false;
                break;
            }
        }
        return $visto;
    }

    public function save(\PropelPDO $con = null) {
        parent::save($con);
    }

    public function postSave(\PropelPDO $con = null) {
        Negocio::buscaRequerimiento($this);
        parent::postSave($con);
    }

    public function delete(\PropelPDO $con = null) {
        NegocioQuery::create()
                ->filterByPropiedadId($this->id)
                ->find()
                ->delete();
        parent::delete($con);
    }

    public function getMaximaComision() {
        $monto = 'GTQ 0';
        $negocio = NegocioQuery::create()
                ->filterByActivo(true)
                ->filterByPropiedadId($this->getId())
                ->findOne();
        if ($negocio) {
            $monto = "GTQ " . number_format($this->getComision());
        }
        return $monto;
    }

    public function getCantidadMensajesSinLeer() {
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $MensajeNegocio = MensajeNegocioQuery::create()
                ->useNegocioQuery()
                ->filterByPropiedadId($this->getId())
                ->filterByActivo(true)
                ->endUse()
                ->where("usuario_id != $usuario_id and visto = 0")
                ->find();
        return ($MensajeNegocio);
    }

    public function getNegociosDisponibles() {
        $cantidad = NegocioQuery::create()
                ->filterByPropiedadId($this->getId())
                ->filterByActivo(true)
                ->find();
        return ($cantidad);
    }

    public function getComision() {
        $monto = $this->getPrecio() * ($this->getMiComision() / 100);
        $monto = $monto * ((100 - $this->getComisionCompartida()) / 100);
        if ($this->getMoneda()->getCodigo() != 'GTQ') {
            $MonedaQuetzal = MonedaQuery::create()->findOneBySimbolo('GTQ');
            if ($MonedaQuetzal) {
                $TasaCambio = TasaCambioQuery::create()
                        ->filterByMonedaOrigen($this->getMonedaId())
                        ->filterByMonedaDestino($MonedaQuetzal->getId())
                        ->findOne();
                if ($TasaCambio) {
                    $monto *= $TasaCambio->getMonto();
                }
            }
        }
        return $monto;
    }

    public function getDireccionCompleta() {
        $listado = array();
        $listado[] = trim($this->getZona()) ? "Zona: " . trim($this->getZona()) : null;
        $listado[] = trim($this->getCarretera()) ? "Carretera: " . trim($this->getCarretera()) : null;
        $listado[] = trim($this->getKm()) ? "Km: " . trim($this->getKm()) : null;
        $listado[] = trim($this->getMunicipio()) ? "Muni: " . trim($this->getMunicipio()) : null;
        $listado[] = trim($this->getDepartamento()) ? "Depto: " . trim($this->getDepartamento()) : null;
        $listado[] = trim($this->getDireccion()) ? "Dirección: " . trim($this->getDireccion()) : null;
        $listado = array_filter($listado);
        return implode(", ", $listado);
    }

    public function getComunidad() {
        $valor = $this->getSeguridad() + $this->getAccesos() + $this->getAgua() + $this->getTransportePublico() + $this->getTransitoVehicular() + $this->getComunidadesColidantes() + $this->getAreasRecreacion();
        $valor = $valor / 7;
        return round($valor, 0);
    }

    public function getDireccionImagen() {
        $valor = "/assets/img/caracteristicas/";
        $conc = null;
        switch ($this->getTipoInmueble()) {
            case "Casa":
                $conc = "casa.png";
                break;
            case "Apartamento":
                $conc = "apartamento.png";
                break;
            case "Terreno":
                $conc = "terreno.png";
                break;
            case "Oficinas":
                $conc = "oficinas.png";
                break;
            case "Local":
                $conc = "locales.png";
                break;
            case "Edificio":
                $conc = "edificio.png";
                break;
            case "Bodega":
                $conc = "terreno.png";
                break;
        }
        return $valor . $conc;
    }

}
