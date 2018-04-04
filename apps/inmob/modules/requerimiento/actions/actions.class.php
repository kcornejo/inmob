<?php

class requerimientoActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $this->requerimientos = RequerimientoQuery::create()
                ->filterByUsuarioId($usuario_id)
                ->where("estatus !=  'Eliminado'")
                ->find();
    }

    public function executeDireccion(sfWebRequest $request) {
        $this->num = $request->getParameter("num");
    }

    public function executeVisualizar(sfWebRequest $request) {
        $id = $request->getParameter("id");
//        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $requerimiento = RequerimientoQuery::create()
                ->filterById($id)
//                ->filterByUsuarioId($usuario_id)
                ->findOne();
        if (!$requerimiento) {
            $this->getUser()->setFlash('error', "Requerimiento no encontrado");
            $this->redirect("requerimiento/index");
        }
        $this->requerimiento = $requerimiento;
    }

    public function executeCompartir(sfWebRequest $request) {
        $id = $request->getParameter("id");
        if (sfContext::getInstance()->getUser()->isAuthenticated()) {
            $this->redirect("requerimiento/visualizar?id=" . $id);
        }

//        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $requerimiento = RequerimientoQuery::create()
                ->filterById($id)
//                ->filterByUsuarioId($usuario_id)
                ->findOne();
        if (!$requerimiento) {
            $this->getUser()->setFlash('error', "Requerimiento no encontrado");
            $this->redirect("requerimiento/index");
        }
        $this->requerimiento = $requerimiento;
    }

    public function executeEliminar(sfWebRequest $request) {
        $id = $request->getParameter("id");
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $Requerimiento = RequerimientoQuery::create()
                ->filterById($id)
                ->filterByUsuarioId($usuario_id)
                ->findOne();
        if (!$Requerimiento) {
            $this->getUser()->setFlash('error', "Requerimiento no encontrado");
            $this->redirect("requerimiento/index");
        }
        DireccionRequerimientoQuery::create()->findByRequerimientoId($id)->delete();
        RequerimientoQuery::create()->findById($id)->delete();
        $this->getUser()->setFlash("exito", "Requerimiento eliminado con exito.");
        $this->redirect("requerimiento/index");
    }

    public function executeEditar(sfWebRequest $request) {
        $id = $request->getParameter("id");
        $cantidad = 1;
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $Requerimiento = RequerimientoQuery::create()
                ->filterById($id)
                ->filterByUsuarioId($usuario_id)
                ->findOne();
        if (!$Requerimiento) {
            $this->getUser()->setFlash('error', "Requerimiento no encontrado");
            $this->redirect("requerimiento/index");
        }
        $defaults = array();
        $defaults["oficina"] = $Requerimiento->getCantidadOficina();
        $defaults["tipo_operacion"] = $Requerimiento->getTipoOperacion();
        $defaults["tipo_inmueble"] = $Requerimiento->getTipoInmueble();
        $defaults["habitacion"] = $Requerimiento->getCantidadHabitacion();
        $defaults["banio"] = $Requerimiento->getCantidadBanio();
        $defaults["parqueo"] = $Requerimiento->getCantidadParqueo();
        $defaults["forma_pago"] = $Requerimiento->getFormaPago();
        $defaults["comedor"] = $Requerimiento->getCantidadComedor();
        $defaults["sala"] = $Requerimiento->getCantidadSala();
        $defaults["cocina"] = $Requerimiento->getCantidadCocina();
        $defaults["jardin"] = $Requerimiento->getCantidadJardin();
        $defaults["patio"] = $Requerimiento->getCantidadPatio();
        $defaults["estado"] = $Requerimiento->getEstado();
        $defaults["amenidades"] = $Requerimiento->getAmenidades();
        $defaults['moneda'] = $Requerimiento->getMonedaId();
        $defaults["presupuesto_min"] = $Requerimiento->getPresupuestoMin();
        $defaults["presupuesto_max"] = $Requerimiento->getPresupuestoMax();
        $defaults["nombre_cliente"] = $Requerimiento->getNombreCliente();
        $defaults["correo_cliente"] = $Requerimiento->getCorreoCliente();
        $defaults["telefono_cliente"] = $Requerimiento->getTelefonoCliente();
        $defaults["dormitorio_servicio"] = $Requerimiento->getDormitorioServicio();
        $defaults["estudio"] = $Requerimiento->getEstudio();
        $defaults["cisterna"] = $Requerimiento->getCisterna();
        $defaults["lavanderia"] = $Requerimiento->getLavanderia();
        $defaults["tiene_luz"] = $Requerimiento->getTieneLuz();
        $defaults["tiene_agua"] = $Requerimiento->getTieneAgua();
        $defaults["niveles"] = $Requerimiento->getNiveles();
        $defaults["area"] = $Requerimiento->getArea();
        $defaults["area_x"] = $Requerimiento->getAreaX();
        $defaults["area_y"] = $Requerimiento->getAreaY();
        $defaults["cubiculo"] = $Requerimiento->getCantidadCubiculo();
        if ($Requerimiento->getPrecalificacion()) {
            $defaults["precalificacion"] = "Si";
        } else {
            $defaults["precalificacion"] = "No";
        }
        $defaults["nucleo_familiar"] = $Requerimiento->getNucleoFamiliar();
//        $defaults["moneda_ingreso"] = $Requerimiento->getMonedaIngreso();
        $defaults["ingresos"] = $Requerimiento->getIngresos();
//        $defaults["moneda_egresos"] = $Requerimiento->getMonedaEgresos();
        $defaults["egresos"] = $Requerimiento->getEgresos();
        $defaults["enganche"] = $Requerimiento->getEnganche();
        $defaults["tasa_interes_anual"] = $Requerimiento->getTasaInteresAnual();
        $defaults["plazo_en_anios"] = $Requerimiento->getPlazoEnAnios();
        $defaults["plazo_en_meses"] = $Requerimiento->getPlazoEnMeses();
        $defaults["monto_financiar_maximo"] = $Requerimiento->getMontoFinanciarMaximo();
        $defaults["cuota_total_mensual_maxima"] = $Requerimiento->getCuotaTotalMensualMaxima();
        foreach ($Requerimiento->getDireccionRequerimientos() as $fila) {
            $defaults["departamento"] = $fila->getDepartamentoId();
            $defaults["municipio"] = $fila->getMunicipioId();
            $defaults["zona"] = $fila->getZona();
            $defaults["km"] = $fila->getKm();
            $defaults['carretera'] = $fila->getCarreteraId();
            $defaults["direccion"] = $fila->getDireccion();
            break;
        }
        if ($request->isMethod('POST')) {
            foreach ($request->getParameter("nuevo_requerimiento") as $llave => $fila) {
                $llave_array = explode("_", $llave);
                if ($llave_array[0] == "direccion" && key_exists(1, $llave_array)) {
                    $busqueda_array[$llave_array[1]] = $llave_array[1];
                }
            }
        } else {
            $cantidad = sizeof($Requerimiento->getDireccionRequerimientos());
            $busqueda_array = array();
            for ($i = 1; $i < $cantidad; $i++) {
                $busqueda_array[$i + 1] = $i + 1;
            }
            $defaults["cantidad"] = $cantidad;
            $paso = false;
            $cantidad = 1;
            foreach ($Requerimiento->getDireccionRequerimientos() as $fila) {
                if ($paso) {
                    $defaults["departamento_" . $cantidad] = $fila->getDepartamentoId();
                    $defaults["municipio_" . $cantidad] = $fila->getMunicipioId();
                    $defaults["zona_" . $cantidad] = $fila->getZona();
                    $defaults["km_" . $cantidad] = $fila->getKm();
                    $defaults["carretera_" . $cantidad] = $fila->getCarreteraId();
                    $defaults["direccion_" . $cantidad] = $fila->getDireccion();
                }
                $cantidad++;
                $paso = true;
            }
        }
        $this->getUser()->setAttribute("busqueda", serialize($busqueda_array), "valores");
        $this->formulario = new RequerimientoForm($defaults);
        if ($request->isMethod('POST')) {
            $this->formulario->bind($request->getParameter("nuevo_requerimiento"));
            if ($this->formulario->isValid()) {
                $valores = $this->formulario->getValues();
                $valido = true;
                if ($valores["zona"] == "" && $valores["carretera"] == "") {
                    $valido = false;
                }
                if ($valido) {
                    foreach ($valores as $llave => $fila) {
                        $llave_array = explode("_", $llave);
                        if ($llave_array[0] == "direccion" && key_exists(1, $llave_array)) {
                            $busqueda_array[$llave_array[1]] = $llave_array[1];
                        }
                    }
                    foreach ($busqueda_array as $fila) {
                        if ($valores["zona_" . $fila] == "" && $valores["carretera_" . $fila] == "") {
                            $valido = false;
                            break;
                        }
                    }
                }
                if ($valido) {
                    $this->guardaRequerimiento($valores, $Requerimiento);
                    $this->getUser()->setFlash("exito", "Requerimiento creado con exito.");
                    $this->redirect("requerimiento/index");
                } else {
                    $this->getUser()->setFlash("error", "Ingrese carretera o zona en las direcciones ingresadas");
                }
            }
        }
        $this->id = $id;
        $this->cantidad = $cantidad;
    }

    public function executeNueva(sfWebRequest $request) {
        $defaults = array();
        $defaults["cantidad"] = 1;
        $defaults["habitacion"] = "0";
        $defaults["banio"] = "0";
        $defaults["parqueo"] = "0";
        $defaults["comedor"] = "0";
        $defaults["sala"] = "0";
        $defaults["cocina"] = "0";
        $defaults["oficina"] = "0";
        $defaults["jardin"] = "0";
        $defaults["patio"] = "0";
        $defaults["ingresos"] = "0";
        $defaults["egresos"] = "0";
        $defaults["enganche"] = "0";
        $defaults["precalificacion"] = "No";
        $defaults["tasa_interes_anual"] = "0";
        $defaults["plazo_en_anios"] = "0";
        $busqueda_array = array();
        if ($request->isMethod('POST')) {
            foreach ($request->getParameter("nuevo_requerimiento") as $llave => $fila) {
                $llave_array = explode("_", $llave);
                if ($llave_array[0] == "direccion" && key_exists(1, $llave_array)) {
                    $busqueda_array[$llave_array[1]] = $llave_array[1];
                }
            }
        }
        $this->getUser()->setAttribute("busqueda", serialize($busqueda_array), "valores");
        $this->formulario = new RequerimientoForm($defaults);
        if ($request->isMethod('POST')) {
            $this->formulario->bind($request->getParameter("nuevo_requerimiento"));
            if ($this->formulario->isValid()) {
                $valores = $this->formulario->getValues();
                $valido = true;
                if ($valores["zona"] == "" && $valores["carretera"] == "") {
                    $valido = false;
                }
                if ($valido) {
                    foreach ($valores as $llave => $fila) {
                        $llave_array = explode("_", $llave);
                        if ($llave_array[0] == "direccion" && key_exists(1, $llave_array)) {
                            $busqueda_array[$llave_array[1]] = $llave_array[1];
                        }
                    }
                    foreach ($busqueda_array as $fila) {
                        if ($valores["zona_" . $fila] == "" && $valores["carretera_" . $fila] == "") {
                            $valido = false;
                            break;
                        }
                    }
                }
                if ($valido) {
                    $Requerimiento = new Requerimiento();
                    $this->guardaRequerimiento($valores, $Requerimiento);
                    $this->getUser()->setFlash("exito", "Requerimiento creado con exito.");
                    $this->redirect("requerimiento/index");
                } else {
                    $this->getUser()->setFlash("error", "Ingrese carretera o zona en las direcciones ingresadas");
                }
            }
        }
    }

    public function guardaRequerimiento($valores, $Requerimiento) {
        $Requerimiento->setTipoOperacion($valores["tipo_operacion"]);
        $Requerimiento->setTipoInmueble($valores["tipo_inmueble"]);
        $Requerimiento->setCantidadHabitacion($valores["habitacion"]);
        $Requerimiento->setCantidadBanio($valores["banio"]);
        $Requerimiento->setCantidadParqueo($valores["parqueo"]);
        $Requerimiento->setCantidadComedor($valores["comedor"]);
        $Requerimiento->setCantidadSala($valores["sala"]);
        $Requerimiento->setCantidadCocina($valores["cocina"]);
        $Requerimiento->setCantidadJardin($valores["jardin"]);
        $Requerimiento->setCantidadPatio($valores["patio"]);
        $Requerimiento->setEstado($valores["estado"]);
        $Requerimiento->setAmenidades($valores["amenidades"]);
        $Requerimiento->setMonedaId($valores['moneda']);
        $Requerimiento->setPresupuestoMin($valores["presupuesto_min"]);
        $Requerimiento->setPresupuestoMax($valores["presupuesto_max"]);

        $Requerimiento->setNombreCliente($valores["nombre_cliente"]);
        $Requerimiento->setCorreoCliente($valores["correo_cliente"]);
        $Requerimiento->setTelefonoCliente($valores["telefono_cliente"]);
        $Requerimiento->setDormitorioServicio($valores["dormitorio_servicio"]);
        $Requerimiento->setEstudio($valores["estudio"]);
        $Requerimiento->setCisterna($valores["cisterna"]);
        $Requerimiento->setLavanderia($valores["lavanderia"]);
        $Requerimiento->setFormaPago($valores["forma_pago"]);
        $Requerimiento->setTieneLuz($valores["tiene_luz"]);
        $Requerimiento->setTieneAgua($valores["tiene_agua"]);
        $Requerimiento->setNiveles($valores["niveles"]);
        $Requerimiento->setArea($valores["area"]);
        $Requerimiento->setAreaX($valores["area_x"]);
        $Requerimiento->setAreaY($valores["area_y"]);
        if ($valores["precalificacion"] == "Si") {
            $Requerimiento->setPrecalificacion(true);
        } else {
            $Requerimiento->setPrecalificacion(false);
        }
        $Requerimiento->setNucleoFamiliar($valores["nucleo_familiar"]);
//        $Requerimiento->setMonedaIngreso($valores["moneda"]);
        $Requerimiento->setIngresos($valores["ingresos"]);
        $Requerimiento->setEgresos($valores["egresos"]);
        $Requerimiento->setEnganche($valores["enganche"]);
        $Requerimiento->setTasaInteresAnual($valores["tasa_interes_anual"]);
        $Requerimiento->setPlazoEnAnios($valores["plazo_en_anios"]);
        $Requerimiento->setPlazoEnMeses($valores["plazo_en_meses"]);
        $Requerimiento->setMontoFinanciarMaximo($valores["monto_financiar_maximo"]);
        $Requerimiento->setCantidadOficina($valores['oficina']);
        $Requerimiento->setCuotaTotalMensualMaxima($valores["cuota_total_mensual_maxima"]);
        $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
        $Requerimiento->setUsuarioId($usuario_id);
        $Requerimiento->setCantidadCubiculo($valores['cubiculo']);
        $Requerimiento->save();
        DireccionRequerimientoQuery::create()->findByRequerimientoId($Requerimiento->getId())->delete();
        $DireccionRequerimiento = new DireccionRequerimiento();
        $DireccionRequerimiento->setDepartamentoId($valores["departamento"]);
        $DireccionRequerimiento->setMunicipioId($valores["municipio"]);
        $DireccionRequerimiento->setZona($valores["zona"]);
        $DireccionRequerimiento->setKm($valores["km"]);
        if ($valores['carretera']) {
            $DireccionRequerimiento->setCarreteraId($valores['carretera']);
        } else {
            $DireccionRequerimiento->setCarreteraId(null);
        }
        $DireccionRequerimiento->setDireccion($valores["direccion"]);
        $DireccionRequerimiento->setRequerimientoId($Requerimiento->getId());
        $DireccionRequerimiento->save();
        $busqueda_array = array();
        foreach ($valores as $llave => $fila) {
            $llave_array = explode("_", $llave);
            if ($llave_array[0] == "direccion" && key_exists(1, $llave_array)) {
                $busqueda_array[$llave_array[1]] = $llave_array[1];
            }
        }
        foreach ($busqueda_array as $fila) {
            $DireccionRequerimiento = new DireccionRequerimiento();
            $DireccionRequerimiento->setDepartamentoId($valores["departamento_" . $fila]);
            $DireccionRequerimiento->setMunicipioId($valores["municipio_" . $fila]);
            $DireccionRequerimiento->setZona($valores["zona_" . $fila]);
            $DireccionRequerimiento->setKm($valores["km_" . $fila]);
            if ($valores['carretera_' . $fila]) {
                $DireccionRequerimiento->setCarreteraId($valores['carretera_' . $fila]);
            }
            $DireccionRequerimiento->setDireccion($valores["direccion_" . $fila]);
            $DireccionRequerimiento->setRequerimientoId($Requerimiento->getId());
            $DireccionRequerimiento->save();
        }
        Negocio::buscaPropiedad($Requerimiento);
    }

}
