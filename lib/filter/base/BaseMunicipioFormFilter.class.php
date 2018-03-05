<?php

/**
 * Municipio filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseMunicipioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'descripcion'     => new sfWidgetFormFilterInput(),
      'departamento_id' => new sfWidgetFormPropelChoice(array('model' => 'Departamento', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'descripcion'     => new sfValidatorPass(array('required' => false)),
      'departamento_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Departamento', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('municipio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Municipio';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'descripcion'     => 'Text',
      'departamento_id' => 'ForeignKey',
    );
  }
}
