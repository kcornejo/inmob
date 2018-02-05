<?php

class CambioClaveForm extends sfForm {

    public function configure() {
        $this->setWidget("clave", new sfWidgetFormInputPassword(array(), array('class' => 'form-control')));
        $this->setWidget("clave_2", new sfWidgetFormInputPassword(array(), array('class' => 'form-control')));
        $this->setValidator("clave", new sfValidatorString(array('required' => true)));
        $this->setValidator("clave_2", new sfValidatorString(array('required' => true)));
        $this->widgetSchema->setNameFormat("cambio_clave[%s]");
    }

}
