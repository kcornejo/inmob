<?php

/**
 * Usuario form.
 *
 * @package    plan
 * @subpackage form
 * @author     Via
 */
class UsuarioForm extends BaseUsuarioForm {

    public function configure() {
        $this->validatorSchema->setPostValidator(new sfValidatorCallback(array(
            'callback' => array($this, "validaUsuario")
        )));
    }

    public function validaUsuario(sfValidatorBase $validator, array $values) {

        $username = $values['usuario'];
        $id = $values["id"];
        $usuario = UsuarioQuery::create()->findOneByUsuario($username);
        if ($usuario && !$id) {
            throw new sfValidatorErrorSchema($validator, array("usuario" => new sfValidatorError($validator, "Usuario ya existente.")));
        }
        return $values;
    }

}
