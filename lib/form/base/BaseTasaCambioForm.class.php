<?php

/**
 * TasaCambio form base class.
 *
 * @method TasaCambio getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseTasaCambioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'moneda_origen'  => new sfWidgetFormPropelChoice(array('model' => 'Moneda', 'add_empty' => false)),
      'moneda_destino' => new sfWidgetFormPropelChoice(array('model' => 'Moneda', 'add_empty' => false)),
      'monto'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'moneda_origen'  => new sfValidatorPropelChoice(array('model' => 'Moneda', 'column' => 'id')),
      'moneda_destino' => new sfValidatorPropelChoice(array('model' => 'Moneda', 'column' => 'id')),
      'monto'          => new sfValidatorNumber(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tasa_cambio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TasaCambio';
  }


}
