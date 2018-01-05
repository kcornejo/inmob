<?php

/**
 * vender actions.
 *
 * @package    plan
 * @subpackage vender
 * @author     Via
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class venderActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeNueva(sfWebRequest $request) {
        $defaults = array();
        $defaults["habitacion"] = "0";
        $defaults["banio"] = "0";
        $defaults["parqueo"] = "0";
        $defaults["comedor"] = "0";
        $defaults["sala"] = "0";
        $defaults["cocina"] = "0";
        $defaults["jardin"] = "0";
        $defaults["patio"] = "0";
        $this->formulario_vender = new VenderForm($defaults);
        if ($request->isMethod('POST')) {
            $this->formulario_vender->bind($request->getParameter("vender_form"));
            if ($this->formulario_vender->isValid()) {
                $valores = $this->formulario_vender->getValues();
                $Propiedad = new Propiedad();
                $Propiedad->setTipoOperacion($valores["tipo_operacion"]);
                $Propiedad->setTipoInmueble($valores["tipo_inmueble"]);
                $Propiedad->setCantidadHabitacion($valores["habitacion"]);
                $Propiedad->setCantidadBanio($valores["banio"]);
                $Propiedad->setCantidadParqueo($valores["parqueo"]);
                $Propiedad->setCantidadComedor($valores["comedor"]);
                $Propiedad->setCantidadSala($valores["sala"]);
                $Propiedad->setCantidadCocina($valores["cocina"]);
                $Propiedad->setCantidadJardin($valores["jardin"]);
                $Propiedad->setCantidadPatio($valores["patio"]);
                $Propiedad->setEstado($valores["estado"]);
                $Propiedad->setAmenidades($valores["amenidades"]);
                $Propiedad->setPrecio($valores["precio"]);
                $Propiedad->setAnioConstruccion($valores["anios_construccion"]);
                $Propiedad->setMantenimientoMensual($valores["mantenimiento_mensual"]);
                $Propiedad->setIusiSemestral($valores["iusi_trimestral"]);
                $Propiedad->setValorAvaluo($valores["valor_avaluo"]);
                $Propiedad->setMiComision($valores['mi_comision']);
                $Propiedad->setComisionCompartida($valores["comision_compartida"]);
                $Propiedad->setNombreCliente($valores["nombre_cliente"]);
                $Propiedad->setCorreoCliente($valores["correo_cliente"]);
                $Propiedad->setTelefonoCliente($valores["telefono_cliente"]);
                $Propiedad->setDepartamentoId($valores["departamento"]);
                $Propiedad->setMunicipioId($valores["municipio"]);
                $Propiedad->setZona($valores["zona"]);
                $Propiedad->setKm($valores["km"]);
                $Propiedad->setDireccion($valores["direccion"]);
                $Propiedad->setSeguridad($valores["seguridad"]);
                $Propiedad->setAccesos($valores["accesos"]);
                $Propiedad->setAgua($valores["agua"]);
                $Propiedad->setTransportePublico($valores["transporte_publico"]);
                $Propiedad->setTransitoVehicular($valores["transito_vehicular"]);
                $Propiedad->setComunidadesColidantes($valores["comunidades_colidantes"]);
                $Propiedad->setAreasRecreacion($valores["areas_recreacion"]);
                $Propiedad->setDormitorioServicio($valores["dormitorio_servicio"]);
                $Propiedad->setEstudio($valores["estudio"]);
                $Propiedad->setCisterna($valores["cisterna"]);
                $Propiedad->setLavanderia($valores["lavanderia"]);
                $Propiedad->setPrecioNegociable($valores["precio_negociable"]);
                $Propiedad->setFormaPago($valores["forma_pago"]);
                $Propiedad->setGastosEscritura($valores["gastos_escritura"]);
                $Propiedad->save();
                $this->getUser()->setFlash("exito", "Venta creada correctamente.");
                $this->redirect("inicio/index");
            }
        }
    }

    public function executeEditar(sfWebRequest $request) {
        $id = $request->getParameter("id");
        $Propiedad = PropiedadQuery::create()->findOneById($id);
        $defaults = array();
        $defaults["tipo_operacion"] = $Propiedad->getTipoOperacion();
        $defaults["tipo_inmueble"] = $Propiedad->getTipoInmueble();
        $defaults["habitacion"] = $Propiedad->getCantidadHabitacion();
        $defaults["banio"] = $Propiedad->getCantidadBanio();
        $defaults["parqueo"] = $Propiedad->getCantidadParqueo();
        $defaults["comedor"] = $Propiedad->getCantidadComedor();
        $defaults["sala"] = $Propiedad->getCantidadSala();
        $defaults["cocina"] = $Propiedad->getCantidadCocina();
        $defaults["jardin"] = $Propiedad->getCantidadJardin();
        $defaults["patio"] = $Propiedad->getCantidadPatio();
        $defaults["estado"] = $Propiedad->getEstado();
        $defaults["amenidades"] = $Propiedad->getAmenidades();
        $defaults["precio"] = $Propiedad->getPrecio();
        $defaults["anios_construccion"] = $Propiedad->getAnioConstruccion();
        $defaults["mantenimiento_mensual"] = $Propiedad->getMantenimientoMensual();
        $defaults["iusi_trimestral"] = $Propiedad->getIusiSemestral();
        $defaults["valor_avaluo"] = $Propiedad->getValorAvaluo();
        $defaults['mi_comision'] = $Propiedad->getMiComision();
        $defaults["comision_compartida"] = $Propiedad->getComisionCompartida();
        $defaults["nombre_cliente"] = $Propiedad->getNombreCliente();
        $defaults["correo_cliente"] = $Propiedad->getCorreoCliente();
        $defaults["telefono_cliente"] = $Propiedad->getTelefonoCliente();
        $defaults["departamento"] = $Propiedad->getDepartamentoId();
        $defaults["municipio"] = $Propiedad->getMunicipioId();
        $defaults["zona"] = $Propiedad->getZona();
        $defaults["km"] = $Propiedad->getKm();
        $defaults["direccion"] = $Propiedad->getDireccion();
        $defaults["seguridad"] = $Propiedad->getSeguridad();
        $defaults["accesos"] = $Propiedad->getAccesos();
        $defaults["agua"] = $Propiedad->getAgua();
        $defaults["transporte_publico"] = $Propiedad->getTransportePublico();
        $defaults["transito_vehicular"] = $Propiedad->getTransitoVehicular();
        $defaults["comunidades_colidantes"] = $Propiedad->getComunidadesColidantes();
        $defaults["areas_recreacion"] = $Propiedad->getAreasRecreacion();
        $defaults["dormitorio_servicio"] = $Propiedad->getDormitorioServicio();
        $defaults["estudio"] = $Propiedad->getEstudio();
        $defaults["cisterna"] = $Propiedad->getCisterna();
        $defaults["lavanderia"] = $Propiedad->getLavanderia();
        $defaults["precio_negociable"] = $Propiedad->getPrecioNegociable();
        $defaults["forma_pago"] = $Propiedad->getFormaPago();
        $defaults["gastos_escritura"] = $Propiedad->getGastosEscritura();

        $this->formulario_vender = new VenderForm($defaults);
        if ($request->isMethod('POST')) {
            $this->formulario_vender->bind($request->getParameter("vender_form"));
            if ($this->formulario_vender->isValid()) {
                $valores = $this->formulario_vender->getValues();
                $Propiedad->setTipoOperacion($valores["tipo_operacion"]);
                $Propiedad->setTipoInmueble($valores["tipo_inmueble"]);
                $Propiedad->setCantidadHabitacion($valores["habitacion"]);
                $Propiedad->setCantidadBanio($valores["banio"]);
                $Propiedad->setCantidadParqueo($valores["parqueo"]);
                $Propiedad->setCantidadComedor($valores["comedor"]);
                $Propiedad->setCantidadSala($valores["sala"]);
                $Propiedad->setCantidadCocina($valores["cocina"]);
                $Propiedad->setCantidadJardin($valores["jardin"]);
                $Propiedad->setCantidadPatio($valores["patio"]);
                $Propiedad->setEstado($valores["estado"]);
                $Propiedad->setAmenidades($valores["amenidades"]);
                $Propiedad->setPrecio($valores["precio"]);
                $Propiedad->setAnioConstruccion($valores["anios_construccion"]);
                $Propiedad->setMantenimientoMensual($valores["mantenimiento_mensual"]);
                $Propiedad->setIusiSemestral($valores["iusi_trimestral"]);
                $Propiedad->setValorAvaluo($valores["valor_avaluo"]);
                $Propiedad->setMiComision($valores['mi_comision']);
                $Propiedad->setComisionCompartida($valores["comision_compartida"]);
                $Propiedad->setNombreCliente($valores["nombre_cliente"]);
                $Propiedad->setCorreoCliente($valores["correo_cliente"]);
                $Propiedad->setTelefonoCliente($valores["telefono_cliente"]);
                $Propiedad->setDepartamentoId($valores["departamento"]);
                $Propiedad->setMunicipioId($valores["municipio"]);
                $Propiedad->setZona($valores["zona"]);
                $Propiedad->setKm($valores["km"]);
                $Propiedad->setDireccion($valores["direccion"]);
                $Propiedad->setSeguridad($valores["seguridad"]);
                $Propiedad->setAccesos($valores["accesos"]);
                $Propiedad->setAgua($valores["agua"]);
                $Propiedad->setTransportePublico($valores["transporte_publico"]);
                $Propiedad->setTransitoVehicular($valores["transito_vehicular"]);
                $Propiedad->setComunidadesColidantes($valores["comunidades_colidantes"]);
                $Propiedad->setAreasRecreacion($valores["areas_recreacion"]);
                $Propiedad->setDormitorioServicio($valores["dormitorio_servicio"]);
                $Propiedad->setEstudio($valores["estudio"]);
                $Propiedad->setCisterna($valores["cisterna"]);
                $Propiedad->setLavanderia($valores["lavanderia"]);
                $Propiedad->setPrecioNegociable($valores["precio_negociable"]);
                $Propiedad->setFormaPago($valores["forma_pago"]);
                $Propiedad->setGastosEscritura($valores["gastos_escritura"]);
                $Propiedad->save();
                $this->getUser()->setFlash("exito", "Venta editada correctamente.");
                $this->redirect("inicio/index");
            }
        }
        $this->id = $id;
    }

}
