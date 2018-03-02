<?php

/**
 * configuracion actions.
 *
 * @package    plan
 * @subpackage configuracion
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class configuracionActions extends sfActions
{

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {


    }

    public function executeEditar(sfWebRequest $request)
    {
        $tipo = $request->getParameter("tipo");
        if ($tipo != "Principal") {
            $objeto = FormatoCorreoQuery::create()
                ->filterByTipo($tipo)
                ->findOne();
        } else {
            $objeto = FormatoInicialQuery::create()
                ->findOne();
        }
        $defaults = array();
        if ($objeto) {
            $defaults["Formato"] = $objeto->getContenido();
        }
        $comodines = array();
        $this->form = new FormatoForm($defaults);
        if ($request->isMethod('POST')) {
            $this->form->bind($request->getParameter("formato"));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
                if (!$objeto) {
                    if ($tipo != "Principal") {
                        $objeto = new FormatoCorreo();
                        $objeto->setTipo($tipo);
                    } else {
                        $objeto = new FormatoInicial();
                    }
                }
                $objeto->setContenido($valores["Formato"]);
                $objeto->save();
                $this->redirect("configuracion/index");
            }
        }
        $this->objeto = $objeto;
        $this->tipo = $tipo;
        $this->comodines = FormatoCorreo::comodines($tipo);
    }

}
