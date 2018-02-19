<?php

class RecuperaclaveForm extends sfForm {

    public function configure() {
        $this->setWidget('Correo', new sfWidgetFormInputText(array(), array('class' => 'form-control', 'placeholder' => "Ingrese su correo")));
        $this->setValidator('Correo', new sfValidatorString(array('required' => true)));
        $this->validatorSchema->setPostValidator(new sfValidatorCallback(array(
            'callback' => array($this, "validaUsuario")
        )));
        $this->widgetSchema->setNameFormat('recupera_clave[%s]');
    }

    public function validaUsuario(sfValidatorBase $validator, array $values) {
        $Correo = $values["Correo"];
        $Usuario = UsuarioQuery::create()
                ->filterByEmail($Correo)
                ->findOne();
        if (!$Usuario) {
            throw new sfValidatorErrorSchema($validator, array("Correo" => new sfValidatorError($validator, "Correo no ingresado.")));
        }
        return $values;
    }

}
