<?php

class Requerimiento extends BaseRequerimiento {

    public function save(PropelPDO $con = null) {
        Negocio::buscaPropiedad($this);
        parent::save($con);
    }

    public function delete(\PropelPDO $con = null) {
        NegocioQuery::create()
                ->filterByRequerimientoId($this->id)
                ->find()
                ->delete();
        parent::delete($con);
    }

}
