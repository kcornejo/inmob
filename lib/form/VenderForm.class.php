<?php

class VenderForm extends sfForm {

    public function configure() {
        $opciones = array("Vender" => "Vender", "Rentar" => "Rentar");
        $estado = array("Usado" => "Usado", "Nuevo" => "Nuevo");
        $opciones_inm = array("Casa" => "Casa", "Apartamento" => "Apartamento", "Terreno" => "Terreno", "Oficinas" => "Oficinas", "Local" => "Local");
        $opciones_pago = array("Financiado" => "Financiado");
        $departamentos = array();
        $municipios = array();
        $zonas = array();
        $this->setWidget("tipo_operacion", new sfWidgetFormSelect(array('choices' => $opciones), array()));
        $this->setWidget("tipo_inmueble", new sfWidgetFormSelect(array('choices' => $opciones_inm), array()));
        $this->setWidget("habitacion", new sfWidgetFormInputText(array(), array("class" => "form-control numeric-stepper", 'data-step' => "1", "data-btn-before" => "primary", "data-btn-after" => "success")));
        $this->setWidget("banio", new sfWidgetFormInputText(array(), array("class" => "form-control numeric-stepper", 'data-step' => "0.5", "data-btn-before" => "primary", "data-btn-after" => "success")));
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
        $this->setWidget("estado", new sfWidgetFormSelect(array('choices' => $estado), array()));
        $this->setWidget("amenidades", new sfWidgetFormInputText(array(), array("class" => "form-control ")));
        $this->setWidget("precio", new sfWidgetFormInputText(array("label" => "Precio (Q)"), array("class" => "form-control")));
        $this->setWidget("precio_negociable", new sfWidgetFormInputCheckbox(array(), array("class" => "js-switch")));
        $this->setWidget("forma_pago", new sfWidgetFormSelect(array('choices' => $opciones_pago), array()));
        $this->setWidget("gastos_escritura", new sfWidgetFormInputCheckbox(array(), array("class" => "js-switch")));
        $this->setWidget("anios_construccion", new sfWidgetFormInputText(array(), array("class" => "form-control numeric-stepper", 'data-step' => "1", "data-btn-before" => "primary", "data-btn-after" => "success")));
        $this->setWidget("mantenimiento_mensual", new sfWidgetFormInputText(array("label" => "Mantenimiento Mensual"), array("class" => "form-control")));
        $this->setWidget("iusi_trimestral", new sfWidgetFormInputText(array("label" => "Iusi Trimestral"), array("class" => "form-control")));
        $this->setWidget("valor_avaluo", new sfWidgetFormInputText(array("label" => "Valor Avaluo"), array("class" => "form-control")));
        $this->setWidget("mi_comision", new sfWidgetFormInputText(array("label" => "Comisión"), array("class" => "form-control")));
        $this->setWidget("comision_compartida", new sfWidgetFormInputText(array("label" => "Comisión Compartida"), array("class" => "form-control")));
        $this->setWidget("nombre_cliente", new sfWidgetFormInputText(array("label" => "Nombre del Cliente"), array("class" => "form-control")));
        $this->setWidget("correo_cliente", new sfWidgetFormInputText(array("label" => "Correo del Cliente"), array("class" => "form-control")));
        $this->setWidget("telefono_cliente", new sfWidgetFormInputText(array("label" => "Telefono del Cliente"), array("class" => "form-control")));
        $this->setWidget("departamento", new sfWidgetFormSelect(array('choices' => $departamentos), array()));
        $this->setWidget("municipio", new sfWidgetFormSelect(array('choices' => $municipios), array()));
        $this->setWidget("zona", new sfWidgetFormSelect(array('choices' => $zonas), array()));
        $this->setWidget("km", new sfWidgetFormInputText(array("label" => "KM"), array("class" => "form-control")));
        $this->setWidget("direccion", new sfWidgetFormInputText(array("label" => "Direccion"), array("class" => "form-control")));
        $this->setWidget("seguridad", new  sfWidgetFormInputHidden());
        $this->setWidget("accesos", new sfWidgetFormInputHidden());
        $this->setWidget("agua", new sfWidgetFormInputHidden());
        $this->setWidget("transporte_publico", new sfWidgetFormInputHidden());
        $this->setWidget("transito_vehicular", new sfWidgetFormInputHidden());
        $this->setWidget("comunidades_colidantes", new sfWidgetFormInputHidden());
        $this->setWidget("areas_recreacion", new sfWidgetFormInputHidden());

        $this->setValidator("tipo_operacion", new sfValidatorString(array('required' => true)));
        $this->setValidator("tipo_inmueble", new sfValidatorString(array('required' => true)));
        $this->setValidator("habitacion", new sfValidatorInteger(array('required' => true)));
        $this->setValidator("banio", new sfValidatorNumber(array('required' => true)));
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
        $this->setValidator("estado", new sfValidatorString(array('required' => true)));
        $this->setValidator("amenidades", new sfValidatorString(array('required' => false)));
        $this->setValidator("precio", new sfValidatorNumber(array('required' => true)));
        $this->setValidator("precio_negociable", new sfValidatorNumber(array('required' => false)));
        $this->setValidator("forma_pago", new sfValidatorString(array('required' => false)));
        $this->setValidator("gastos_escritura", new sfValidatorString(array('required' => false)));
        $this->setValidator("anios_construccion", new sfValidatorNumber(array('required' => false)));
        $this->setValidator("iusi_trimestral", new sfValidatorNumber(array('required' => false)));
        $this->setValidator("valor_avaluo", new sfValidatorNumber(array('required' => false)));
        $this->setValidator("mi_comision", new sfValidatorNumber(array('required' => true)));
        $this->setValidator("comision_compartida", new sfValidatorNumber(array('required' => true)));
        $this->setValidator("nombre_cliente", new sfValidatorString(array('required' => true)));
        $this->setValidator("correo_cliente", new sfValidatorString(array('required' => true)));
        $this->setValidator("telefono_cliente", new sfValidatorString(array('required' => true)));
        $this->setValidator("telefono_cliente", new sfValidatorString(array('required' => true)));
        $this->setValidator("departamento", new sfValidatorString(array('required' => true)));
        $this->setValidator("municipio", new sfValidatorString(array('required' => true)));
        $this->setValidator("zona", new sfValidatorString(array('required' => true)));
        $this->setValidator("km", new sfValidatorString(array('required' => false)));
        $this->setValidator("direccion", new sfValidatorString(array('required' => true)));
        $this->setValidator("seguridad", new sfValidatorString(array('required' => false)));
        $this->setValidator("accesos", new sfValidatorString(array('required' => false)));
        $this->setValidator("agua", new sfValidatorString(array('required' => false)));
        $this->setValidator("transporte_publico", new sfValidatorString(array('required' => false)));
        $this->setValidator("transito_vehicular", new sfValidatorString(array('required' => false)));
        $this->setValidator("comunidades_colidantes", new sfValidatorString(array('required' => false)));
        $this->setValidator("areas_recreacion", new sfValidatorString(array('required' => false)));
        $this->widgetSchema->setNameFormat('vender_form[%s]');
    }

}
