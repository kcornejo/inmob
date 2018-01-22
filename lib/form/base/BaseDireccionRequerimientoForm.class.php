<?php

/**
 * DireccionRequerimiento form base class.
 *
 * @method DireccionRequerimiento getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BaseDireccionRequerimientoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'requerimiento_id' => new sfWidgetFormPropelChoice(array('model' => 'Requerimiento', 'add_empty' => false)),
      'departamento_id'  => new sfWidgetFormPropelChoice(array('model' => 'Departamento', 'add_empty' => false)),
      'municipio_id'     => new sfWidgetFormPropelChoice(array('model' => 'Municipio', 'add_empty' => false)),
      'zona'             => new sfWidgetFormInputText(),
      'carretera_id'     => new sfWidgetFormPropelChoice(array('model' => 'Carretera', 'add_empty' => true)),
      'km'               => new sfWidgetFormInputText(),
      'direccion'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'requerimiento_id' => new sfValidatorPropelChoice(array('model' => 'Requerimiento', 'column' => 'id')),
      'departamento_id'  => new sfValidatorPropelChoice(array('model' => 'Departamento', 'column' => 'id')),
      'municipio_id'     => new sfValidatorPropelChoice(array('model' => 'Municipio', 'column' => 'id')),
      'zona'             => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'carretera_id'     => new sfValidatorPropelChoice(array('model' => 'Carretera', 'column' => 'id', 'required' => false)),
      'km'               => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'direccion'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('direccion_requerimiento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DireccionRequerimiento';
  }


}
