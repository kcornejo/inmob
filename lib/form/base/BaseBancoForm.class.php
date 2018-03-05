<?php

/**
 * Banco form base class.
 *
 * @method Banco getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseBancoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'descripcion'            => new sfWidgetFormInputText(),
      'relacion_cuota_interes' => new sfWidgetFormInputText(),
      'seguro_banco'           => new sfWidgetFormInputText(),
      'factor_construccion'    => new sfWidgetFormInputText(),
      'created_at'             => new sfWidgetFormDateTime(),
      'updated_at'             => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'descripcion'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'relacion_cuota_interes' => new sfValidatorNumber(array('required' => false)),
      'seguro_banco'           => new sfValidatorNumber(array('required' => false)),
      'factor_construccion'    => new sfValidatorNumber(array('required' => false)),
      'created_at'             => new sfValidatorDateTime(array('required' => false)),
      'updated_at'             => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('banco[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Banco';
  }


}
