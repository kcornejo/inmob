<?php

class Propiedad extends BasePropiedad {

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

    public function getDireccionCompleta() {
        $listado = array();
        $listado[] = trim($this->getZona()) ? "Zona: " . trim($this->getZona()) : null;
        $listado[] = trim($this->getCarretera()) ? "Carretera: " . trim($this->getCarretera()) : null;
        $listado[] = trim($this->getKm()) ? "Km: " . trim($this->getKm()) : null;
        $listado[] = trim($this->getMunicipio()) ? "Municipio: " . trim($this->getMunicipio()) : null;
        $listado[] = trim($this->getDepartamento()) ? "Departamento: " . trim($this->getDepartamento()) : null;
        $listado[] = trim($this->getDireccion()) ? "Dirección: " . trim($this->getDireccion()) : null;
        $listado  = array_filter($listado);
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
