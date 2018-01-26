<?php

/**
 * tasa_cambio actions.
 *
 * @package    plan
 * @subpackage tasa_cambio
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tasa_cambioActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->form = new TasaCambioForm();
        if ($request->isMethod('POST')) {
            $this->form->bind($request->getParameter("tasa_cambio"));
            if ($this->form->isValid()) {
                $valores = $this->form->getValues();
                $moneda_origen = $valores["moneda_origen"];
                $moneda_destino = $valores["moneda_destino"];
                $monto = $valores["monto"];
                if ($moneda_destino != $moneda_origen) {
                    TasaCambioQuery::create()
                            ->where("(moneda_origen = $moneda_origen and moneda_destino = $moneda_destino) or (moneda_origen = $moneda_destino and moneda_destino = $moneda_origen)")
                            ->find()
                            ->delete();
                    $TasaCambio = new TasaCambio();
                    $TasaCambio->setMonedaOrigen($moneda_origen);
                    $TasaCambio->setMonedaDestino($moneda_destino);
                    $TasaCambio->setMonto($monto);
                    $TasaCambio->save();

                    $moneda_origen = $valores["moneda_destino"];
                    $moneda_destino = $valores["moneda_origen"];
                    $monto = 1 / $monto;
                    $TasaCambio = new TasaCambio();
                    $TasaCambio->setMonedaOrigen($moneda_origen);
                    $TasaCambio->setMonedaDestino($moneda_destino);
                    $TasaCambio->setMonto($monto);
                    $TasaCambio->save();
                } else {
                    $this->getUser()->setFlash('error', "No tienen que ser monedas iguales");
                }
            }
        }
        $this->tasaCambio = TasaCambioQuery::create()->find();
    }

}
