<?php

class RegistroForm extends sfForm {

    public function configure() {
        $perfiles = array();
        $perfiles[""] = "[Seleccione el Perfil]";
        $PerfilDb = PerfilQuery::create()->find();
        foreach ($PerfilDb as $fila) {
            if ($fila->getDescripcion() <> "Administrador") {
                $perfiles[$fila->getId()] = $fila->getDescripcion();
            }
        }
        $this->setWidget("perfil", new sfWidgetFormChoice(array("choices" => $perfiles), array('class' => "form-control form-white username")));
        $this->setWidget("numero_telefono", new sfWidgetFormInputText(array(), array('class' => "form-control form-white username", "min" => "8", "max" => "8", 'placeholder' => "Ingrese el numero telefonico")));
        $this->setWidget("usuario", new sfWidgetFormInputText(array(), array('class' => "form-control form-white username", 'placeholder' => "Ingrese su nombre de usuario")));
        $this->setWidget("correo", new sfWidgetFormInputText(array(), array('class' => "form-control form-white username", 'placeholder' => "Ingrese su correo electronico")));
        $this->setWidget("contrasenia", new sfWidgetFormInputPassword(array(), array('class' => "form-control form-white username", 'placeholder' => "Ingrese su clave")));
        $this->setWidget("contrasenia_2", new sfWidgetFormInputPassword(array(), array('class' => "form-control form-white username", 'placeholder' => "Repita su clave")));
        $this->setValidator("perfil", new sfValidatorString(array('required' => true)));
        $this->setValidator("numero_telefono", new sfValidatorString(array('required' => true, 'max_length' => "8", "min_length" => "8")));
        $this->setValidator("correo", new sfValidatorString(array('required' => true)));
        $this->setValidator("usuario", new sfValidatorString(array('required' => true)));
        $this->setValidator("contrasenia", new sfValidatorString(array('required' => true)));
        $this->setValidator("contrasenia_2", new sfValidatorString(array('required' => true)));
        $this->validatorSchema->setPostValidator(new sfValidatorCallback(array(
            'callback' => array($this, "valida")
        )));

        $this->widgetSchema->setNameFormat('registro[%s]');
    }

    public function valida(sfValidatorBase $validator, array $values) {

        $contrasenia = $values['contrasenia'];
        $contrasenia1 = $values['contrasenia_2'];
        $numero_telefono = trim($values["numero_telefono"]);
        $perfil = $values['perfil'];
        $email = trim($values['correo']);
        $usuario = trim($values['usuario']);
        if ($contrasenia != $contrasenia1) {
            throw new sfValidatorErrorSchema($validator, array("correo" => new sfValidatorError($validator, "Las claves no coinciden")));
        }
        if (strlen($numero_telefono) != 8) {
            throw new sfValidatorErrorSchema($validator, array("correo" => new sfValidatorError($validator, "El numero de telefono debe de ser de 8 digitos")));
        }
        if (!$perfil) {
            throw new sfValidatorErrorSchema($validator, array("correo" => new sfValidatorError($validator, "Sin Perfil asignado")));
        }
        $Usuario = UsuarioQuery::create()
                ->where("email = '$email' or numero_telefono = '$numero_telefono' or usuario = '$usuario'")
                ->findOne();
        if ($Usuario) {
            throw new sfValidatorErrorSchema($validator, array("correo" => new sfValidatorError($validator, "Usuario ya registrado")));
        }
        return $values;
    }

}
