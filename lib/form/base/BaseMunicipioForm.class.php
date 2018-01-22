<?php

/**
 * Municipio form base class.
 *
 * @method Municipio getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseMunicipioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'descripcion'     => new sfWidgetFormInputText(),
      'departamento_id' => new sfWidgetFormPropelChoice(array('model' => 'Departamento', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'descripcion'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'departamento_id' => new sfValidatorPropelChoice(array('model' => 'Departamento', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('municipio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Municipio';
  }


}
