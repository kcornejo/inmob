<?php

/**
 * seguridad actions.
 *
 * @package    
 * @subpackage seguridad
 * @author     
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */

/**
 * seguridad actions.
 *
 * @package    
 * @subpackage seguridad
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class seguridadActions extends sfActions {

    public function executeToken(sfWebRequest $request) {
        $id = $request->getParameter("id");
        $token = TokenQuery::create()
                ->filterByToken($id)
                ->filterByUtilizado(false)
                ->findOne();
        if ($token) {
            $Usuario = $token->getUsuario();
            $Usuario->setActivo(true);
            $Usuario->save();
            $token->setUtilizado(true);
            $token->save();
            $user = sfContext::getInstance()->getUser();
            $user->setAuthenticated(true);
            $user->setAttribute('usuario', $Usuario->getId(), 'seguridad');
            $user->setAttribute('usuarioNombre', $Usuario->getUsuario(), 'seguridad');
        }
        $this->redirect("inicio/index");
    }

    public function executeLogin(sfWebRequest $request) {
        $this->getUser()->getAttributeHolder()->clear();

        $this->form = new LoginPortalForm();
        $this->form_registro = new RegistroForm();
        if ($request->isMethod('post')) {
            if ($request->hasParameter("btn_registro")) {
                $this->form_registro->bind($request->getParameter("registro"));
                if ($this->form_registro->isValid()) {
                    $con = Propel::getConnection();
                    $con->beginTransaction();
                    $valores = $this->form_registro->getValues();
                    $Usuario = new Usuario();
                    $Usuario->setActivo(false);
                    $Usuario->setUsuario($valores['correo']);
                    $Usuario->setEmail($valores['correo']);
                    $Usuario->setClave($valores['contrasenia']);
                    $Usuario->setPerfilId($valores['perfil']);
                    $Usuario->setNumeroTelefono($valores['numero_telefono']);
                    $Usuario->save();
                    $token = sha1(uniqid() . date("Y-m-d H:i:s"));
                    $Token = new Token();
                    $Token->setUsuarioId($Usuario->getId());
                    $Token->setToken($token);
                    $Token->setUtilizado(false);
                    $Token->save();
                    $link = str_replace("/seguridad/login", "", "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
                    $link = $link . "/seguridad/token?id=" . $token;
                    $Correo = new CorreoPendiente();
                    $Correo->setAsunto("Bienvenido(a)");
                    $Correo->setBeneficiario($valores["correo"]);
                    $Correo->setContenido("<html>Para ingresar a la aplicacion por favor presione <a href='$link'>Aqui</a></html>");
                    $Correo->save();
                    $this->getUser()->setFlash('exito', 'Por favor, revise su correo para continuar con el registro.');
                    $con->commit();
                    $this->redirect("seguridad/login");
                } else {
                    $this->getUser()->setFlash('error_registro', "Error en el Registro");
                }
            } else {
                $this->form->bind($request->getParameter("login"));
                if ($this->form->isValid()) {
                    $user = sfContext::getInstance()->getUser();
                    $user->setAuthenticated(true);
                    $this->redirect("inicio/index");
                }
            }
        }
        if ($this->getUser()->isAuthenticated()) {
            $this->redirect('inicio/index');
        }
    }

    public function executeLogout(sfWebRequest $request) {
        $this->getUser()->getAttributeHolder('seguridad')->removeNamespace('seguridad');
        $this->getUser()->setAuthenticated(false);
        $this->getUser()->clearCredentials();
        $this->redirect("inicio/index");
    }

    public function executeCambioclave(sfWebRequest $request) {
        $this->form = new CambioClaveForm();
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter('cambio_clave'));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
                $usuario_id = $this->getUser()->getAttribute('usuario', null, 'seguridad');
                $Usuario = UsuarioQuery::create()->findOneById($usuario_id);
                $Usuario->setClave(sha1($valores['clave']));
                $Usuario->save();
                $this->getUser()->setFlash('exito', 'Cambio de Clave Efectuado Exitosamente');
                $this->redirect("inicio/index");
            }
        }
    }

    public function executeRegistrar(sfWebRequest $request) {
        $this->form = new RegistrarForm();
        if ($request->isMethod('POST')) {
            $this->form->bind($request->getParameter('registro_usuario'));
            if ($this->form->isValid()) {
                $url = ParametroPeer::obtenerValor('url');
                $valores = $this->form->getValues();
                $con = Propel::getConnection();
                $con->beginTransaction();
                $Usuario = new Usuario();
                $Usuario->setClave(sha1($valores['Clave']));
                $Usuario->setCorreo($valores['Correo']);
                $Usuario->setUsuario($valores['Usuario']);
                $Usuario->setAdministrador(false);
                $Usuario->setValidado(false);
                $Usuario->save();
                $Token = new TokenUsuario();
                $Token->setUsuarioId($Usuario->getId());
                $Token->setClave(sha1($Usuario->getId() . date('YmdHis')));
                $Token->setTipo('Registro');
                $Token->save();
                $formato = FormatoCorreoQuery::create()->findOneByTipo('Token');
                if ($formato) {
                    $Correo = new Correo();
                    $Correo->setReceptor($valores['Correo']);
                    $Correo->setAsunto('Nuevo Registro');
                    $datos = array('url' => $url, 'token' => $Token->getClave());
                    $contenido = $formato->getFormatoPlano($datos);
                    $Correo->setContenido($contenido);
                    $Correo->save();
                }
                $con->commit();
                $this->getUser()->setFlash('exito', 'Usuario creado correctamente');
                $this->redirect('seguridad/login');
            }
        }
    }

    public function executeValidaToken(sfWebRequest $request) {
        $token = $request->getParameter('token');
        $fecha = new DateTime(date('Y-m-d H:i:s'));
        $fechaMaxima = $fecha->modify('+1 day')->format('Y-m-d H:i:s');
        $TokenQuery = TokenUsuarioQuery::create()
                ->filterByClave($token)
                ->filterByTipo('Registro')
                ->where("created_at <= '$fechaMaxima'")
                ->findOne();
        if ($TokenQuery) {
            $valido = $TokenQuery->getUsuario();
            $valido->setValidado(true);
            $valido->save();
            $user = sfContext::getInstance()->getUser();
            $user->setAuthenticated(true);
            $user->setAttribute('administrador', $valido->getAdministrador(), 'seguridad');
            $user->setAttribute('usuario', $valido->getId(), 'seguridad');
            sfContext::getInstance()->getUser()->setAttribute('usuario', $valido->getId(), 'seguridad');
            $user->setAttribute('usuarioNombre', $valido->getUsuario(), 'seguridad');
            UsuarioQuery::menuUsuario($valido->getId());
            sfContext::getInstance()->getUser()->setFlash('exito', 'Bienvenido por primera vez a Kunes!');
            $this->redirect('inicio/index');
        } else {
            sfContext::getInstance()->getUser()->setAttribute('mensaje', 'Token inexistente', 'error');
        }
        $this->redirect('seguridad/login');
    }

    public function executeRecuperaclave(sfWebRequest $request) {
        $this->form = new RecuperaclaveForm();
        if ($request->isMethod('POST')) {
            $this->form->bind($request->getParameter('recupera_clave'));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
                $Usuario = UsuarioQuery::create()
                        ->filterByCorreo($valores['Correo'])
                        ->findOne();
                if ($Usuario) {
                    $Token = TokenUsuarioQuery::create()
                            ->filterByUsuarioId($Usuario->getId())
                            ->filterByUtilizado(false)
                            ->filterByTipo('Recuperacion')
                            ->findOne();
                    if (!$Token) {
                        $Token = new TokenUsuario();
                        $Token->setUsuarioId($Usuario->getId());
                        $Token->setClave(sha1($Usuario->getId() . date('YmdHis')));
                        $Token->setTipo('Recuperacion');
                        $Token->save();
                    }
                    $formato = FormatoCorreoQuery::create()->findOneByTipo('Recuperacion');
                    if ($formato) {
                        $url = ParametroPeer::obtenerValor('url');
                        $Correo = new Correo();
                        $Correo->setReceptor($valores['Correo']);
                        $Correo->setAsunto('Recuperacion de clave');
                        $datos = array('url' => $url, 'token' => $Token->getClave());
                        $contenido = $formato->getFormatoPlano($datos);
                        $Correo->setContenido($contenido);
                        $Correo->save();
                    }
                    $this->getUser()->setFlash('exito', 'Correo de recuperacion enviado correctamente');
                    $this->redirect('seguridad/login');
                } else {
                    $this->getUser()->setFlash('error', 'Correo ingresado no registrado');
                }
            }
        }
    }

    public function executeRecupera(sfWebRequest $request) {
        $token_consulta = $request->getParameter('token');
        $Token = TokenUsuarioQuery::create()
                ->filterByClave($token_consulta)
                ->filterByTipo('Recuperacion')
                ->filterByUtilizado(false)
                ->findOne();
        if ($Token) {
            $this->form = new CambioClaveForm();
            if ($request->isMethod('POST')) {
                $this->form->bind($request->getParameter('cambio_clave'));
                if ($this->form->isValid()) {
                    $valores = $this->form->getValues();
                    $Token->setUtilizado(true);
                    $Token->save();
                    $Usuario = $Token->getUsuario();
                    $Usuario->setClave(sha1($valores['Clave']));
                    $Usuario->save();
                    $this->redirect('seguridad/login');
                } else {
                    $this->getUser()->setFlash('error', 'Password Invalido');
                }
            }
        } else {
            $this->getUser()->setFlash('error', 'Token inexistente');
            $this->redirect('seguridad/login');
        }
        $this->token = $token_consulta;
    }

}
