<?php

class Requerimiento extends BaseRequerimiento {

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

    public function save(PropelPDO $con = null) {
        parent::save($con);
    }

    public function postSave(\PropelPDO $con = null) {
        Negocio::buscaPropiedad($this);
        parent::postSave($con);
    }

    public function delete(\PropelPDO $con = null) {
        NegocioQuery::create()
                ->filterByRequerimientoId($this->id)
                ->find()
                ->delete();
        parent::delete($con);
    }

    public function getMaximaComision() {
        $monto = "GTQ 0";
        $Negocio = NegocioQuery::create()
                ->filterByRequerimientoId($this->getId())
                ->filterByActivo(true)
                ->findOne();
        if ($Negocio) {
            $monto = $Negocio->getMaximaComision();
        }
        return $monto;
    }

    public function getCantidadMensajesSinLeer() {
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $MensajeNegocio = MensajeNegocioQuery::create()
                ->useNegocioQuery()
                ->filterByRequerimientoId($this->getId())
                ->filterByActivo(true)
                ->endUse()
                ->where("usuario_id != $usuario_id and visto = 0")
                ->find();
        return ($MensajeNegocio);
    }

    public function getNegociosDisponibles() {
        $cantidad = NegocioQuery::create()
                ->filterByRequerimientoId($this->getId())
                ->filterByActivo(true)
                ->find();
        return ($cantidad);
    }

    public function getDireccionCompleta() {
        $listado = array();
        foreach ($this->getDireccionRequerimientos() as $dir) {
            $listado[] = trim($dir->getZona()) ? "Zona: " . trim($dir->getZona()) : null;
            $listado[] = trim($dir->getCarretera()) ? "Carretera: " . trim($dir->getCarretera()) : null;
            $listado[] = trim($dir->getKm()) ? "Km: " . trim($dir->getKm()) : null;
            $listado[] = trim($dir->getMunicipio()) ? "Muni: " . trim($dir->getMunicipio()) : null;
            $listado[] = trim($dir->getDepartamento()) ? "Dpto: " . trim($dir->getDepartamento()) : null;
            $listado[] = trim($dir->getDireccion()) ? "Dirección: " . trim($dir->getDireccion()) : null;
            break;
        }
        $listado = array_filter($listado);
        return implode(", ", $listado);
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
