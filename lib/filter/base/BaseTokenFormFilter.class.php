<?php

/**
 * Token filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseTokenFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuario_id' => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'token'      => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'utilizado'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'tipo'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'usuario_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
      'token'      => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'utilizado'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'tipo'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('token_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Token';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'usuario_id' => 'ForeignKey',
      'token'      => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'utilizado'  => 'Boolean',
      'tipo'       => 'Text',
    );
  }
}
