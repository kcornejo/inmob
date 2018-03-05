<?php

/**
 * FormatoInicial filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseFormatoInicialFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'contenido' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'contenido' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('formato_inicial_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'FormatoInicial';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'contenido' => 'Text',
    );
  }
}
