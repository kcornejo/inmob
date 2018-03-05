<?php

/**
 * DireccionRequerimiento filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseDireccionRequerimientoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'requerimiento_id' => new sfWidgetFormPropelChoice(array('model' => 'Requerimiento', 'add_empty' => true)),
      'departamento_id'  => new sfWidgetFormPropelChoice(array('model' => 'Departamento', 'add_empty' => true)),
      'municipio_id'     => new sfWidgetFormPropelChoice(array('model' => 'Municipio', 'add_empty' => true)),
      'zona'             => new sfWidgetFormFilterInput(),
      'carretera_id'     => new sfWidgetFormPropelChoice(array('model' => 'Carretera', 'add_empty' => true)),
      'km'               => new sfWidgetFormFilterInput(),
      'direccion'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'requerimiento_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Requerimiento', 'column' => 'id')),
      'departamento_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Departamento', 'column' => 'id')),
      'municipio_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Municipio', 'column' => 'id')),
      'zona'             => new sfValidatorPass(array('required' => false)),
      'carretera_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Carretera', 'column' => 'id')),
      'km'               => new sfValidatorPass(array('required' => false)),
      'direccion'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('direccion_requerimiento_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DireccionRequerimiento';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'requerimiento_id' => 'ForeignKey',
      'departamento_id'  => 'ForeignKey',
      'municipio_id'     => 'ForeignKey',
      'zona'             => 'Text',
      'carretera_id'     => 'ForeignKey',
      'km'               => 'Text',
      'direccion'        => 'Text',
    );
  }
}
