<?php

class TasaCambio extends BaseTasaCambio {

    public function save(\PropelPDO $con = null) {
        $Propiedades = PropiedadQuery::create()
                ->find();
        foreach ($Propiedades as $fila) {
            Negocio::buscaRequerimiento($fila);
        }
        parent::save($con);
    }

}
