<?php

/**
 * Requerimiento filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseRequerimientoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'tipo_operacion'             => new sfWidgetFormFilterInput(),
      'tipo_inmueble'              => new sfWidgetFormFilterInput(),
      'cantidad_habitacion'        => new sfWidgetFormFilterInput(),
      'cantidad_banio'             => new sfWidgetFormFilterInput(),
      'cantidad_parqueo'           => new sfWidgetFormFilterInput(),
      'cantidad_comedor'           => new sfWidgetFormFilterInput(),
      'cantidad_sala'              => new sfWidgetFormFilterInput(),
      'cantidad_cocina'            => new sfWidgetFormFilterInput(),
      'dormitorio_servicio'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'estudio'                    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'cisterna'                   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'cantidad_jardin'            => new sfWidgetFormFilterInput(),
      'cantidad_patio'             => new sfWidgetFormFilterInput(),
      'lavanderia'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'tiene_luz'                  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'tiene_agua'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'niveles'                    => new sfWidgetFormFilterInput(),
      'area'                       => new sfWidgetFormFilterInput(),
      'area_x'                     => new sfWidgetFormFilterInput(),
      'area_y'                     => new sfWidgetFormFilterInput(),
      'estado'                     => new sfWidgetFormFilterInput(),
      'amenidades'                 => new sfWidgetFormFilterInput(),
      'moneda_id'                  => new sfWidgetFormPropelChoice(array('model' => 'Moneda', 'add_empty' => true)),
      'forma_pago'                 => new sfWidgetFormFilterInput(),
      'presupuesto_min'            => new sfWidgetFormFilterInput(),
      'presupuesto_max'            => new sfWidgetFormFilterInput(),
      'nombre_cliente'             => new sfWidgetFormFilterInput(),
      'correo_cliente'             => new sfWidgetFormFilterInput(),
      'telefono_cliente'           => new sfWidgetFormFilterInput(),
      'estatus'                    => new sfWidgetFormFilterInput(),
      'precalificacion'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'nucleo_familiar'            => new sfWidgetFormFilterInput(),
      'ingresos'                   => new sfWidgetFormFilterInput(),
      'egresos'                    => new sfWidgetFormFilterInput(),
      'enganche'                   => new sfWidgetFormFilterInput(),
      'tasa_interes_anual'         => new sfWidgetFormFilterInput(),
      'plazo_en_anios'             => new sfWidgetFormFilterInput(),
      'plazo_en_meses'             => new sfWidgetFormFilterInput(),
      'monto_financiar_maximo'     => new sfWidgetFormFilterInput(),
      'cuota_total_mensual_maxima' => new sfWidgetFormFilterInput(),
      'created_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'                 => new sfWidgetFormFilterInput(),
      'updated_by'                 => new sfWidgetFormFilterInput(),
      'usuario_id'                 => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'cantidad_oficina'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'tipo_operacion'             => new sfValidatorPass(array('required' => false)),
      'tipo_inmueble'              => new sfValidatorPass(array('required' => false)),
      'cantidad_habitacion'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cantidad_banio'             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'cantidad_parqueo'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cantidad_comedor'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cantidad_sala'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cantidad_cocina'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dormitorio_servicio'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'estudio'                    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'cisterna'                   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'cantidad_jardin'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cantidad_patio'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'lavanderia'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'tiene_luz'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'tiene_agua'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'niveles'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'area'                       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'area_x'                     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'area_y'                     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'estado'                     => new sfValidatorPass(array('required' => false)),
      'amenidades'                 => new sfValidatorPass(array('required' => false)),
      'moneda_id'                  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Moneda', 'column' => 'id')),
      'forma_pago'                 => new sfValidatorPass(array('required' => false)),
      'presupuesto_min'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'presupuesto_max'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'nombre_cliente'             => new sfValidatorPass(array('required' => false)),
      'correo_cliente'             => new sfValidatorPass(array('required' => false)),
      'telefono_cliente'           => new sfValidatorPass(array('required' => false)),
      'estatus'                    => new sfValidatorPass(array('required' => false)),
      'precalificacion'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'nucleo_familiar'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ingresos'                   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'egresos'                    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'enganche'                   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'tasa_interes_anual'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'plazo_en_anios'             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'plazo_en_meses'             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'monto_financiar_maximo'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'cuota_total_mensual_maxima' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'                 => new sfValidatorPass(array('required' => false)),
      'updated_by'                 => new sfValidatorPass(array('required' => false)),
      'usuario_id'                 => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
      'cantidad_oficina'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('requerimiento_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Requerimiento';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'tipo_operacion'             => 'Text',
      'tipo_inmueble'              => 'Text',
      'cantidad_habitacion'        => 'Number',
      'cantidad_banio'             => 'Number',
      'cantidad_parqueo'           => 'Number',
      'cantidad_comedor'           => 'Number',
      'cantidad_sala'              => 'Number',
      'cantidad_cocina'            => 'Number',
      'dormitorio_servicio'        => 'Boolean',
      'estudio'                    => 'Boolean',
      'cisterna'                   => 'Boolean',
      'cantidad_jardin'            => 'Number',
      'cantidad_patio'             => 'Number',
      'lavanderia'                 => 'Boolean',
      'tiene_luz'                  => 'Boolean',
      'tiene_agua'                 => 'Boolean',
      'niveles'                    => 'Number',
      'area'                       => 'Number',
      'area_x'                     => 'Number',
      'area_y'                     => 'Number',
      'estado'                     => 'Text',
      'amenidades'                 => 'Text',
      'moneda_id'                  => 'ForeignKey',
      'forma_pago'                 => 'Text',
      'presupuesto_min'            => 'Number',
      'presupuesto_max'            => 'Number',
      'nombre_cliente'             => 'Text',
      'correo_cliente'             => 'Text',
      'telefono_cliente'           => 'Text',
      'estatus'                    => 'Text',
      'precalificacion'            => 'Boolean',
      'nucleo_familiar'            => 'Number',
      'ingresos'                   => 'Number',
      'egresos'                    => 'Number',
      'enganche'                   => 'Number',
      'tasa_interes_anual'         => 'Number',
      'plazo_en_anios'             => 'Number',
      'plazo_en_meses'             => 'Number',
      'monto_financiar_maximo'     => 'Number',
      'cuota_total_mensual_maxima' => 'Number',
      'created_at'                 => 'Date',
      'updated_at'                 => 'Date',
      'created_by'                 => 'Text',
      'updated_by'                 => 'Text',
      'usuario_id'                 => 'ForeignKey',
      'cantidad_oficina'           => 'Number',
    );
  }
}
