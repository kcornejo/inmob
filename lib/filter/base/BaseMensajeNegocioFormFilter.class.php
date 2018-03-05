<?php

/**
 * MensajeNegocio filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseMensajeNegocioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'negocio_id' => new sfWidgetFormPropelChoice(array('model' => 'Negocio', 'add_empty' => true)),
      'usuario_id' => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'mensaje'    => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'visto'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'negocio_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Negocio', 'column' => 'id')),
      'usuario_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
      'mensaje'    => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'visto'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('mensaje_negocio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MensajeNegocio';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'negocio_id' => 'ForeignKey',
      'usuario_id' => 'ForeignKey',
      'mensaje'    => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'visto'      => 'Boolean',
    );
  }
}
