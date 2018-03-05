<?php

/**
 * CorreoPendiente filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseCorreoPendienteFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'asunto'       => new sfWidgetFormFilterInput(),
      'contenido'    => new sfWidgetFormFilterInput(),
      'beneficiario' => new sfWidgetFormFilterInput(),
      'enviado'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'asunto'       => new sfValidatorPass(array('required' => false)),
      'contenido'    => new sfValidatorPass(array('required' => false)),
      'beneficiario' => new sfValidatorPass(array('required' => false)),
      'enviado'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('correo_pendiente_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CorreoPendiente';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'asunto'       => 'Text',
      'contenido'    => 'Text',
      'beneficiario' => 'Text',
      'enviado'      => 'Boolean',
    );
  }
}
