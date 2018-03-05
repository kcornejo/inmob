<?php

/**
 * FormatoCorreo filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseFormatoCorreoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'tipo'      => new sfWidgetFormFilterInput(),
      'contenido' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'tipo'      => new sfValidatorPass(array('required' => false)),
      'contenido' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('formato_correo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'FormatoCorreo';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'tipo'      => 'Text',
      'contenido' => 'Text',
    );
  }
}
