<?php

/**
 * Propiedad form base class.
 *
 * @method Propiedad getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BasePropiedadForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'tipo_operacion'           => new sfWidgetFormInputText(),
      'tipo_inmueble'            => new sfWidgetFormInputText(),
      'cantidad_habitacion'      => new sfWidgetFormInputText(),
      'cantidad_banio'           => new sfWidgetFormInputText(),
      'cantidad_parqueo'         => new sfWidgetFormInputText(),
      'cantidad_comedor'         => new sfWidgetFormInputText(),
      'cantidad_sala'            => new sfWidgetFormInputText(),
      'cantidad_cocina'          => new sfWidgetFormInputText(),
      'dormitorio_servicio'      => new sfWidgetFormInputCheckbox(),
      'estudio'                  => new sfWidgetFormInputCheckbox(),
      'cisterna'                 => new sfWidgetFormInputCheckbox(),
      'cantidad_jardin'          => new sfWidgetFormInputText(),
      'cantidad_patio'           => new sfWidgetFormInputText(),
      'lavanderia'               => new sfWidgetFormInputCheckbox(),
      'estado'                   => new sfWidgetFormInputText(),
      'amenidades'               => new sfWidgetFormInputText(),
      'moneda_id'                => new sfWidgetFormPropelChoice(array('model' => 'Moneda', 'add_empty' => false)),
      'precio'                   => new sfWidgetFormInputText(),
      'negociable'               => new sfWidgetFormInputCheckbox(),
      'incluye_gastos_escritura' => new sfWidgetFormInputCheckbox(),
      'anio_construccion'        => new sfWidgetFormInputText(),
      'mantenimiento_mensual'    => new sfWidgetFormInputText(),
      'iusi_semestral'           => new sfWidgetFormInputText(),
      'valor_avaluo'             => new sfWidgetFormInputText(),
      'mi_comision'              => new sfWidgetFormInputText(),
      'comision_compartida'      => new sfWidgetFormInputText(),
      'nombre_cliente'           => new sfWidgetFormInputText(),
      'correo_cliente'           => new sfWidgetFormInputText(),
      'telefono_cliente'         => new sfWidgetFormInputText(),
      'departamento_id'          => new sfWidgetFormPropelChoice(array('model' => 'Departamento', 'add_empty' => false)),
      'municipio_id'             => new sfWidgetFormPropelChoice(array('model' => 'Municipio', 'add_empty' => false)),
      'zona'                     => new sfWidgetFormInputText(),
      'carretera_id'             => new sfWidgetFormPropelChoice(array('model' => 'Carretera', 'add_empty' => true)),
      'km'                       => new sfWidgetFormInputText(),
      'direccion'                => new sfWidgetFormInputText(),
      'seguridad'                => new sfWidgetFormInputText(),
      'accesos'                  => new sfWidgetFormInputText(),
      'agua'                     => new sfWidgetFormInputText(),
      'transporte_publico'       => new sfWidgetFormInputText(),
      'transito_vehicular'       => new sfWidgetFormInputText(),
      'comunidades_colidantes'   => new sfWidgetFormInputText(),
      'areas_recreacion'         => new sfWidgetFormInputText(),
      'forma_pago'               => new sfWidgetFormInputText(),
      'created_at'               => new sfWidgetFormDateTime(),
      'updated_at'               => new sfWidgetFormDateTime(),
      'created_by'               => new sfWidgetFormInputText(),
      'updated_by'               => new sfWidgetFormInputText(),
      'tiene_luz'                => new sfWidgetFormInputCheckbox(),
      'tiene_agua'               => new sfWidgetFormInputCheckbox(),
      'niveles'                  => new sfWidgetFormInputText(),
      'area'                     => new sfWidgetFormInputText(),
      'area_x'                   => new sfWidgetFormInputText(),
      'area_y'                   => new sfWidgetFormInputText(),
      'estatus'                  => new sfWidgetFormInputText(),
      'usuario_id'               => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'cantidad_oficina'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'tipo_operacion'           => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'tipo_inmueble'            => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'cantidad_habitacion'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cantidad_banio'           => new sfValidatorNumber(array('required' => false)),
      'cantidad_parqueo'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cantidad_comedor'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cantidad_sala'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cantidad_cocina'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'dormitorio_servicio'      => new sfValidatorBoolean(array('required' => false)),
      'estudio'                  => new sfValidatorBoolean(array('required' => false)),
      'cisterna'                 => new sfValidatorBoolean(array('required' => false)),
      'cantidad_jardin'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cantidad_patio'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'lavanderia'               => new sfValidatorBoolean(array('required' => false)),
      'estado'                   => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'amenidades'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'moneda_id'                => new sfValidatorPropelChoice(array('model' => 'Moneda', 'column' => 'id')),
      'precio'                   => new sfValidatorNumber(array('required' => false)),
      'negociable'               => new sfValidatorBoolean(array('required' => false)),
      'incluye_gastos_escritura' => new sfValidatorBoolean(array('required' => false)),
      'anio_construccion'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'mantenimiento_mensual'    => new sfValidatorNumber(array('required' => false)),
      'iusi_semestral'           => new sfValidatorNumber(array('required' => false)),
      'valor_avaluo'             => new sfValidatorNumber(array('required' => false)),
      'mi_comision'              => new sfValidatorNumber(array('required' => false)),
      'comision_compartida'      => new sfValidatorNumber(array('required' => false)),
      'nombre_cliente'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'correo_cliente'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telefono_cliente'         => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'departamento_id'          => new sfValidatorPropelChoice(array('model' => 'Departamento', 'column' => 'id')),
      'municipio_id'             => new sfValidatorPropelChoice(array('model' => 'Municipio', 'column' => 'id')),
      'zona'                     => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'carretera_id'             => new sfValidatorPropelChoice(array('model' => 'Carretera', 'column' => 'id', 'required' => false)),
      'km'                       => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'direccion'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'seguridad'                => new sfValidatorNumber(array('required' => false)),
      'accesos'                  => new sfValidatorNumber(array('required' => false)),
      'agua'                     => new sfValidatorNumber(array('required' => false)),
      'transporte_publico'       => new sfValidatorNumber(array('required' => false)),
      'transito_vehicular'       => new sfValidatorNumber(array('required' => false)),
      'comunidades_colidantes'   => new sfValidatorNumber(array('required' => false)),
      'areas_recreacion'         => new sfValidatorNumber(array('required' => false)),
      'forma_pago'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'               => new sfValidatorDateTime(array('required' => false)),
      'updated_at'               => new sfValidatorDateTime(array('required' => false)),
      'created_by'               => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'updated_by'               => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'tiene_luz'                => new sfValidatorBoolean(array('required' => false)),
      'tiene_agua'               => new sfValidatorBoolean(array('required' => false)),
      'niveles'                  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'area'                     => new sfValidatorNumber(array('required' => false)),
      'area_x'                   => new sfValidatorNumber(array('required' => false)),
      'area_y'                   => new sfValidatorNumber(array('required' => false)),
      'estatus'                  => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'usuario_id'               => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'cantidad_oficina'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('propiedad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Propiedad';
  }


}
