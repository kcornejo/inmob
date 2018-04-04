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

    public function executeCorreoNegocio(sfWebRequest $request) {
        
    }

    public function executeBanco(sfWebRequest $request) {
        $respuesta = array();
        $valor = $request->getParameter("valor");
        $Banco = BancoQuery::create()->findOneById($valor);
        if ($Banco) {
            $respuesta['seguro_banco'] = $Banco->getSeguroBanco() / 100;
            $respuesta['relacion_cuota_interes'] = $Banco->getRelacionCuotaInteres() / 100;
            $respuesta['factor_construccion'] = $Banco->getFactorConstruccion() / 100;
        }
        return $this->renderText(json_encode($respuesta));
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
        $this->redirect($request->getReferer());
    }

    public function executeEstatusRequerimiento(sfWebRequest $request) {
        $id = $request->getParameter("id");
        $valor = $request->getParameter("valor");
        $Requerimiento = RequerimientoQuery::create()->findOneById($id);
        $Requerimiento->setEstatus($valor);
        $Requerimiento->save();
        $this->redirect($request->getReferer());
    }

    public function executeMensaje(sfWebRequest $request) {
        $negocio_id = $request->getParameter("negocio_id");
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $mensaje = $request->getParameter("mensaje");
        $Mensaje = new MensajeNegocio();
        $Mensaje->setMensaje($mensaje);
        $Mensaje->setUsuarioId($usuario_id);
        $Mensaje->setNegocioId($negocio_id);
        $Mensaje->save();
        $Negocio = NegocioQuery::create()->findOneById($negocio_id);
        $correo_envio = null;
        if ($Negocio->getUsuarioProp() == $usuario_id) {
            $correo_envio = $Negocio->getUsuarioRelatedByUsuarioReq()->getEmail();
        } else {
            $correo_envio = $Negocio->getUsuarioRelatedByUsuarioProp()->getEmail();
        }
        $Usuario = UsuarioQuery::create()->findOneById($usuario_id);
        $CorreoPendienteReq = new CorreoPendiente();
        $CorreoPendienteReq->setEnviado(false);
        $CorreoPendienteReq->setBeneficiario($correo_envio);
        $CorreoPendienteReq->setAsunto("Conversacion con " . $Usuario->getNombreCompleto());
        $CorreoPendienteReq->setContenido($mensaje);
        $CorreoPendienteReq->save();
        return $this->renderText("");
    }

    public function executeListadoMensaje(sfWebRequest $request) {
        $negocio_id = $request->getParameter("negocio_id");
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $Negocio = NegocioQuery::create()->findOneById($negocio_id);
        $this->negocio = $Negocio;
        $this->usuario_id = $usuario_id;
    }

    public function executeAviso(sfWebRequest $request) {
        $negocio_id = $request->getParameter("negocio_id");
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $MensajeNegocio = MensajeNegocioQuery::create()
                ->where("negocio_id = $negocio_id and usuario_id <> $usuario_id")
                ->find();
        foreach ($MensajeNegocio as $fila) {
            $fila->setVisto(true);
            $fila->save();
        }
        die();
    }

}
