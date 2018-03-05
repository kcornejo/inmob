<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class FormatoForm extends sfForm {

    public function configure() {
        $this->setWidget("Formato", new sfWidgetFormTextarea(array(), array('class' => 'ckeditor')));
        $this->setValidator("Formato", new sfValidatorString(array("required" => true)));
        $this->widgetSchema->setNameFormat("formato[%s]");
    }

}
