<?php

/**
 * vender actions.
 *
 * @package    plan
 * @subpackage vender
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class venderActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeNueva(sfWebRequest $request) {
        $defaults = array();
        $defaults["habitacion"] = "0";
        $defaults["banio"] = "0";
        $defaults["parqueo"] = "0";
        $defaults["comedor"] = "0";
        $defaults["sala"] = "0";
        $defaults["cocina"] = "0";
        $defaults["jardin"] = "0";
        $defaults["patio"] = "0";
        $this->formulario_vender = new VenderForm($defaults);
        if ($request->isMethod('POST')) {
            $this->formulario_vender->bind($request->getParameter("vender_form"));
            if ($this->formulario_vender->isValid()) {
                $valores = $this->formulario_vender->getValues();
                die();
            }
        }
    }

}
