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
        $negocios = NegocioQuery::create()
                ->where("usuario_req = $usuario_id or usuario_prop = $usuario_id")
                ->find();
        $requerimiento_compra = new PropelArrayCollection();
        $requerimiento_renta = new PropelArrayCollection();
        $propiedad_venta = new PropelArrayCollection();
        $propiedad_renta = new PropelArrayCollection();
        foreach ($negocios as $fila) {
            if ($fila->getUsuarioReq() == $usuario_id) {
                //Guarda en propiedad
                if ($fila->getPropiedad()->getTipoOperacion() == "Vender") {
                    $propiedad_venta[] = $fila;
                } else {
                    $propiedad_renta[] = $fila;
                }
            }
            if ($fila->getUsuarioProp() == $usuario_id) {
                if ($fila->getRequerimiento()->getTipoOperacion() == "Comprar") {
                    $requerimiento_compra[] = $fila;
                } else {
                    $requerimiento_renta[] = $fila;
                }
            }
        }
        $this->requerimiento_compra = $requerimiento_compra;
        $this->requerimiento_renta = $requerimiento_renta;
        $this->propiedad_venta = $propiedad_venta;
        $this->propiedad_renta = $propiedad_renta;
    }

    public function executeVisualizar(sfWebRequest $request) {
        $id = $request->getParameter("id");
        $Negocio = NegocioQuery::create()->findOneById($id);
        $this->negocio = $Negocio;
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $this->usuario_id = $usuario_id;
    }

}
