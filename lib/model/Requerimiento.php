<?php

class Requerimiento extends BaseRequerimiento {

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

}
