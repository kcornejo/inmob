<?php

/**
 * Configuracion filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseConfiguracionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'host'         => new sfWidgetFormFilterInput(),
      'encriptacion' => new sfWidgetFormFilterInput(),
      'puerto'       => new sfWidgetFormFilterInput(),
      'usuario'      => new sfWidgetFormFilterInput(),
      'clave'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'host'         => new sfValidatorPass(array('required' => false)),
      'encriptacion' => new sfValidatorPass(array('required' => false)),
      'puerto'       => new sfValidatorPass(array('required' => false)),
      'usuario'      => new sfValidatorPass(array('required' => false)),
      'clave'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('configuracion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Configuracion';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'host'         => 'Text',
      'encriptacion' => 'Text',
      'puerto'       => 'Text',
      'usuario'      => 'Text',
      'clave'        => 'Text',
    );
  }
}
