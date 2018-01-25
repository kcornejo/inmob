<?php

class RequerimientoForm extends sfForm {

    public function configure() {
        $opciones = array("Comprar" => "Comprar", "Rentar" => "Rentar");
        $estado = array("Indiferente" => "Indiferente", "Usado" => "Usado", "Nuevo" => "Nuevo");
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
        $this->setWidget("jardin", new sfWidgetFormInputText(array(), array("class" => "form-control numeric-stepper", 'data-step' => "1", "data-btn-before" => "default btn-rounded", "data-btn-after" => "default  btn-rounded")));
        $this->setWidget("patio", new sfWidgetFormInputText(array(), array("class" => "form-control numeric-stepper", 'data-step' => "1", "data-btn-before" => "default  btn-rounded", "data-btn-after" => "default  btn-rounded")));
        $this->setWidget("lavanderia", new sfWidgetFormInputCheckbox(array(), array("class" => "js-switch")));
        $this->setWidget("tiene_luz", new sfWidgetFormInputCheckbox(array(), array("class" => "js-switch")));
        $this->setWidget("tiene_agua", new sfWidgetFormInputCheckbox(array(), array("class" => "js-switch")));
        $this->setWidget("estado", new sfWidgetFormSelect(array('choices' => $estado), array("class" => "form-control col-md-10")));
        $this->setWidget("amenidades", new sfWidgetFormInputText(array(), array("class" => "form-control ")));
        $this->setWidget("moneda", new sfWidgetFormSelect(array('choices' => $monedas), array("class" => "form-control col-md-10")));
        $this->setWidget("presupuesto_min", new sfWidgetFormInputText(array("label" => "Precio (Q)"), array("class" => "form-control")));
        $this->setWidget("presupuesto_max", new sfWidgetFormInputText(array("label" => "Precio (Q)"), array("class" => "form-control")));
        $this->setWidget("forma_pago", new sfWidgetFormSelect(array('choices' => $opciones_pago), array("class" => "form-control col-md-10")));
        $this->setWidget("nombre_cliente", new sfWidgetFormInputText(array("label" => "Nombre del Cliente"), array("class" => "form-control")));
        $this->setWidget("correo_cliente", new sfWidgetFormInputText(array("label" => "Correo del Cliente"), array("class" => "form-control")));
        $this->setWidget("telefono_cliente", new sfWidgetFormInputText(array("label" => "Telefono del Cliente"), array("class" => "form-control")));
        $this->setWidget("precalificacion", new sfWidgetFormSelect(array("choices" => array("Si" => "Si", "No" => "No")), array("class" => "form-control")));
        $this->setWidget("nucleo_familiar", new sfWidgetFormInputText(array("label" => "Telefono del Cliente"), array("class" => "form-control")));
//        $this->setWidget("moneda_ingreso", new sfWidgetFormSelect(array('choices' => $monedas), array("class" => "form-control col-md-10")));
        $this->setWidget("ingresos", new sfWidgetFormInputText(array("label" => "Telefono del Cliente"), array("class" => "form-control calculo")));
        $this->setWidget("moneda_egresos", new sfWidgetFormSelect(array('choices' => $monedas), array("class" => "form-control col-md-10")));
        $this->setWidget("egresos", new sfWidgetFormInputText(array("label" => "Telefono del Cliente"), array("class" => "form-control calculo")));
        $this->setWidget("enganche", new sfWidgetFormInputText(array("label" => "Telefono del Cliente"), array("class" => "form-control calculo")));
        $this->setWidget("tasa_interes_anual", new sfWidgetFormInputText(array("label" => "Telefono del Cliente"), array("class" => "form-control calculo")));
        $this->setWidget("plazo_en_anios", new sfWidgetFormInputText(array("label" => "Telefono del Cliente"), array("class" => "form-control calculo")));
        $this->setWidget("plazo_en_meses", new sfWidgetFormInputText(array("label" => "Telefono del Cliente"), array("class" => "form-control", "readonly" => true)));
        $this->setWidget("monto_financiar_maximo", new sfWidgetFormInputText(array("label" => "Telefono del Cliente"), array("class" => "form-control", "readonly" => true)));
        $this->setWidget("cuota_total_mensual_maxima", new sfWidgetFormInputText(array("label" => "Telefono del Cliente"), array("class" => "form-control", "readonly" => true)));

        $this->setWidget("departamento", new sfWidgetFormSelect(array('choices' => $departamentos), array("class" => "form-control velLlenaSelect col-md-12", "destino" => "nuevo_requerimiento_municipio", "url" => sfContext::getInstance()->getController()->genUrl("soporte/departamento"))));
        $this->setWidget("municipio", new sfWidgetFormSelect(array('choices' => $municipios), array("class" => "form-control col-md-12")));
        $this->setWidget("zona", new sfWidgetFormInputText(array("label" => "Zona"), array("class" => "form-control")));
        $this->setWidget("carretera", new sfWidgetFormSelect(array('choices' => $opciones_carretera), array("class" => "form-control col-md-10")));
        $this->setWidget("km", new sfWidgetFormSelect(array('choices' => $opciones_km), array("class" => "form-control col-md-10")));
        $this->setWidget("direccion", new sfWidgetFormInputText(array("label" => "Direccion"), array("class" => "form-control")));
        $this->setWidget("cantidad", new sfWidgetFormInputHidden());
        $busqueda_array = unserialize(sfContext::getInstance()->getUser()->getAttribute("busqueda", null, "valores"));
        foreach ($busqueda_array as $fila) {
            $this->setWidget("departamento_" . $fila, new sfWidgetFormSelect(array('choices' => $departamentos), array("class" => "form-control velLlenaSelect col-md-12", "destino" => "nuevo_requerimiento_municipio_" . $fila, "url" => sfContext::getInstance()->getController()->genUrl("soporte/departamento"))));
            $this->setWidget("municipio_" . $fila, new sfWidgetFormSelect(array('choices' => $municipios), array("class" => "form-control col-md-12")));
            $this->setWidget("zona_" . $fila, new sfWidgetFormInputText(array("label" => "Zona"), array("class" => "form-control")));
            $this->setWidget("carretera_" . $fila, new sfWidgetFormSelect(array('choices' => $opciones_carretera), array("class" => "form-control col-md-10")));
            $this->setWidget("km_" . $fila, new sfWidgetFormSelect(array('choices' => $opciones_km), array("class" => "form-control col-md-10")));
            $this->setWidget("direccion_" . $fila, new sfWidgetFormInputText(array("label" => "Direccion"), array("class" => "form-control")));
            $this->setValidator("departamento_" . $fila, new sfValidatorString(array('required' => true)));
            $this->setValidator("municipio_" . $fila, new sfValidatorString(array('required' => true)));
            $this->setValidator("zona_" . $fila, new sfValidatorString(array('required' => false)));
            $this->setValidator("carretera_" . $fila, new sfValidatorString(array('required' => false)));
            $this->setValidator("km_" . $fila, new sfValidatorString(array('required' => false)));
            $this->setValidator("direccion_" . $fila, new sfValidatorString(array('required' => false)));
        }

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
        $this->setValidator("moneda", new sfValidatorString(array('required' => false)));
        $this->setValidator("presupuesto_min", new sfValidatorNumber(array('required' => true)));
        $this->setValidator("presupuesto_max", new sfValidatorNumber(array('required' => true)));
        $this->setValidator("forma_pago", new sfValidatorString(array('required' => false)));
        $this->setValidator("nombre_cliente", new sfValidatorString(array('required' => true)));
        $this->setValidator("correo_cliente", new sfValidatorString(array('required' => true)));
        $this->setValidator("telefono_cliente", new sfValidatorString(array('required' => true)));
        $this->setValidator("telefono_cliente", new sfValidatorString(array('required' => true)));
        $this->setValidator("niveles", new sfValidatorString(array('required' => false)));
        $this->setValidator("area", new sfValidatorString(array('required' => false)));
        $this->setValidator("area_x", new sfValidatorString(array('required' => false)));
        $this->setValidator("area_y", new sfValidatorString(array('required' => false)));
        $this->setValidator("tiene_luz", new sfValidatorString(array('required' => false)));
        $this->setValidator("tiene_agua", new sfValidatorString(array('required' => false)));

        $this->setValidator("departamento", new sfValidatorString(array('required' => true)));
        $this->setValidator("municipio", new sfValidatorString(array('required' => true)));
        $this->setValidator("zona", new sfValidatorString(array('required' => false)));
        $this->setValidator("carretera", new sfValidatorString(array('required' => false)));
        $this->setValidator("km", new sfValidatorString(array('required' => false)));
        $this->setValidator("direccion", new sfValidatorString(array('required' => false)));

        $this->setValidator("cantidad", new sfValidatorString(array('required' => false)));
        $this->setValidator("precalificacion", new sfValidatorString(array('required' => false)));
        $this->setValidator("nucleo_familiar", new sfValidatorString(array('required' => false)));
//        $this->setValidator("moneda_ingreso", new sfValidatorString(array('required' => false)));
        $this->setValidator("ingresos", new sfValidatorString(array('required' => false)));
        $this->setValidator("moneda_egresos", new sfValidatorString(array('required' => false)));
        $this->setValidator("egresos", new sfValidatorString(array('required' => false)));
        $this->setValidator("enganche", new sfValidatorString(array('required' => false)));
        $this->setValidator("tasa_interes_anual", new sfValidatorString(array('required' => false)));
        $this->setValidator("plazo_en_anios", new sfValidatorString(array('required' => false)));
        $this->setValidator("plazo_en_meses", new sfValidatorString(array('required' => false)));
        $this->setValidator("monto_financiar_maximo", new sfValidatorString(array('required' => false)));
        $this->setValidator("cuota_total_mensual_maxima", new sfValidatorString(array('required' => false)));
        $this->widgetSchema->setNameFormat('nuevo_requerimiento[%s]');
    }

}
