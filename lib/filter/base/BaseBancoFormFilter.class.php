<?php

/**
 * Banco filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseBancoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'descripcion'            => new sfWidgetFormFilterInput(),
      'relacion_cuota_interes' => new sfWidgetFormFilterInput(),
      'seguro_banco'           => new sfWidgetFormFilterInput(),
      'factor_construccion'    => new sfWidgetFormFilterInput(),
      'created_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'descripcion'            => new sfValidatorPass(array('required' => false)),
      'relacion_cuota_interes' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'seguro_banco'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'factor_construccion'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('banco_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Banco';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'descripcion'            => 'Text',
      'relacion_cuota_interes' => 'Number',
      'seguro_banco'           => 'Number',
      'factor_construccion'    => 'Number',
      'created_at'             => 'Date',
      'updated_at'             => 'Date',
    );
  }
}
