<?php

/**
 * Configuracion form base class.
 *
 * @method Configuracion getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseConfiguracionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'host'         => new sfWidgetFormInputText(),
      'encriptacion' => new sfWidgetFormInputText(),
      'puerto'       => new sfWidgetFormInputText(),
      'usuario'      => new sfWidgetFormInputText(),
      'clave'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'host'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'encriptacion' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'puerto'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'usuario'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'clave'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('configuracion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Configuracion';
  }


}
