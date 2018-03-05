<?php

/**
 * PropiedadImagen filter form base class.
 *
 * @package    plan
 * @subpackage filter
 * @author     Via
 */
abstract class BasePropiedadImagenFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'propiedad_id'    => new sfWidgetFormPropelChoice(array('model' => 'Propiedad', 'add_empty' => true)),
      'nombre_original' => new sfWidgetFormFilterInput(),
      'nombre_actual'   => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'      => new sfWidgetFormFilterInput(),
      'updated_by'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'propiedad_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Propiedad', 'column' => 'id')),
      'nombre_original' => new sfValidatorPass(array('required' => false)),
      'nombre_actual'   => new sfValidatorPass(array('required' => false)),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'      => new sfValidatorPass(array('required' => false)),
      'updated_by'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('propiedad_imagen_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PropiedadImagen';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'propiedad_id'    => 'ForeignKey',
      'nombre_original' => 'Text',
      'nombre_actual'   => 'Text',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
      'created_by'      => 'Text',
      'updated_by'      => 'Text',
    );
  }
}
