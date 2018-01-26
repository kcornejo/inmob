<?php

class VenderForm extends sfForm {

    public function configure() {
        $opciones = array("Vender" => "Vender", "Rentar" => "Rentar");
        $estado = array("Usado" => "Usado", "Nuevo" => "Nuevo");
        $opciones_inm = array("Casa" => "Casa", "Apartamento" => "Apartamento", "Terreno" => "Terreno", "Oficinas" => "Oficinas", "Local" => "Local", "Edificio" => "Edificio", "Bodega" => "Bodega");
        $opciones_pago = array("Financiado" => "Financiado", "Al Contado" => "Al Contado");
        $opciones_km = array("" => "[Seleccione KM]", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10", "11" => "11", "12" => "12", "13" => "13", "14" => "14", "15" => "15", "16" => "16", "17" => "17", "18" => "18", "19" => "19", "20" => "20", "21" => "21",);
        $departamentos = array();
        $departamentos[""] = "[Seleccione Departamento]";
        $DepartamentoQuery = DepartamentoQuery::create()->find();
        $opciones_carretera = array();
        $opciones_carretera[""] = "[Seleccione Carretera]";
        $Carretera = CarreteraQuery::create()->find();
        foreach ($Carretera as $fila) {
            $opciones_carretera[$fila->getId()] = $fila->getDescripcion();
        }
        foreach ($DepartamentoQuery as $fila) {
            $departamentos[$fila->getId()] = $fila->getDescripcion();
        }
        $MunicipioQuery = MunicipioQuery::create()->find();
        $municipios = array();
        $municipios[""] = "[Seleccione Municipio]";
        foreach ($MunicipioQuery as $fila) {
            $municipios[$fila->getId()] = $fila->getDescripcion();
        }
        $MonedaQuery = MonedaQuery::create()->find();
        $monedas = array();
        foreach ($MonedaQuery as $fila) {
            $monedas[$fila->getId()] = $fila->getCodigo();
        }
        $this->setWidget("tipo_operacion", new sfWidgetFormSelect(array('choices' => $opciones), array("class" => "form-control col-md-10")));
        $this->setWidget("tipo_inmueble", new sfWidgetFormSelect(array('choices' => $opciones_inm), array("class" => "form-control col-md-10")));
        $this->setWidget("habitacion", new sfWidgetFormInputText(array(), array("class" => "form-control numeric-stepper", 'data-step' => "1", "data-btn-before" => "default  btn-rounded", "data-btn-after" => "default  btn-rounded")));
        $this->setWidget("banio", new sfWidgetFormInputText(array(), array("class" => "form-control numeric-stepper", "data-decimals" => "1", 'data-step' => "0.5", "data-btn-before" => "default  btn-rounded", "data-btn-after" => "default  btn-rounded")));
        $this->setWidget("parqueo", new sfWidgetFormInputText(array(), array("class" => "form-control numeric-stepper", 'data-step' => "1", "data-btn-before" => "default  btn-rounded", "data-btn-after" => "default  btn-rounded")));
        $this->setWidget("niveles", new sfWidgetFormInputText(array(), array("class" => "form-control numeric-stepper", 'data-step' => "1", "data-btn-before" => "default  btn-rounded", "data-btn-after" => "default  btn-rounded")));
        $this->setWidget("area", new sfWidgetFormInputText(array(), array("class" => "form-control")));
        $this->setWidget("area_x", new sfWidgetFormInputText(array(), array("class" => "form-control col-md-2")));
        $this->setWidget("area_y", new sfWidgetFormInputText(array(), array("class" => "form-control col-md-2")));
        $this->setWidget("comedor", new sfWidgetFormInputText(array(), array("class" => "form-control numeric-stepper", 'data-step' => "1", "data-btn-before" => "default  btn-rounded", "data-btn-after" => "default  btn-rounded")));
        $this->setWidget("sala", new sfWidgetFormInputText(array(), array("class" => "form-control numeric-stepper", 'data-step' => "1", "data-btn-before" => "default  btn-rounded", "data-btn-after" => "default  btn-rounded")));
        $this->setWidget("cocina", new sfWidgetFormInputText(array(), array("class" => "form-control numeric-stepper", 'data-step' => "1", "data-btn-before" => "default  btn-rounded", "data-btn-after" => "default  btn-rounded")));
        $this->setWidget("dormitorio_servicio", new sfWidgetFormInputCheckbox(array(), array("class" => "js-switch")));
        $this->setWidget("estudio", new sfWidgetFormInputCheckbox(array(), array("class" => "js-switch")));
        $this->setWidget("cisterna", new sfWidgetFormInputCheckbox(array(), array("class" => "js-switch")));
        $this->setWidget("jardin", new sfWidgetFormInputText(array(), array("class" => "form-control numeric-stepper", 'data-step' => "1", "data-btn-before" => "default  btn-rounded", "data-btn-after" => "default  btn-rounded")));
        $this->setWidget("patio", new sfWidgetFormInputText(array(), array("class" => "form-control numeric-stepper", 'data-step' => "1", "data-btn-before" => "default  btn-rounded", "data-btn-after" => "default  btn-rounded")));
        $this->setWidget("lavanderia", new sfWidgetFormInputCheckbox(array(), array("class" => "js-switch")));
        $this->setWidget("tiene_luz", new sfWidgetFormInputCheckbox(array(), array("class" => "js-switch")));
        $this->setWidget("tiene_agua", new sfWidgetFormInputCheckbox(array(), array("class" => "js-switch")));
        $this->setWidget("estado", new sfWidgetFormSelect(array('choices' => $estado), array("class" => "form-control col-md-10")));
        $this->setWidget("moneda", new sfWidgetFormSelect(array('choices' => $monedas), array("class" => "form-control col-md-10")));
        $this->setWidget("amenidades", new sfWidgetFormInputText(array(), array("class" => "form-control ")));
        $this->setWidget("precio", new sfWidgetFormInputText(array("label" => "Precio (Q)"), array("class" => "calculo form-control")));
        $this->setWidget("precio_negociable", new sfWidgetFormInputCheckbox(array(), array("class" => "js-switch")));
        $this->setWidget("forma_pago", new sfWidgetFormSelect(array('choices' => $opciones_pago), array("class" => "form-control col-md-10")));
        $this->setWidget("gastos_escritura", new sfWidgetFormInputCheckbox(array(), array("class" => "js-switch")));
        $this->setWidget("anios_construccion", new sfWidgetFormInputText(array(), array("class" => "form-control numeric-stepper", 'data-step' => "1", "data-btn-before" => "default  btn-rounded", "data-btn-after" => "default  btn-rounded")));
        $this->setWidget("mantenimiento_mensual", new sfWidgetFormInputText(array("label" => "Mantenimiento Mensual"), array("class" => "form-control")));
        $this->setWidget("iusi_trimestral", new sfWidgetFormInputText(array("label" => "Iusi Trimestral"), array("class" => "form-control")));
        $this->setWidget("valor_avaluo", new sfWidgetFormInputText(array("label" => "Valor Avaluo"), array("class" => "form-control")));
        $this->setWidget("mi_comision", new sfWidgetFormInputText(array("label" => "Comisión"), array("class" => "calculo form-control")));
        $this->setWidget("comision_compartida", new sfWidgetFormInputText(array("label" => "Comisión Compartida"), array("class" => "calculo form-control")));
        $this->setWidget("nombre_cliente", new sfWidgetFormInputText(array("label" => "Nombre del Cliente"), array("class" => "form-control")));
        $this->setWidget("correo_cliente", new sfWidgetFormInputText(array("label" => "Correo del Cliente"), array("class" => "form-control")));
        $this->setWidget("telefono_cliente", new sfWidgetFormInputText(array("label" => "Telefono del Cliente"), array("class" => "form-control")));
        $this->setWidget("departamento", new sfWidgetFormSelect(array('choices' => $departamentos), array("class" => "form-control velLlenaSelect col-md-12", "destino" => "vender_form_municipio", "url" => sfContext::getInstance()->getController()->genUrl("soporte/departamento"))));
        $this->setWidget("municipio", new sfWidgetFormSelect(array('choices' => $municipios), array("class" => "form-control col-md-12")));
        $this->setWidget("zona", new sfWidgetFormInputText(array("label" => "Zona"), array("class" => "form-control")));
        $this->setWidget("carretera", new sfWidgetFormSelect(array('choices' => $opciones_carretera), array("class" => "form-control col-md-10")));
        $this->setWidget("km", new sfWidgetFormSelect(array('choices' => $opciones_km), array("class" => "form-control col-md-10")));
        $this->setWidget("direccion", new sfWidgetFormInputText(array("label" => "Direccion"), array("class" => "form-control")));
        $this->setWidget("seguridad", new sfWidgetFormInputText(array(), array("class" => "rating", "type" => "number")));
        $this->setWidget("accesos", new sfWidgetFormInputText(array(), array("class" => "rating", "type" => "number")));
        $this->setWidget("agua", new sfWidgetFormInputText(array(), array("class" => "rating", "type" => "number")));
        $this->setWidget("transporte_publico", new sfWidgetFormInputText(array(), array("class" => "rating", "type" => "number")));
        $this->setWidget("transito_vehicular", new sfWidgetFormInputText(array(), array("class" => "rating", "type" => "number")));
        $this->setWidget("comunidades_colidantes", new sfWidgetFormInputText(array(), array("class" => "rating", "type" => "number")));
        $this->setWidget("areas_recreacion", new sfWidgetFormInputText(array(), array("class" => "rating", "type" => "number")));
        $this->setWidget("archivo", new sfWidgetFormInputFileMultiple(array(), array(
            "size" => "20",
            "multiple" => true,
            'max' => 10,
        )));

        $this->setValidator("tipo_operacion", new sfValidatorString(array('required' => true)));
        $this->setValidator("tipo_inmueble", new sfValidatorString(array('required' => true)));
        $this->setValidator("habitacion", new sfValidatorInteger(array('required' => false)));
        $this->setValidator("banio", new sfValidatorNumber(array('required' => false)));
        $this->setValidator("parqueo", new sfValidatorInteger(array('required' => false)));
        $this->setValidator("comedor", new sfValidatorInteger(array('required' => false)));
        $this->setValidator("sala", new sfValidatorInteger(array('required' => false)));
        $this->setValidator("cocina", new sfValidatorInteger(array('required' => false)));
        $this->setValidator("dormitorio_servicio", new sfValidatorString(array('required' => false)));
        $this->setValidator("estudio", new sfValidatorString(array('required' => false)));
        $this->setValidator("cisterna", new sfValidatorString(array('required' => false)));
        $this->setValidator("jardin", new sfValidatorInteger(array('required' => false)));
        $this->setValidator("patio", new sfValidatorInteger(array('required' => false)));
        $this->setValidator("lavanderia", new sfValidatorString(array('required' => false)));
        $this->setValidator("estado", new sfValidatorString(array('required' => true)));
        $this->setValidator("amenidades", new sfValidatorString(array('required' => false)));
        $this->setValidator("precio", new sfValidatorNumber(array('required' => true)));
        $this->setValidator("precio_negociable", new sfValidatorString(array('required' => false)));
        $this->setValidator("forma_pago", new sfValidatorString(array('required' => false)));
        $this->setValidator("gastos_escritura", new sfValidatorString(array('required' => false)));
        $this->setValidator("anios_construccion", new sfValidatorNumber(array('required' => false)));
        $this->setValidator("iusi_trimestral", new sfValidatorNumber(array('required' => false)));
        $this->setValidator("mantenimiento_mensual", new sfValidatorNumber(array('required' => false)));
        $this->setValidator("valor_avaluo", new sfValidatorNumber(array('required' => false)));
        $this->setValidator("mi_comision", new sfValidatorNumber(array('required' => true)));
        $this->setValidator("comision_compartida", new sfValidatorNumber(array('required' => true)));
        $this->setValidator("nombre_cliente", new sfValidatorString(array('required' => false)));
        $this->setValidator("correo_cliente", new sfValidatorString(array('required' => false)));
        $this->setValidator("telefono_cliente", new sfValidatorString(array('required' => false)));
        $this->setValidator("departamento", new sfValidatorString(array('required' => true)));
        $this->setValidator("municipio", new sfValidatorString(array('required' => true)));
        $this->setValidator("zona", new sfValidatorString(array('required' => false)));
        $this->setValidator("carretera", new sfValidatorString(array('required' => false)));
        $this->setValidator("moneda", new sfValidatorString(array('required' => false)));
        $this->setValidator("km", new sfValidatorString(array('required' => false)));
        $this->setValidator("direccion", new sfValidatorString(array('required' => false)));
        $this->setValidator("seguridad", new sfValidatorString(array('required' => false)));
        $this->setValidator("accesos", new sfValidatorString(array('required' => false)));
        $this->setValidator("agua", new sfValidatorString(array('required' => false)));
        $this->setValidator("transporte_publico", new sfValidatorString(array('required' => false)));
        $this->setValidator("transito_vehicular", new sfValidatorString(array('required' => false)));
        $this->setValidator("comunidades_colidantes", new sfValidatorString(array('required' => false)));
        $this->setValidator("areas_recreacion", new sfValidatorString(array('required' => false)));
        $this->setValidator("niveles", new sfValidatorString(array('required' => false)));
        $this->setValidator("area", new sfValidatorString(array('required' => false)));
        $this->setValidator("area_x", new sfValidatorString(array('required' => false)));
        $this->setValidator("area_y", new sfValidatorString(array('required' => false)));
        $this->setValidator("tiene_luz", new sfValidatorString(array('required' => false)));
        $this->setValidator("tiene_agua", new sfValidatorString(array('required' => false)));
        $carpeta = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . "imagenes";
        $this->setValidator("archivo", new sfValidatorFileMultiple(array(
            "required" => false,
            "path" => $carpeta)));
        $this->widgetSchema->setNameFormat('vender_form[%s]');
    }

}
