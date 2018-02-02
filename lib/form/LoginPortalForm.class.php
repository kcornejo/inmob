<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class LoginPortalForm extends sfForm {

    public function configure() {
        $this->setWidgets(array(
            "usuario" => new sfWidgetFormInputText(array("label" => "Usuario",), array("size" => "16",
                "maxlength" => "32",
                "title" => "Ingrese Correo a Validar",
                "class" => "form-control form-white username",
                "placeholder" => "Usuario",
                "autocomplete" => "off",)),
            "clave" => new sfWidgetFormInputPassword(array("label" => "Clave",), array("size" => "16",
                "maxlength" => "32",
                "title" => "Ingrese la Clave del Usuario para su Validación",
                "placeholder" => "Clave",
                "autocomplete" => "off",
                "class" => "form-control form-white password",)),
        ));

        $this->setValidators(array(
            'usuario' => new sfValidatorString(
                    array('min_length' => 1), array("min_length" => "Longitud Mínima 1 Caracteres",)),
            'clave' => new sfValidatorString(
                    array(), array("invalid" => "Campo Obligatorio",))
        ));

        $this->validatorSchema->setPostValidator(new sfValidatorCallback(array(
            'callback' => array($this, "validaUsuario")
        )));

        $this->widgetSchema->setNameFormat('login[%s]');
    }

    public function validaUsuario(sfValidatorBase $validator, array $values) {

        $usuario = $values['usuario'];
        $clave = sha1($values['clave']);
        $user = sfContext::getInstance()->getUser();
        $user->clearCredentials();
        if ($usuario != "" && $values['clave'] != "") {
            $valido = UsuarioQuery::validaUsuario($usuario, $clave);
            $user = sfContext::getInstance()->getUser();
            if ($valido) {
                if ($valido->getActivo()) {
                    $user->setAuthenticated(true);
                    $user->setAttribute('usuario', $valido->getId(), 'seguridad');
                    $user->setAttribute('usuarioNombre', $valido->getUsuario(), 'seguridad');
                } else {
                    throw new sfValidatorErrorSchema($validator, array("usuario" => new sfValidatorError($validator, "Usuario no activo")));
                }
            } else {
                $msg = sfContext::getInstance()->getUser()->getFlash("login");
                $user->setAuthenticated(false);
                $user->getAttributeHolder('seguridad')->removeNamespace('seguridad');
                $user->setFlash('error', 'Ingrese credenciales correctas.');
                throw new sfValidatorErrorSchema($validator, array("usuario" => new sfValidatorError($validator, $msg)));
            }
        }
        return $values;
    }

}
