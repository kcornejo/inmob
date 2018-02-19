<?php

class TasaCambio extends BaseTasaCambio {

    public function save(\PropelPDO $con = null) {
        sfContext::getInstance()->getUser()->setAttribute('filtro', false, "Propiedad");
        $Propiedades = PropiedadQuery::create()
                ->find();
        foreach ($Propiedades as $fila) {
            Negocio::buscaRequerimiento($fila);
        }
        parent::save($con);
    }

}
