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
        $this->propiedades = PropiedadQuery::create()->find();
    }

    public function executeDep(sfWebRequest $request) {
        $url = "https://gist.githubusercontent.com/tian2992/7439705/raw/703b239b487171cc356182149cadb23340561b81/guatemala.json";
        $datos = json_decode(file_get_contents($url), true);
        foreach ($datos as $dep => $fila) {
            $Departamento = DepartamentoQuery::create()->findOneByDescripcion($dep);
            if (!$Departamento) {
                $Departamento = new Departamento();
                $Departamento->setDescripcion($dep);
                $Departamento->save();
            }
            foreach ($fila as $mun) {
                $Municipio = MunicipioQuery::create()
                        ->filterByDepartamentoId($Departamento->getId())
                        ->filterByDescripcion($mun)
                        ->findOne();
                if (!$Municipio) {
                    $Municipio = new Municipio();
                    $Municipio->setDepartamentoId($Departamento->getId());
                    $Municipio->setDescripcion($mun);
                    $Municipio->save();
                }
            }
        }
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
