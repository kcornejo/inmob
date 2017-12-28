<?php

/**
 * inicio actions.
 *
 * @package    plan
 * @subpackage inicio
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class inicioActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
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
    }

    public function executePrincipal(sfWebRequest $request) {
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $Usuario = UsuarioQuery::create()->findOneById($usuario_id);
        $this->archivos = ArchivoQuery::create()
                ->useMateriaQuery()
                ->useUsuarioMateriaQuery()
                ->filterByUsuarioId($usuario_id)
                ->useUsuarioQuery()
                ->filterByUniversidadId($Usuario->getUniversidadId())
                ->endUse()
                ->endUse()
                ->endUse()
                ->limit(15)
                ->orderById('desc')
                ->find();
    }

    public function executeActualizaciones(sfWebRequest $request) {
        $this->archivos = ArchivoQuery::create()
                ->where("estado = 'Verificado'")
                ->orderById('DESC')
                ->limit(5)
                ->find();
    }

    public function executeUsuarios(sfWebRequest $request) {
        $this->usuarios = UsuarioQuery::create()
                ->limit(5)
                ->find();
    }

}
