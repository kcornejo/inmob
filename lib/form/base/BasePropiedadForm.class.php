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
      'dormitorio_servicio'      => new sfWidgetFormInputText(),
      'estudio'                  => new sfWidgetFormInputText(),
      'cisterna'                 => new sfWidgetFormInputText(),
      'cantidad_jardin'          => new sfWidgetFormInputText(),
      'cantidad_patio'           => new sfWidgetFormInputText(),
      'lavanderia'               => new sfWidgetFormInputText(),
      'estado'                   => new sfWidgetFormInputText(),
      'amenidades'               => new sfWidgetFormInputText(),
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
      'departamento_id'          => new sfWidgetFormPropelChoice(array('model' => 'Departamento', 'add_empty' => true)),
      'municipio_id'             => new sfWidgetFormPropelChoice(array('model' => 'Municipio', 'add_empty' => true)),
      'zona'                     => new sfWidgetFormInputText(),
      'km'                       => new sfWidgetFormInputText(),
      'direccion'                => new sfWidgetFormInputText(),
      'seguridad'                => new sfWidgetFormInputText(),
      'accesos'                  => new sfWidgetFormInputText(),
      'agua'                     => new sfWidgetFormInputText(),
      'transporte_publico'       => new sfWidgetFormInputText(),
      'transito_vehicular'       => new sfWidgetFormInputText(),
      'comunidades_colidantes'   => new sfWidgetFormInputText(),
      'areas_recreacion'         => new sfWidgetFormInputText(),
      'precio_negociable'        => new sfWidgetFormInputCheckbox(),
      'forma_pago'               => new sfWidgetFormInputText(),
      'gastos_escritura'         => new sfWidgetFormInputCheckbox(),
      'created_at'               => new sfWidgetFormDateTime(),
      'updated_at'               => new sfWidgetFormDateTime(),
      'created_by'               => new sfWidgetFormInputText(),
      'updated_by'               => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'tipo_operacion'           => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'tipo_inmueble'            => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'cantidad_habitacion'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cantidad_banio'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cantidad_parqueo'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cantidad_comedor'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cantidad_sala'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cantidad_cocina'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'dormitorio_servicio'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'estudio'                  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cisterna'                 => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cantidad_jardin'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cantidad_patio'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'lavanderia'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'estado'                   => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'amenidades'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
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
      'departamento_id'          => new sfValidatorPropelChoice(array('model' => 'Departamento', 'column' => 'id', 'required' => false)),
      'municipio_id'             => new sfValidatorPropelChoice(array('model' => 'Municipio', 'column' => 'id', 'required' => false)),
      'zona'                     => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'km'                       => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'direccion'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'seguridad'                => new sfValidatorNumber(array('required' => false)),
      'accesos'                  => new sfValidatorNumber(array('required' => false)),
      'agua'                     => new sfValidatorNumber(array('required' => false)),
      'transporte_publico'       => new sfValidatorNumber(array('required' => false)),
      'transito_vehicular'       => new sfValidatorNumber(array('required' => false)),
      'comunidades_colidantes'   => new sfValidatorNumber(array('required' => false)),
      'areas_recreacion'         => new sfValidatorNumber(array('required' => false)),
      'precio_negociable'        => new sfValidatorBoolean(array('required' => false)),
      'forma_pago'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'gastos_escritura'         => new sfValidatorBoolean(array('required' => false)),
      'created_at'               => new sfValidatorDateTime(array('required' => false)),
      'updated_at'               => new sfValidatorDateTime(array('required' => false)),
      'created_by'               => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'updated_by'               => new sfValidatorString(array('max_length' => 32, 'required' => false)),
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
