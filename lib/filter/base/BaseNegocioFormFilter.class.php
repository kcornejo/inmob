<?php

/**
 * Negocio filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseNegocioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'requerimiento_id' => new sfWidgetFormPropelChoice(array('model' => 'Requerimiento', 'add_empty' => true)),
      'propiedad_id'     => new sfWidgetFormPropelChoice(array('model' => 'Propiedad', 'add_empty' => true)),
      'usuario_req'      => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'usuario_prop'     => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'requerimiento_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Requerimiento', 'column' => 'id')),
      'propiedad_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Propiedad', 'column' => 'id')),
      'usuario_req'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
      'usuario_prop'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('negocio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Negocio';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'requerimiento_id' => 'ForeignKey',
      'propiedad_id'     => 'ForeignKey',
      'usuario_req'      => 'ForeignKey',
      'usuario_prop'     => 'ForeignKey',
    );
  }
}
