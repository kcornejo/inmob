<?php

class VenderForm extends sfForm {

    public function configure() {
        $opciones = array("Vender" => "Vender", "Rentar" => "Rentar");
        $opciones_inm = array("Casa" => "Casa", "Apartamento" => "Apartamento", "Terreno" => "Terreno", "Oficinas" => "Oficinas", "Local" => "Local");
        $this->setWidget("tipo_operacion", new sfWidgetFormSelect(array('choices' => $opciones), array()));
        $this->setWidget("tipo_inmueble", new sfWidgetFormSelect(array('choices' => $opciones_inm), array()));
        $this->setWidget("habitacion", new sfWidgetFormInputText(array(), array("class" => "form-control numeric-stepper", 'data-step' => "1", "data-btn-before" => "primary", "data-btn-after" => "success")));
        $this->setWidget("banio", new sfWidgetFormInputText(array(), array("class" => "form-control numeric-stepper", 'data-step' => "1", "data-btn-before" => "primary", "data-btn-after" => "success")));
        $this->setWidget("parqueo", new sfWidgetFormInputText(array(), array("class" => "form-control numeric-stepper", 'data-step' => "1", "data-btn-before" => "primary", "data-btn-after" => "success")));
        $this->setWidget("comedor", new sfWidgetFormInputText(array(), array("class" => "form-control numeric-stepper", 'data-step' => "1", "data-btn-before" => "primary", "data-btn-after" => "success")));
        $this->setWidget("sala", new sfWidgetFormInputText(array(), array("class" => "form-control numeric-stepper", 'data-step' => "1", "data-btn-before" => "primary", "data-btn-after" => "success")));
        $this->setWidget("cocina", new sfWidgetFormInputText(array(), array("class" => "form-control numeric-stepper", 'data-step' => "1", "data-btn-before" => "primary", "data-btn-after" => "success")));
        $this->setWidget("dormitorio_servicio", new sfWidgetFormInputCheckbox(array(), array("class" => "js-switch")));
        $this->setWidget("estudio", new sfWidgetFormInputCheckbox(array(), array("class" => "js-switch")));
        $this->setWidget("cisterna", new sfWidgetFormInputCheckbox(array(), array("class" => "js-switch")));
        $this->setWidget("jardin", new sfWidgetFormInputText(array(), array("class" => "form-control numeric-stepper", 'data-step' => "1", "data-btn-before" => "primary", "data-btn-after" => "success")));
        $this->setWidget("patio", new sfWidgetFormInputText(array(), array("class" => "form-control numeric-stepper", 'data-step' => "1", "data-btn-before" => "primary", "data-btn-after" => "success")));
        $this->setWidget("lavanderia", new sfWidgetFormInputCheckbox(array(), array("class" => "js-switch")));

        $this->setValidator("tipo_operacion", new sfValidatorString(array('required' => true)));
        $this->setValidator("tipo_inmueble", new sfValidatorString(array('required' => true)));
        $this->setValidator("habitacion", new sfValidatorInteger(array('required' => true)));
        $this->setValidator("banio", new sfValidatorInteger(array('required' => true)));
        $this->setValidator("parqueo", new sfValidatorInteger(array('required' => true)));
        $this->setValidator("comedor", new sfValidatorInteger(array('required' => false)));
        $this->setValidator("sala", new sfValidatorInteger(array('required' => false)));
        $this->setValidator("cocina", new sfValidatorInteger(array('required' => false)));
        $this->setValidator("dormitorio_servicio", new sfValidatorBoolean(array('required' => false)));
        $this->setValidator("estudio", new sfValidatorBoolean(array('required' => false)));
        $this->setValidator("cisterna", new sfValidatorBoolean(array('required' => false)));
        $this->setValidator("jardin", new sfValidatorInteger(array('required' => false)));
        $this->setValidator("patio", new sfValidatorInteger(array('required' => false)));
        $this->setValidator("lavanderia", new sfValidatorBoolean(array('required' => false)));
        $this->widgetSchema->setNameFormat('vender_form[%s]');
    }

}
