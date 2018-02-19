<?php

/**
 * Negocio form base class.
 *
 * @method Negocio getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseNegocioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'requerimiento_id' => new sfWidgetFormPropelChoice(array('model' => 'Requerimiento', 'add_empty' => false)),
      'propiedad_id'     => new sfWidgetFormPropelChoice(array('model' => 'Propiedad', 'add_empty' => false)),
      'usuario_req'      => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => false)),
      'usuario_prop'     => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'requerimiento_id' => new sfValidatorPropelChoice(array('model' => 'Requerimiento', 'column' => 'id')),
      'propiedad_id'     => new sfValidatorPropelChoice(array('model' => 'Propiedad', 'column' => 'id')),
      'usuario_req'      => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id')),
      'usuario_prop'     => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('negocio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Negocio';
  }


}
