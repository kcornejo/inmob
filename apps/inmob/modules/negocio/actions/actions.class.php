<?php

/**
 * negocio actions.
 *
 * @package    plan
 * @subpackage negocio
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class negocioActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->negocios = NegocioQuery::create()->find();
    }

}
