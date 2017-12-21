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

    public function executeAvisos(sfWebRequest $request) {
        
    }

    public function executeNotificacionAjax(sfWebRequest $request) {
        $this->archivos = ArchivoQuery::create()
                ->where("estado = 'Pendiente' or estado is null")
                ->find();
    }

    public function executeNotificacionAjaxContador(sfWebRequest $request) {
        return $this->renderText(ArchivoQuery::create()->where("estado = 'Pendiente' or estado is null")->find()->count());
        throw new sfStopException();
    }

    public function executeAutocompletar(sfWebRequest $request) {
        $busqueda = $request->getParameter('busqueda');
        if (strlen($busqueda) > 2) {
            $this->archivos = ArchivoQuery::create()
                    ->filterByDescripcion("%$busqueda%")
                    ->where("descripcion like '%$busqueda%' or nombre_archivo_original like '%$busqueda%'")
                    ->limit(3)
                    ->find();
            $this->usuarios = UsuarioQuery::create()
                    ->filterByUsuario("%$busqueda%")
                    ->limit(3)
                    ->find();
        } else {
            $this->archivos = array();
            $this->usuarios = array();
        }
    }

    public function executeMensajeAjax(sfWebRequest $request) {
        $listadoMensaje = array();
        if (sfContext::getInstance()->getUser()->getAttribute("error_ajax")) {
            $listadoMensaje[] = array('tipo' => 'error', 'mensaje' => sfContext::getInstance()->getUser()->getAttribute("error_ajax"));
            $this->getUser()->setAttribute('error_ajax', false);
        }
        if (sfContext::getInstance()->getUser()->getAttribute("exito_ajax")) {
            $listadoMensaje[] = array('tipo' => 'exito', 'mensaje' => sfContext::getInstance()->getUser()->getAttribute("exito_ajax"));
            $this->getUser()->setAttribute('exito_ajax', false);
        }
        return $this->renderText(json_encode($listadoMensaje));
    }

    public function executeBusqueda(sfWebRequest $request) {
        $usuarios = array();
        $materias = array();
        $archivos = array();
        $this->form = new BusquedaAvanzadaForm();
        if ($request->isMethod('POST')) {
            $this->form->bind($request->getParameter('busqueda_avanzada'));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
                $busqueda = $valores["Valor"];
                switch ($valores["Tipo"]) {
                    case "Usuario":
                        $usuarios = UsuarioQuery::create()
                                ->filterByUsuario("%$busqueda%")
                                ->limit(25)
                                ->find();
                        break;
                    case "Archivo":
                        $archivos = ArchivoQuery::create()
                                ->where("nombre_archivo_original like '%$busqueda%' or nombre_archivo_actual like '%$busqueda%' or descripcion like '%$busqueda%'")
                                ->limit(25)
                                ->find();
                        break;
                }
            }
        }
        $this->usuarios = $usuarios;
        $this->materias = $materias;
        $this->archivos = $archivos;
    }

    public function executeCambiarPerfil() {
        $administrador = sfContext::getInstance()->getUser()->getAttribute('administrador', null, 'seguridad');
        if ($administrador) {
            sfContext::getInstance()->getUser()->setAttribute('administrador', false, 'seguridad');
        } else {
            sfContext::getInstance()->getUser()->setAttribute('administrador', true, 'seguridad');
        }
        $previousUrl = sfContext::getInstance()->getRequest()->getReferer();
        $this->redirect($previousUrl);
    }

}
