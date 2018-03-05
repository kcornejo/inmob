<?php

/**
 * CorreoPendiente form base class.
 *
 * @method CorreoPendiente getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseCorreoPendienteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'asunto'       => new sfWidgetFormInputText(),
      'contenido'    => new sfWidgetFormTextarea(),
      'beneficiario' => new sfWidgetFormTextarea(),
      'enviado'      => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'asunto'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'contenido'    => new sfValidatorString(array('required' => false)),
      'beneficiario' => new sfValidatorString(array('required' => false)),
      'enviado'      => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('correo_pendiente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CorreoPendiente';
  }


}
