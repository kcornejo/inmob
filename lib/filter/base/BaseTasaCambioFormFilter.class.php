<?php

/**
 * TasaCambio filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseTasaCambioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'moneda_origen'  => new sfWidgetFormPropelChoice(array('model' => 'Moneda', 'add_empty' => true)),
      'moneda_destino' => new sfWidgetFormPropelChoice(array('model' => 'Moneda', 'add_empty' => true)),
      'monto'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'moneda_origen'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Moneda', 'column' => 'id')),
      'moneda_destino' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Moneda', 'column' => 'id')),
      'monto'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tasa_cambio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TasaCambio';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'moneda_origen'  => 'ForeignKey',
      'moneda_destino' => 'ForeignKey',
      'monto'          => 'Number',
    );
  }
}
