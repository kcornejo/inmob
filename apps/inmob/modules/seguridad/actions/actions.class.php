<?php

class seguridadActions extends sfActions {

    public function executeToken(sfWebRequest $request) {
        $id = $request->getParameter("id");
        $token = TokenQuery::create()
                ->filterByToken($id)
                ->filterByUtilizado(false)
                ->filterByTipo("Registro")
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
        if (sfContext::getInstance()->getUser()->isAuthenticated()) {
            $this->redirect("inicio/index");
        }
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
                    $Usuario->setUsuario($valores['usuario']);
                    $Usuario->setClave($valores['contrasenia']);
                    $Usuario->setPerfilId($valores['perfil']);
                    $Usuario->setNumeroTelefono($valores['numero_telefono']);
                    $Usuario->save();
                    $token = sha1(uniqid() . date("Y-m-d H:i:s"));
                    $Token = new Token();
                    $Token->setUsuarioId($Usuario->getId());
                    $Token->setToken($token);
                    $Token->setUtilizado(false);
                    $Token->setTipo("Registro");
                    $Token->save();
                    $link = str_replace("/seguridad/login", "", "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
                    $link = $link . "/seguridad/token?id=" . $token;
                    $Correo = new CorreoPendiente();
                    $Correo->setAsunto("Bienvenido(a)");
                    $Correo->setBeneficiario($valores["correo"]);
                    $comodin = array();
                    $comodin["%USUARIO%"] = $Usuario->getUsuario();
                    $comodin["%FECHA%"] = date("d/m/Y");
                    $comodin["%TELEFONO%"] = $Usuario->getNumeroTelefono();
                    $comodin["%LINK%"] = $link;
                    $Correo->setContenido(FormatoCorreo::getFormato("Registro", $comodin));
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
                    if (strpos(sfContext::getInstance()->getRequest()->getReferer(), 'negocio') !== false) {
                        $this->redirect(sfContext::getInstance()->getRequest()->getReferer(), 'negocio');
                    } else {
                        $this->redirect("inicio/index");
                    }
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
                $this->redirect("vender/index");
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
                        ->filterByEmail($valores['Correo'])
                        ->findOne();
                if ($Usuario) {
                    $Token = TokenQuery::create()
                            ->filterByUsuarioId($Usuario->getId())
                            ->filterByUtilizado(false)
                            ->filterByTipo('Recuperacion')
                            ->findOne();
                    if (!$Token) {
                        $Token = new Token();
                        $Token->setUsuarioId($Usuario->getId());
                        $Token->setToken(sha1($Usuario->getId() . date('YmdHis')));
                        $Token->setTipo('Recuperacion');
                        $Token->save();
                    }
                    $link = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                    $link = explode("/seguridad", $link);
                    $link = $link[0];
                    $link = $link . "/seguridad/recupera?token=" . $Token->getToken();
                    $link = "<a href='$link'>AQUI</a>";
                    $Correo = new CorreoPendiente();
                    $Correo->setAsunto("Recuperacion de clave");
                    $Correo->setBeneficiario($valores['Correo']);
                    $Correo->setEnviado(false);
                    $comodin = array();
                    $comodin["%USUARIO%"] = $Usuario->getUsuario();
                    $comodin["%FECHA%"] = date("d/m/Y");
                    $comodin["%TELEFONO%"] = $Usuario->getNumeroTelefono();
                    $comodin["%LINK%"] = $link;
                    $Correo->setContenido(FormatoCorreo::getFormato("Clave", $comodin));
                    $Correo->save();
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
        $Token = TokenQuery::create()
                ->filterByToken($token_consulta)
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
                    $Usuario->setClave(sha1($valores['clave']));
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
