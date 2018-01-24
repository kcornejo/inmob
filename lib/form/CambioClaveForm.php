<?php

class CambioClaveForm extends sfForm {

    public function configure() {
        $this->setWidget("clave", new sfWidgetFormInputPassword());
        $this->setWidget("clave_2", new sfWidgetFormInputPassword());
        $this->setValidator("clave", new sfValidatorString(array('required' => true)));
        $this->setValidator("clave_2", new sfValidatorString(array('required' => true)));
        $this->widgetSchema->setNameFormat("cambio_clave[%s]");
    }

}
