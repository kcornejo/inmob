<?php

/**
 * TasaCambio form.
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
class TasaCambioForm extends BaseTasaCambioForm {

    public function configure() {
        $this->setWidgets(array(
            'id' => new sfWidgetFormInputHidden(),
            'moneda_origen' => new sfWidgetFormPropelChoice(array('model' => 'Moneda', 'add_empty' => false), array('class' => 'form-control')),
            'moneda_destino' => new sfWidgetFormPropelChoice(array('model' => 'Moneda', 'add_empty' => false), array('class' => 'form-control')),
            'monto' => new sfWidgetFormInputText(array(), array('class' => 'form-control', 'required' => true)),
        ));

        $this->setValidators(array(
            'id' => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
            'moneda_origen' => new sfValidatorPropelChoice(array('model' => 'Moneda', 'column' => 'id')),
            'moneda_destino' => new sfValidatorPropelChoice(array('model' => 'Moneda', 'column' => 'id')),
            'monto' => new sfValidatorString(array('required' => true)),
        ));

        $this->widgetSchema->setNameFormat('tasa_cambio[%s]');
    }

}
