<?php

/**
 * Usuario filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BaseUsuarioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuario'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'clave'           => new sfWidgetFormFilterInput(),
      'correo'          => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'      => new sfWidgetFormFilterInput(),
      'updated_by'      => new sfWidgetFormFilterInput(),
      'activo'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'email'           => new sfWidgetFormFilterInput(),
      'numero_telefono' => new sfWidgetFormFilterInput(),
      'perfil_id'       => new sfWidgetFormPropelChoice(array('model' => 'Perfil', 'add_empty' => true)),
      'administrador'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'nombre_completo' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'usuario'         => new sfValidatorPass(array('required' => false)),
      'clave'           => new sfValidatorPass(array('required' => false)),
      'correo'          => new sfValidatorPass(array('required' => false)),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'      => new sfValidatorPass(array('required' => false)),
      'updated_by'      => new sfValidatorPass(array('required' => false)),
      'activo'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'email'           => new sfValidatorPass(array('required' => false)),
      'numero_telefono' => new sfValidatorPass(array('required' => false)),
      'perfil_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Perfil', 'column' => 'id')),
      'administrador'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'nombre_completo' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'usuario'         => 'Text',
      'clave'           => 'Text',
      'correo'          => 'Text',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
      'created_by'      => 'Text',
      'updated_by'      => 'Text',
      'activo'          => 'Boolean',
      'email'           => 'Text',
      'numero_telefono' => 'Text',
      'perfil_id'       => 'ForeignKey',
      'administrador'   => 'Boolean',
      'nombre_completo' => 'Text',
    );
  }
}
