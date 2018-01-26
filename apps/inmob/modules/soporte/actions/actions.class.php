<?php

/**
 * soporte actions.
 *
 * @package    plan
 * @subpackage soporte
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class soporteActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->forward('default', 'module');
    }

    public function executeDepartamento(sfWebRequest $request) {
        $valor = $request->getParameter("valor");
        $Municipio = MunicipioQuery::create()->findByDepartamentoId($valor);
        $retorno = array();
        foreach ($Municipio as $fila) {
            $retorno[$fila->getId()] = $fila->getDescripcion();
        }
        return $this->renderText(json_encode($retorno));
    }

    public function executeEstatusPropiedad(sfWebRequest $request) {
        $id = $request->getParameter("id");
        $valor = $request->getParameter("valor");
        $Propiedad = PropiedadQuery::create()->findOneById($id);
        $Propiedad->setEstatus($valor);
        $Propiedad->save();
        die();
    }

    public function executeEstatusRequerimiento(sfWebRequest $request) {
        $id = $request->getParameter("id");
        $valor = $request->getParameter("valor");
        $Requerimiento = RequerimientoQuery::create()->findOneById($id);
        $Requerimiento->setEstatus($valor);
        $Requerimiento->save();
        die();
    }

}
