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

    public function executeIndex(sfWebRequest $request) {
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $this->propiedades = PropiedadQuery::create()
                ->filterByUsuarioId($usuario_id)
                ->where("estatus !=  'Eliminado'")
                ->find();
    }

    public function executeVisualizar(sfWebRequest $request) {
        $id = $request->getParameter("id");
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $propiedad = PropiedadQuery::create()
                ->filterById($id)
//                ->filterByUsuarioId($usuario_id)
                ->findOne();
        if (!$propiedad) {
            $this->getUser()->setFlash('error', "Propiedad no encontrada");
            $this->redirect("vender/index");
        }
        $this->propiedad = $propiedad;
    }

    public function executeCompartir(sfWebRequest $request) {
        $id = $request->getParameter("id");
        if (sfContext::getInstance()->getUser()->isAuthenticated()) {
            $this->redirect("vender/visualizar?id=" . $id);
        }
//        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $propiedad = PropiedadQuery::create()
                ->filterById($id)
//                ->filterByUsuarioId($usuario_id)
                ->findOne();
        if (!$propiedad) {
            $this->getUser()->setFlash('error', "Propiedad no encontrada");
            $this->redirect("vender/index");
        }
        $this->propiedad = $propiedad;
    }

    public function executeEliminar(sfWebRequest $request) {
        $id = $request->getParameter("id");
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $propiedad = PropiedadQuery::create()
                ->filterById($id)
                ->filterByUsuarioId($usuario_id)
                ->findOne();
        if ($propiedad) {
            PropiedadImagenQuery::create()->findByPropiedadId($id)->delete();
            PropiedadQuery::create()->findById($id)->delete();
            $this->getUser()->setFlash("exito", "Propiedad eliminado con exito.");
        } else {
            $this->getUser()->setFlash('error', "Propiedad no encontrada");
        }

        $this->redirect("vender/index");
    }

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
        $defaults["oficina"] = "0";
        $defaults["mi_comision"] = "5";
        $defaults["comision_compartida"] = "50";
        $defaults["cubiculo"] = "0";
        $this->formulario_vender = new VenderForm($defaults);
        if ($request->isMethod('POST')) {
            $this->formulario_vender->bind($request->getParameter("vender_form"), $request->getFiles("vender_form"));
            if ($this->formulario_vender->isValid()) {
                $valores = $this->formulario_vender->getValues();
                if ($valores["zona"] == "" && $valores["carretera"] == "") {
                    $this->getUser()->setFlash("error", "Ingrese carretera o zona");
                } else {
                    $Propiedad = new Propiedad();
                    $this->guardaPropiedad($Propiedad, $valores);
                    $this->getUser()->setFlash("exito", "Venta creada correctamente.");
                    $this->redirect("vender/index");
                }
            }
        }
    }

    public function executeEditar(sfWebRequest $request) {
        $id = $request->getParameter("id");
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $Propiedad = PropiedadQuery::create()
                ->filterByUsuarioId($usuario_id)
                ->filterById($id)
                ->findOne();
        if (!$Propiedad) {
            $this->getUser()->setFlash("error", "Propiedad no encontrada");
            $this->redirect("vender/index");
        }
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
        $defaults["precio_negociable"] = $Propiedad->getNegociable();
        $defaults["forma_pago"] = $Propiedad->getFormaPago();
        $defaults["gastos_escritura"] = $Propiedad->getIncluyeGastosEscritura();
        $defaults["carretera"] = $Propiedad->getCarreteraId();
        $defaults["moneda"] = $Propiedad->getMonedaId();
        $defaults["tiene_luz"] = $Propiedad->getTieneLuz();
        $defaults["tiene_agua"] = $Propiedad->getTieneAgua();
        $defaults["niveles"] = $Propiedad->getNiveles();
        $defaults["area"] = $Propiedad->getArea();
        $defaults["area_x"] = $Propiedad->getAreaX();
        $defaults["area_y"] = $Propiedad->getAreaY();
        $defaults["oficina"] = $Propiedad->getCantidadOficina();
        $defaults["cubiculo"] = $Propiedad->getCantidadCubiculo();
        $defaults["contrato"] = $Propiedad->getContrato();
        $defaults["mantenimiento_renta"] = $Propiedad->getMantenimientoRenta();
        $this->formulario_vender = new VenderForm($defaults);
        if ($request->isMethod('POST')) {
            $this->formulario_vender->bind($request->getParameter("vender_form"), $request->getFiles("vender_form"));
            if ($this->formulario_vender->isValid()) {
                $valores = $this->formulario_vender->getValues();
                if ($valores["zona"] == "" && $valores["carretera"] == "") {
                    $this->getUser()->setFlash("error", "Ingrese carretera o zona");
                } else {
                    $this->guardaPropiedad($Propiedad, $valores);
                    $this->getUser()->setFlash("exito", "Venta editada correctamente.");
                    $this->redirect("vender/index");
                }
            }
        }
        $this->id = $id;
        $this->Propiedad = $Propiedad;
    }

    public function executeEliminarImagen(sfRequest $request) {
        $id = $request->getParameter("id");
        $PropiedadImagen = PropiedadImagenQuery::create()->findOneById($id);
        $id_pro = $PropiedadImagen->getPropiedadId();
        $PropiedadImagen->delete();
        $this->redirect("vender/editar?id=" . $id_pro);
    }

    public function guardaPropiedad($Propiedad, $valores) {
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
        $Propiedad->setContrato($valores["contrato"]);
        $Propiedad->setMantenimientoRenta($valores["mantenimiento_renta"]);
        $Propiedad->setPrecio($valores["precio"]);
        $Propiedad->setAnioConstruccion($valores["anios_construccion"]);
        $Propiedad->setMantenimientoMensual($valores["mantenimiento_mensual"]);
        $Propiedad->setIusiSemestral($valores["iusi_trimestral"]);
        $Propiedad->setValorAvaluo($valores["valor_avaluo"]);
        $Propiedad->setMiComision($valores['mi_comision']);
        if ($valores['carretera']) {
            $Propiedad->setCarreteraId($valores['carretera']);
        } else {
            $Propiedad->setCarreteraId(null);
        }
        $Propiedad->setMonedaId($valores['moneda']);
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
        $Propiedad->setNegociable($valores["precio_negociable"]);
        $Propiedad->setFormaPago($valores["forma_pago"]);
        $Propiedad->setIncluyeGastosEscritura($valores["gastos_escritura"]);
        $Propiedad->setTieneLuz($valores["tiene_luz"]);
        $Propiedad->setTieneAgua($valores["tiene_agua"]);
        $Propiedad->setNiveles($valores["niveles"]);
        $Propiedad->setArea($valores["area"]);
        $Propiedad->setAreaX($valores["area_x"]);
        $Propiedad->setAreaY($valores["area_y"]);
        $Propiedad->setCantidadCubiculo($valores['cubiculo']);
        $Propiedad->setCantidadOficina($valores["oficina"]);
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $Propiedad->setUsuarioId($usuario_id);
        $Propiedad->save();
        $archivo = $valores["archivo"];
        while (current($archivo)) {
            if ($archivo) {
                $key = key($archivo);
                $nombreOriginal = $key;
                $filename = $archivo[$key];
                $nuevacarga = new PropiedadImagen();
                $nuevacarga->setNombreOriginal($nombreOriginal);
                $nuevacarga->setNombreActual($filename);
                $nuevacarga->setPropiedadId($Propiedad->getId());
                $nuevacarga->save();
            }
            next($archivo);
        }
        Negocio::buscaRequerimiento($Propiedad);
    }

}
