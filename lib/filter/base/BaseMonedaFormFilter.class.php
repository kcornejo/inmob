<?php

/**
 * Moneda filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseMonedaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'descripcion' => new sfWidgetFormFilterInput(),
      'simbolo'     => new sfWidgetFormFilterInput(),
      'codigo'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'descripcion' => new sfValidatorPass(array('required' => false)),
      'simbolo'     => new sfValidatorPass(array('required' => false)),
      'codigo'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('moneda_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Moneda';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'descripcion' => 'Text',
      'simbolo'     => 'Text',
      'codigo'      => 'Text',
    );
  }
}
