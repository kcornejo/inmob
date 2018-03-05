<?php

/**
 * Requerimiento form base class.
 *
 * @method Requerimiento getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseRequerimientoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'tipo_operacion'             => new sfWidgetFormInputText(),
      'tipo_inmueble'              => new sfWidgetFormInputText(),
      'cantidad_habitacion'        => new sfWidgetFormInputText(),
      'cantidad_banio'             => new sfWidgetFormInputText(),
      'cantidad_parqueo'           => new sfWidgetFormInputText(),
      'cantidad_comedor'           => new sfWidgetFormInputText(),
      'cantidad_sala'              => new sfWidgetFormInputText(),
      'cantidad_cocina'            => new sfWidgetFormInputText(),
      'dormitorio_servicio'        => new sfWidgetFormInputCheckbox(),
      'estudio'                    => new sfWidgetFormInputCheckbox(),
      'cisterna'                   => new sfWidgetFormInputCheckbox(),
      'cantidad_jardin'            => new sfWidgetFormInputText(),
      'cantidad_patio'             => new sfWidgetFormInputText(),
      'lavanderia'                 => new sfWidgetFormInputCheckbox(),
      'tiene_luz'                  => new sfWidgetFormInputCheckbox(),
      'tiene_agua'                 => new sfWidgetFormInputCheckbox(),
      'niveles'                    => new sfWidgetFormInputText(),
      'area'                       => new sfWidgetFormInputText(),
      'area_x'                     => new sfWidgetFormInputText(),
      'area_y'                     => new sfWidgetFormInputText(),
      'estado'                     => new sfWidgetFormInputText(),
      'amenidades'                 => new sfWidgetFormInputText(),
      'moneda_id'                  => new sfWidgetFormPropelChoice(array('model' => 'Moneda', 'add_empty' => false)),
      'forma_pago'                 => new sfWidgetFormInputText(),
      'presupuesto_min'            => new sfWidgetFormInputText(),
      'presupuesto_max'            => new sfWidgetFormInputText(),
      'nombre_cliente'             => new sfWidgetFormInputText(),
      'correo_cliente'             => new sfWidgetFormInputText(),
      'telefono_cliente'           => new sfWidgetFormInputText(),
      'estatus'                    => new sfWidgetFormInputText(),
      'precalificacion'            => new sfWidgetFormInputCheckbox(),
      'nucleo_familiar'            => new sfWidgetFormInputText(),
      'ingresos'                   => new sfWidgetFormInputText(),
      'egresos'                    => new sfWidgetFormInputText(),
      'enganche'                   => new sfWidgetFormInputText(),
      'tasa_interes_anual'         => new sfWidgetFormInputText(),
      'plazo_en_anios'             => new sfWidgetFormInputText(),
      'plazo_en_meses'             => new sfWidgetFormInputText(),
      'monto_financiar_maximo'     => new sfWidgetFormInputText(),
      'cuota_total_mensual_maxima' => new sfWidgetFormInputText(),
      'created_at'                 => new sfWidgetFormDateTime(),
      'updated_at'                 => new sfWidgetFormDateTime(),
      'created_by'                 => new sfWidgetFormInputText(),
      'updated_by'                 => new sfWidgetFormInputText(),
      'usuario_id'                 => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'cantidad_oficina'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'tipo_operacion'             => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'tipo_inmueble'              => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'cantidad_habitacion'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cantidad_banio'             => new sfValidatorNumber(array('required' => false)),
      'cantidad_parqueo'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cantidad_comedor'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cantidad_sala'              => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cantidad_cocina'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'dormitorio_servicio'        => new sfValidatorBoolean(array('required' => false)),
      'estudio'                    => new sfValidatorBoolean(array('required' => false)),
      'cisterna'                   => new sfValidatorBoolean(array('required' => false)),
      'cantidad_jardin'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cantidad_patio'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'lavanderia'                 => new sfValidatorBoolean(array('required' => false)),
      'tiene_luz'                  => new sfValidatorBoolean(array('required' => false)),
      'tiene_agua'                 => new sfValidatorBoolean(array('required' => false)),
      'niveles'                    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'area'                       => new sfValidatorNumber(array('required' => false)),
      'area_x'                     => new sfValidatorNumber(array('required' => false)),
      'area_y'                     => new sfValidatorNumber(array('required' => false)),
      'estado'                     => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'amenidades'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'moneda_id'                  => new sfValidatorPropelChoice(array('model' => 'Moneda', 'column' => 'id')),
      'forma_pago'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'presupuesto_min'            => new sfValidatorNumber(array('required' => false)),
      'presupuesto_max'            => new sfValidatorNumber(array('required' => false)),
      'nombre_cliente'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'correo_cliente'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telefono_cliente'           => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'estatus'                    => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'precalificacion'            => new sfValidatorBoolean(array('required' => false)),
      'nucleo_familiar'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'ingresos'                   => new sfValidatorNumber(array('required' => false)),
      'egresos'                    => new sfValidatorNumber(array('required' => false)),
      'enganche'                   => new sfValidatorNumber(array('required' => false)),
      'tasa_interes_anual'         => new sfValidatorNumber(array('required' => false)),
      'plazo_en_anios'             => new sfValidatorNumber(array('required' => false)),
      'plazo_en_meses'             => new sfValidatorNumber(array('required' => false)),
      'monto_financiar_maximo'     => new sfValidatorNumber(array('required' => false)),
      'cuota_total_mensual_maxima' => new sfValidatorNumber(array('required' => false)),
      'created_at'                 => new sfValidatorDateTime(array('required' => false)),
      'updated_at'                 => new sfValidatorDateTime(array('required' => false)),
      'created_by'                 => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'updated_by'                 => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'usuario_id'                 => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'cantidad_oficina'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('requerimiento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Requerimiento';
  }


}
