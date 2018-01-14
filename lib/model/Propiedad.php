<?php

class Propiedad extends BasePropiedad {

    public function save(\PropelPDO $con = null) {
        Negocio::buscaRequerimiento($this);
        parent::save($con);
    }

    public function delete(\PropelPDO $con = null) {
        NegocioQuery::create()
                ->filterByPropiedadId($this->id)
                ->find()
                ->delete();
        parent::delete($con);
    }

}
