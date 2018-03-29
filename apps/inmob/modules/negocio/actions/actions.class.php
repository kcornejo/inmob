<?php

/**
 * negocio actions.
 *
 * @package    plan
 * @subpackage negocio
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class negocioActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $this->requerimiento_compra = RequerimientoQuery::create()
                ->filterByUsuarioId($usuario_id)
                ->where("estatus !=  'Eliminado' and tipo_operacion = 'Comprar'")
                ->orderById('DESC')
                ->find();
        $this->requerimiento_renta = RequerimientoQuery::create()
                ->filterByUsuarioId($usuario_id)
                ->where("estatus !=  'Eliminado' and tipo_operacion != 'Comprar'")
                ->orderById('DESC')
                ->find();
        $this->propiedad_venta = PropiedadQuery::create()
                ->filterByUsuarioId($usuario_id)
                ->where("estatus !=  'Eliminado' and tipo_operacion = 'Vender'")
                ->orderById('DESC')
                ->find();
        $this->propiedad_renta = PropiedadQuery::create()
                ->filterByUsuarioId($usuario_id)
                ->where("estatus !=  'Eliminado' and tipo_operacion != 'Vender'")
                ->orderById('DESC')
                ->find();
    }

    public function executeVisualizar(sfWebRequest $request) {
        $id = $request->getParameter("id");
        $Negocio = NegocioQuery::create()->findOneById($id);
        $this->negocio = $Negocio;
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        if ($Negocio->getUsuarioReq() == $usuario_id) {
            $Negocio->setUsuarioReqVisto(true);
        } else {
            $Negocio->setUsuarioPropVisto(true);
        }
        $Negocio->save();
        $this->usuario_id = $usuario_id;
        $this->monedas = MonedaQuery::create()->find();
        $this->bancos = BancoQuery::create()->find();
        $this->mensaje_abrir = $request->getParameter("mensaje");
    }

    public function executeDetalle(sfWebRequest $request) {
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $negocio_id = $request->getParameter("id");
        $Negocio = NegocioQuery::create()->findOneById($negocio_id);
        $registros = array();
        if ($Negocio->getUsuarioReq() == $usuario_id) {
            $registros = NegocioQuery::create()
                    ->filterByPropiedadId($Negocio->getPropiedadId())
                    ->filterByActivo(true)
                    ->find();
        } else {
            $registros = NegocioQuery::create()
                    ->filterByRequerimientoId($Negocio->getRequerimientoId())
                    ->filterByActivo(true)
                    ->find();
        }
        $this->registros = $registros;
        $this->negocio = $Negocio;
        $this->usuario_id = $usuario_id;
    }

}
