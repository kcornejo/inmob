<?php

/**
 * PropiedadImagen form base class.
 *
 * @method PropiedadImagen getObject() Returns the current form's model object
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
abstract class BasePropiedadImagenForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'propiedad_id'    => new sfWidgetFormPropelChoice(array('model' => 'Propiedad', 'add_empty' => false)),
      'nombre_original' => new sfWidgetFormInputText(),
      'nombre_actual'   => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
      'created_by'      => new sfWidgetFormInputText(),
      'updated_by'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'propiedad_id'    => new sfValidatorPropelChoice(array('model' => 'Propiedad', 'column' => 'id')),
      'nombre_original' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nombre_actual'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
      'updated_at'      => new sfValidatorDateTime(array('required' => false)),
      'created_by'      => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'updated_by'      => new sfValidatorString(array('max_length' => 32, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('propiedad_imagen[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PropiedadImagen';
  }


}
