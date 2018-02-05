<?php

class CambioClaveForm extends sfForm {

    public function configure() {
        $this->setWidget("clave", new sfWidgetFormInputPassword(array(), array('class' => 'form-control', 'placeholder' => "Ingrese su clave")));
        $this->setWidget("clave_2", new sfWidgetFormInputPassword(array(), array('class' => 'form-control', 'placeholder' => "Repita su clave")));
        $this->setValidator("clave", new sfValidatorString(array('required' => true)));
        $this->setValidator("clave_2", new sfValidatorString(array('required' => true)));
        $this->validatorSchema->setPostValidator(new sfValidatorCallback(array(
            'callback' => array($this, "validaUsuario")
        )));
        $this->widgetSchema->setNameFormat("cambio_clave[%s]");
    }

    public function validaUsuario(sfValidatorBase $validator, array $values) {
        $clave = $values["clave"];
        $clave_2 = $values["clave_2"];
        if ($clave != $clave_2) {
            throw new sfValidatorErrorSchema($validator, array("clave" => new sfValidatorError($validator, "Las claves no coinciden")));
        }
        return $values;
    }

}
