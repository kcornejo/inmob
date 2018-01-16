<?php

require_once dirname(__FILE__) . '/../lib/usuarioGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/usuarioGeneratorHelper.class.php';

/**
 * usuario actions.
 *
 * @package    plan
 * @subpackage usuario
 * @author     Via
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class usuarioActions extends autoUsuarioActions {

    public function executeDetalle(sfWebRequest $request) {
        
    }

    public function executePerfil(sfWebRequest $request) {
        $idUsuario = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $Usuario = UsuarioQuery::create()->findOneById($idUsuario);
        $defecto['Tema'] = $Usuario->getTema();
        $defecto['Frase'] = $Usuario->getFrase();
        $defecto['Genero'] = $Usuario->getGenero();
        if ($Usuario->getFechaNacimiento()) {
            $defecto['Fecha_Nacimiento'] = $Usuario->getFechaNacimiento();
        } else {
            $defecto['Fecha_Nacimiento'] = '1990-01-01';
        }
        $this->form = new PerfilForm($defecto);
        if ($request->isMethod('POST')) {
            $this->form->bind($request->getParameter('perfil'), $request->getFiles('perfil'));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
                $archivo = $valores['Archivo'];

                if ($archivo) {
                    $carpeta = sfConfig::get('sf_upload_dir') . '/imagen_perfil';
                    mkdir($carpeta);
                    chmod($carpeta, 0777);
                    $nombreNuevo = sha1($idUsuario);
                    $archivo_guardar = sfConfig::get('sf_upload_dir') . '/imagen_perfil/' . $nombreNuevo . $archivo->getExtension();
                    $archivo->save($archivo_guardar);
                    $archivo_referencia = '/uploads/imagen_perfil/' . $nombreNuevo . $archivo->getExtension();
                    sfContext::getInstance()->getUser()->setAttribute('usuario', $archivo_referencia, 'imagen');
                    $Usuario->setImagen($archivo_referencia);
                }
                $nombreUsuario = $valores['Nombre'];
                if ($nombreUsuario) {
                    $Usuario->setUsuario($nombreUsuario);
                    sfContext::getInstance()->getUser()->setAttribute('usuarioNombre', $nombreUsuario, 'seguridad');
                }
                $tema = $valores['Tema'];
                if ($tema) {
                    $Usuario->setTema($tema);
                }
                $Usuario->setFrase($valores['Frase']);
                $Usuario->setGenero($valores['Genero']);
                $Usuario->setFechaNacimiento($valores['Fecha_Nacimiento']);
                $Usuario->save();
                $this->getUser()->setFlash('exito', 'Perfil ajustado correctamente');
                $this->redirect("usuario/visualizar?id=$idUsuario");
            }
        }
    }

    public function executeVisualizar(sfWebRequest $request) {
        $id = $request->getParameter('id');
        $this->usuario = UsuarioQuery::create()->findOneById($id);
    }

    public function executeUniversidad(sfWebRequest $request) {
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $Usuario = UsuarioQuery::create()
                ->findOneById($usuario_id);
        $defaults = array();
        $defaults['Universidad'] = $Usuario->getUniversidadId();
        $defaults['Carrera'] = $Usuario->getCarreraId();
        $materias = array();
        foreach ($Usuario->getUsuarioMaterias() as $materia) {
            $materias[] = $materia->getMateriaId();
        }
        $defaults['Materia'] = $materias;
        $this->form = new UniversidadUsuarioForm($defaults);
        if ($request->isMethod('POST')) {
            $this->form->bind($request->getParameter('universidad_usuario'));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();

                $Usuario->setUniversidadId($valores['Universidad']);
                $Usuario->setCarreraId($valores['Carrera']);
                $Usuario->save();
                UsuarioMateriaQuery::create()->findByUsuarioId($usuario_id)->delete();
                foreach ($valores['Materia'] as $id_materia) {
                    $UsuarioMateria = new UsuarioMateria();
                    $UsuarioMateria->setUsuarioId($usuario_id);
                    $UsuarioMateria->setMateriaId($id_materia);
                    $UsuarioMateria->save();
                }
                $this->getUser()->setFlash('exito', 'Ajustes realizados correctamente');
                $this->redirect("usuario/visualizar?id=$usuario_id");
            }
        }
    }

}
