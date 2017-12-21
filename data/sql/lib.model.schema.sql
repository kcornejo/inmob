
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- usuario
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario` VARCHAR(32) NOT NULL,
    `clave` VARCHAR(60),
    `nombre_completo` VARCHAR(250) NOT NULL,
    `administrador` TINYINT(1) DEFAULT 0,
    `reintento_incorrecto` INTEGER DEFAULT 0,
    `ultimo_ingreso` DATE,
    `tipo_usuario_id` INTEGER,
    `bloqueado` TINYINT(1) DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    PRIMARY KEY (`id`),
    INDEX `usuario_FI_1` (`tipo_usuario_id`),
    CONSTRAINT `usuario_FK_1`
        FOREIGN KEY (`tipo_usuario_id`)
        REFERENCES `tipo_usuario` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- pais
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `pais`;

CREATE TABLE `pais`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `principal` TINYINT(1) DEFAULT 0,
    `codigo_iso` VARCHAR(32),
    `nombre` VARCHAR(260) NOT NULL,
    `activo` TINYINT(1) DEFAULT 1,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `observaciones` TEXT,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- moneda
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `moneda`;

CREATE TABLE `moneda`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `principal` TINYINT(1) DEFAULT 0,
    `codigo_iso` VARCHAR(32),
    `nombre` VARCHAR(260) NOT NULL,
    `activo` TINYINT(1) DEFAULT 1,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `observaciones` TEXT,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- empresa
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `empresa`;

CREATE TABLE `empresa`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `representante` VARCHAR(160),
    `gerente` VARCHAR(160),
    `codigo` VARCHAR(32),
    `nombre` VARCHAR(260) NOT NULL,
    `direccion` VARCHAR(60),
    `telefono` VARCHAR(60),
    `correo_electronico_contacto` VARCHAR(60),
    `contacto` VARCHAR(60),
    `tipo_servicio` VARCHAR(60),
    `nit` VARCHAR(60),
    `resolucion` VARCHAR(60),
    `razon_social` VARCHAR(60),
    `referencia` VARCHAR(60),
    `web_social` VARCHAR(200),
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `eslogan` VARCHAR(200),
    `observaciones` TEXT,
    `visiom` TEXT,
    `mision` TEXT,
    `historia` TEXT,
    `corre_electronico` VARCHAR(60),
    `clave_electronico` VARCHAR(60),
    `activo` TINYINT(1) DEFAULT 1,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- categoria_usuario
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `categoria_usuario`;

CREATE TABLE `categoria_usuario`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario_id` INTEGER,
    `categoria_producto_id` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `categoria_usuario_FI_1` (`usuario_id`),
    INDEX `categoria_usuario_FI_2` (`categoria_producto_id`),
    CONSTRAINT `categoria_usuario_FK_1`
        FOREIGN KEY (`usuario_id`)
        REFERENCES `usuario` (`id`),
    CONSTRAINT `categoria_usuario_FK_2`
        FOREIGN KEY (`categoria_producto_id`)
        REFERENCES `categoria_producto` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- categoria_producto
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `categoria_producto`;

CREATE TABLE `categoria_producto`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `codigo` VARCHAR(32),
    `nombre` VARCHAR(260) NOT NULL,
    `observaciones` TEXT,
    `activo` TINYINT(1) DEFAULT 1,
    `cantidad_alerta_minimo` INTEGER,
    `alerta_minimo` TINYINT(1) DEFAULT 0,
    `claves_busqueda` VARCHAR(500),
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `empresa_id` INTEGER,
    `comision_vendedor` DOUBLE,
    PRIMARY KEY (`id`),
    INDEX `categoria_producto_FI_1` (`empresa_id`),
    CONSTRAINT `categoria_producto_FK_1`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- producto
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `comision_vendedor` DOUBLE,
    `nombre` VARCHAR(260) NOT NULL,
    `claves_busqueda` VARCHAR(500),
    `categoria_producto_id` INTEGER,
    `cantidad_alerta_minimo` INTEGER,
    `notifica_movimiento` INTEGER,
    `codigo_erp` VARCHAR(32),
    `codigo` VARCHAR(32),
    `observaciones` TEXT,
    `empresa_id` INTEGER,
    `activo` TINYINT(1) DEFAULT 1,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `dias_garantia` INTEGER,
    `codigo_barras` VARCHAR(32),
    `es_repuesto` TINYINT(1) DEFAULT 1,
    PRIMARY KEY (`id`),
    INDEX `producto_FI_1` (`categoria_producto_id`),
    INDEX `producto_FI_2` (`empresa_id`),
    CONSTRAINT `producto_FK_1`
        FOREIGN KEY (`categoria_producto_id`)
        REFERENCES `categoria_producto` (`id`),
    CONSTRAINT `producto_FK_2`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- producto_existencia
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `producto_existencia`;

CREATE TABLE `producto_existencia`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `empresa_id` INTEGER,
    `producto_id` INTEGER,
    `fecha` DATETIME,
    `cantidad` INTEGER,
    `bodega_id` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `producto_existencia_FI_1` (`empresa_id`),
    INDEX `producto_existencia_FI_2` (`producto_id`),
    INDEX `producto_existencia_FI_3` (`bodega_id`),
    CONSTRAINT `producto_existencia_FK_1`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`),
    CONSTRAINT `producto_existencia_FK_2`
        FOREIGN KEY (`producto_id`)
        REFERENCES `producto` (`id`),
    CONSTRAINT `producto_existencia_FK_3`
        FOREIGN KEY (`bodega_id`)
        REFERENCES `bodega` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- combo_producto
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `combo_producto`;

CREATE TABLE `combo_producto`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `descripcion` VARCHAR(32),
    `codigo` VARCHAR(32),
    `observaciones` TEXT,
    `empresa_id` INTEGER,
    `activo` TINYINT(1) DEFAULT 1,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `combo_producto_FI_1` (`empresa_id`),
    CONSTRAINT `combo_producto_FK_1`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- combo_producto_detalle
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `combo_producto_detalle`;

CREATE TABLE `combo_producto_detalle`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `producto_id` INTEGER,
    `empresa_id` INTEGER,
    `cantidad_producto` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `combo_producto_detalle_FI_1` (`producto_id`),
    INDEX `combo_producto_detalle_FI_2` (`empresa_id`),
    CONSTRAINT `combo_producto_detalle_FK_1`
        FOREIGN KEY (`producto_id`)
        REFERENCES `producto` (`id`),
    CONSTRAINT `combo_producto_detalle_FK_2`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tipo_bodega
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tipo_bodega`;

CREATE TABLE `tipo_bodega`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `empresa_id` INTEGER,
    `codigo` VARCHAR(32),
    `nombre` VARCHAR(260) NOT NULL,
    `activo` TINYINT(1) DEFAULT 1,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `tipo_bodega_FI_1` (`empresa_id`),
    CONSTRAINT `tipo_bodega_FK_1`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- bodega
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bodega`;

CREATE TABLE `bodega`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `empresa_id` INTEGER,
    `codigo` VARCHAR(32),
    `nombre` VARCHAR(260) NOT NULL,
    `direccion` VARCHAR(60),
    `telefono` VARCHAR(60),
    `contacto` VARCHAR(60),
    `encargado` VARCHAR(60),
    `observaciones` TEXT,
    `referencia` VARCHAR(60),
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `principal` TINYINT(1) DEFAULT 0,
    `tipo_bodega_id` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `bodega_FI_1` (`empresa_id`),
    INDEX `bodega_FI_2` (`tipo_bodega_id`),
    CONSTRAINT `bodega_FK_1`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`),
    CONSTRAINT `bodega_FK_2`
        FOREIGN KEY (`tipo_bodega_id`)
        REFERENCES `tipo_bodega` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- region
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `region`;

CREATE TABLE `region`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `empresa_id` INTEGER,
    `principal` TINYINT(1) DEFAULT 0,
    `codigo` VARCHAR(32),
    `nombre` VARCHAR(260) NOT NULL,
    `activo` TINYINT(1) DEFAULT 1,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `observaciones` TEXT,
    PRIMARY KEY (`id`),
    INDEX `region_FI_1` (`empresa_id`),
    CONSTRAINT `region_FK_1`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- region_detalle
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `region_detalle`;

CREATE TABLE `region_detalle`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `region_id` INTEGER,
    `nombre` VARCHAR(260) NOT NULL,
    `activo` TINYINT(1) DEFAULT 1,
    PRIMARY KEY (`id`),
    INDEX `region_detalle_FI_1` (`region_id`),
    CONSTRAINT `region_detalle_FK_1`
        FOREIGN KEY (`region_id`)
        REFERENCES `region` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- cargo_servicio
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cargo_servicio`;

CREATE TABLE `cargo_servicio`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `empresa_id` INTEGER,
    `codigo` VARCHAR(32),
    `nombre` VARCHAR(260) NOT NULL,
    `valor_fijo` DOUBLE DEFAULT 0,
    `valor_porcentaje` VARCHAR(10) DEFAULT '0',
    `tipo` VARCHAR(32),
    `region_id` INTEGER,
    `observaciones` TEXT,
    `activo` TINYINT(1) DEFAULT 1,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `cargo_servicio_FI_1` (`empresa_id`),
    INDEX `cargo_servicio_FI_2` (`region_id`),
    CONSTRAINT `cargo_servicio_FK_1`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`),
    CONSTRAINT `cargo_servicio_FK_2`
        FOREIGN KEY (`region_id`)
        REFERENCES `region` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- lista_precio
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `lista_precio`;

CREATE TABLE `lista_precio`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `empresa_id` INTEGER,
    `codigo` VARCHAR(32),
    `nombre` VARCHAR(260) NOT NULL,
    `activo` TINYINT(1) DEFAULT 1,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `lista_precio_FI_1` (`empresa_id`),
    CONSTRAINT `lista_precio_FK_1`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- carga_lista_precio_encabezado
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `carga_lista_precio_encabezado`;

CREATE TABLE `carga_lista_precio_encabezado`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `empresa_id` INTEGER,
    `nombre` VARCHAR(260) NOT NULL,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `bitacora_archivo_id` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `carga_lista_precio_encabezado_FI_1` (`empresa_id`),
    INDEX `carga_lista_precio_encabezado_FI_2` (`bitacora_archivo_id`),
    CONSTRAINT `carga_lista_precio_encabezado_FK_1`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`),
    CONSTRAINT `carga_lista_precio_encabezado_FK_2`
        FOREIGN KEY (`bitacora_archivo_id`)
        REFERENCES `bitacora_archivo` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- carga_lista_precio_detalle
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `carga_lista_precio_detalle`;

CREATE TABLE `carga_lista_precio_detalle`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `lista_precio_id` INTEGER,
    `valor` DOUBLE,
    `moneda_id` INTEGER,
    `producto_id` INTEGER,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `empresa_id` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `carga_lista_precio_detalle_FI_1` (`lista_precio_id`),
    INDEX `carga_lista_precio_detalle_FI_2` (`moneda_id`),
    INDEX `carga_lista_precio_detalle_FI_3` (`producto_id`),
    INDEX `carga_lista_precio_detalle_FI_4` (`empresa_id`),
    CONSTRAINT `carga_lista_precio_detalle_FK_1`
        FOREIGN KEY (`lista_precio_id`)
        REFERENCES `lista_precio` (`id`),
    CONSTRAINT `carga_lista_precio_detalle_FK_2`
        FOREIGN KEY (`moneda_id`)
        REFERENCES `moneda` (`id`),
    CONSTRAINT `carga_lista_precio_detalle_FK_3`
        FOREIGN KEY (`producto_id`)
        REFERENCES `producto` (`id`),
    CONSTRAINT `carga_lista_precio_detalle_FK_4`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- bitacora_archivo
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bitacora_archivo`;

CREATE TABLE `bitacora_archivo`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(260) NOT NULL,
    `nombre_original` VARCHAR(260),
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `empresa_id` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `bitacora_archivo_FI_1` (`empresa_id`),
    CONSTRAINT `bitacora_archivo_FK_1`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- precio_producto
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `precio_producto`;

CREATE TABLE `precio_producto`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `producto_id` INTEGER,
    `lista_precio_id` INTEGER,
    `moneda_id` INTEGER,
    `activo` TINYINT(1) DEFAULT 1,
    `valor` DOUBLE,
    `ultima_actualizacion` DATE,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `precio_producto_FI_1` (`producto_id`),
    INDEX `precio_producto_FI_2` (`lista_precio_id`),
    INDEX `precio_producto_FI_3` (`moneda_id`),
    CONSTRAINT `precio_producto_FK_1`
        FOREIGN KEY (`producto_id`)
        REFERENCES `producto` (`id`),
    CONSTRAINT `precio_producto_FK_2`
        FOREIGN KEY (`lista_precio_id`)
        REFERENCES `lista_precio` (`id`),
    CONSTRAINT `precio_producto_FK_3`
        FOREIGN KEY (`moneda_id`)
        REFERENCES `moneda` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tipo_descuento
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tipo_descuento`;

CREATE TABLE `tipo_descuento`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `valor_fijo` DOUBLE DEFAULT 0,
    `valor_porcentaje` VARCHAR(10) DEFAULT '0',
    `codigo` VARCHAR(32),
    `nombre` VARCHAR(260) NOT NULL,
    `activo` TINYINT(1) DEFAULT 1,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tipo_cliente
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tipo_cliente`;

CREATE TABLE `tipo_cliente`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `empresa_id` INTEGER,
    `codigo` VARCHAR(32),
    `nombre` VARCHAR(260) NOT NULL,
    `activo` TINYINT(1) DEFAULT 1,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `tipo_cliente_FI_1` (`empresa_id`),
    CONSTRAINT `tipo_cliente_FK_1`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- cliente
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `tipo_cliente_id` INTEGER,
    `empresa_id` INTEGER,
    `lista_precio_id` INTEGER,
    `codigo` VARCHAR(32),
    `tipo_documento_identificacion` VARCHAR(20),
    `no_documento_identificacion` VARCHAR(200),
    `nit` VARCHAR(60),
    `referencia` VARCHAR(32),
    `nombre` VARCHAR(260) NOT NULL,
    `apellido` VARCHAR(260) NOT NULL,
    `direccion` VARCHAR(60),
    `telefono` VARCHAR(20),
    `telefono_secundario` VARCHAR(20),
    `correo_electronico` VARCHAR(60),
    `contacto` VARCHAR(60),
    `observaciones` TEXT,
    `limite_credito` DOUBLE,
    `dias_credito` INTEGER,
    `ultima_compra` DATE,
    `referido_id` INTEGER,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `departamento_id` INTEGER,
    `empresa_cliente` VARCHAR(320),
    `pais_id` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `cliente_FI_1` (`tipo_cliente_id`),
    INDEX `cliente_FI_2` (`empresa_id`),
    INDEX `cliente_FI_3` (`lista_precio_id`),
    INDEX `cliente_FI_4` (`referido_id`),
    INDEX `cliente_FI_5` (`departamento_id`),
    INDEX `cliente_FI_6` (`pais_id`),
    CONSTRAINT `cliente_FK_1`
        FOREIGN KEY (`tipo_cliente_id`)
        REFERENCES `tipo_cliente` (`id`),
    CONSTRAINT `cliente_FK_2`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`),
    CONSTRAINT `cliente_FK_3`
        FOREIGN KEY (`lista_precio_id`)
        REFERENCES `lista_precio` (`id`),
    CONSTRAINT `cliente_FK_4`
        FOREIGN KEY (`referido_id`)
        REFERENCES `referido` (`id`),
    CONSTRAINT `cliente_FK_5`
        FOREIGN KEY (`departamento_id`)
        REFERENCES `departamento` (`id`),
    CONSTRAINT `cliente_FK_6`
        FOREIGN KEY (`pais_id`)
        REFERENCES `pais` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tipo_movimiento
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tipo_movimiento`;

CREATE TABLE `tipo_movimiento`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `empresa_id` INTEGER,
    `codigo` VARCHAR(32),
    `nombre` VARCHAR(260) NOT NULL,
    `activo` TINYINT(1) DEFAULT 1,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `tipo_movimiento_FI_1` (`empresa_id`),
    CONSTRAINT `tipo_movimiento_FK_1`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- proveedor
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `proveedor`;

CREATE TABLE `proveedor`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `empresa_id` INTEGER,
    `codigo` VARCHAR(32),
    `nombre` VARCHAR(260) NOT NULL,
    `direccion` VARCHAR(60),
    `observaciones` TEXT,
    `telefono` VARCHAR(60),
    `correo_electronico` VARCHAR(60),
    `contacto` VARCHAR(60),
    `nit` VARCHAR(60),
    `dias_credito` INTEGER,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `proveedor_FI_1` (`empresa_id`),
    CONSTRAINT `proveedor_FK_1`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- inventario_producto
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `inventario_producto`;

CREATE TABLE `inventario_producto`
(
    `empresa_id` INTEGER,
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `codigo` VARCHAR(100),
    `descripcion` VARCHAR(200) NOT NULL,
    `fecha` DATETIME,
    `observaciones` TEXT,
    `activo` TINYINT(1) DEFAULT 1,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `estatus` VARCHAR(32),
    PRIMARY KEY (`id`),
    INDEX `inventario_producto_FI_1` (`empresa_id`),
    CONSTRAINT `inventario_producto_FK_1`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- inventario_producto_detalle
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `inventario_producto_detalle`;

CREATE TABLE `inventario_producto_detalle`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `inventario_producto_id` INTEGER,
    `producto_id` INTEGER,
    `combo_producto_id` INTEGER,
    `cantidad` INTEGER,
    `empresa_id` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `inventario_producto_detalle_FI_1` (`inventario_producto_id`),
    INDEX `inventario_producto_detalle_FI_2` (`producto_id`),
    INDEX `inventario_producto_detalle_FI_3` (`combo_producto_id`),
    INDEX `inventario_producto_detalle_FI_4` (`empresa_id`),
    CONSTRAINT `inventario_producto_detalle_FK_1`
        FOREIGN KEY (`inventario_producto_id`)
        REFERENCES `inventario_producto` (`id`),
    CONSTRAINT `inventario_producto_detalle_FK_2`
        FOREIGN KEY (`producto_id`)
        REFERENCES `producto` (`id`),
    CONSTRAINT `inventario_producto_detalle_FK_3`
        FOREIGN KEY (`combo_producto_id`)
        REFERENCES `combo_producto` (`id`),
    CONSTRAINT `inventario_producto_detalle_FK_4`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- movimiento_producto
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `movimiento_producto`;

CREATE TABLE `movimiento_producto`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `empresa_id` INTEGER,
    `estatus` VARCHAR(100),
    `cliente_id` INTEGER,
    `proveedor_id` INTEGER,
    `tipo_movimiento_id` INTEGER,
    `tipo` VARCHAR(100),
    `codigo` VARCHAR(100),
    `descripcion` VARCHAR(200) NOT NULL,
    `fecha` DATETIME,
    `observaciones` TEXT,
    `activo` TINYINT(1) DEFAULT 1,
    `valor_signo` VARCHAR(5),
    PRIMARY KEY (`id`),
    INDEX `movimiento_producto_FI_1` (`empresa_id`),
    INDEX `movimiento_producto_FI_2` (`cliente_id`),
    INDEX `movimiento_producto_FI_3` (`proveedor_id`),
    INDEX `movimiento_producto_FI_4` (`tipo_movimiento_id`),
    CONSTRAINT `movimiento_producto_FK_1`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`),
    CONSTRAINT `movimiento_producto_FK_2`
        FOREIGN KEY (`cliente_id`)
        REFERENCES `cliente` (`id`),
    CONSTRAINT `movimiento_producto_FK_3`
        FOREIGN KEY (`proveedor_id`)
        REFERENCES `proveedor` (`id`),
    CONSTRAINT `movimiento_producto_FK_4`
        FOREIGN KEY (`tipo_movimiento_id`)
        REFERENCES `tipo_movimiento` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- movimiento_producto_detalle
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `movimiento_producto_detalle`;

CREATE TABLE `movimiento_producto_detalle`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `inventario_producto_id` INTEGER,
    `movimiento_producto_id` INTEGER,
    `producto_id` INTEGER,
    `combo_producto_id` INTEGER,
    `cantidad` INTEGER,
    `valor_signo` VARCHAR(5),
    PRIMARY KEY (`id`),
    INDEX `movimiento_producto_detalle_FI_1` (`inventario_producto_id`),
    INDEX `movimiento_producto_detalle_FI_2` (`movimiento_producto_id`),
    INDEX `movimiento_producto_detalle_FI_3` (`producto_id`),
    INDEX `movimiento_producto_detalle_FI_4` (`combo_producto_id`),
    CONSTRAINT `movimiento_producto_detalle_FK_1`
        FOREIGN KEY (`inventario_producto_id`)
        REFERENCES `inventario_producto` (`id`),
    CONSTRAINT `movimiento_producto_detalle_FK_2`
        FOREIGN KEY (`movimiento_producto_id`)
        REFERENCES `movimiento_producto` (`id`),
    CONSTRAINT `movimiento_producto_detalle_FK_3`
        FOREIGN KEY (`producto_id`)
        REFERENCES `producto` (`id`),
    CONSTRAINT `movimiento_producto_detalle_FK_4`
        FOREIGN KEY (`combo_producto_id`)
        REFERENCES `combo_producto` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- operacion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `operacion`;

CREATE TABLE `operacion`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `empresa_id` INTEGER,
    `cliente_id` INTEGER,
    `nombre` VARCHAR(200),
    `fecha` DATETIME,
    `nit` VARCHAR(100),
    `direccion` VARCHAR(200) NOT NULL,
    `observaciones` TEXT,
    `activo` TINYINT(1) DEFAULT 1,
    `valor_total` DOUBLE,
    `estatus` VARCHAR(300),
    `anulado` TINYINT(1),
    `valor_pagado` DOUBLE,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `operacion_FI_1` (`empresa_id`),
    INDEX `operacion_FI_2` (`cliente_id`),
    CONSTRAINT `operacion_FK_1`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`),
    CONSTRAINT `operacion_FK_2`
        FOREIGN KEY (`cliente_id`)
        REFERENCES `cliente` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- operacion_detalle
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `operacion_detalle`;

CREATE TABLE `operacion_detalle`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `empresa_id` INTEGER,
    `producto_id` INTEGER,
    `combo_producto_id` INTEGER,
    `cantidad` INTEGER,
    `valor` DOUBLE,
    PRIMARY KEY (`id`),
    INDEX `operacion_detalle_FI_1` (`empresa_id`),
    INDEX `operacion_detalle_FI_2` (`producto_id`),
    INDEX `operacion_detalle_FI_3` (`combo_producto_id`),
    CONSTRAINT `operacion_detalle_FK_1`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`),
    CONSTRAINT `operacion_detalle_FK_2`
        FOREIGN KEY (`producto_id`)
        REFERENCES `producto` (`id`),
    CONSTRAINT `operacion_detalle_FK_3`
        FOREIGN KEY (`combo_producto_id`)
        REFERENCES `combo_producto` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- garantia_producto
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `garantia_producto`;

CREATE TABLE `garantia_producto`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `empresa_id` INTEGER,
    `cliente_id` INTEGER,
    `producto_id` INTEGER,
    `fecha_inicio` DATETIME,
    `fecha_fin` DATETIME,
    `motivo` VARCHAR(60),
    `comentario` TEXT,
    `fecha_hora` DATETIME,
    `estatus` VARCHAR(300),
    `tipo` VARCHAR(60),
    PRIMARY KEY (`id`),
    INDEX `garantia_producto_FI_1` (`empresa_id`),
    INDEX `garantia_producto_FI_2` (`cliente_id`),
    INDEX `garantia_producto_FI_3` (`producto_id`),
    CONSTRAINT `garantia_producto_FK_1`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`),
    CONSTRAINT `garantia_producto_FK_2`
        FOREIGN KEY (`cliente_id`)
        REFERENCES `cliente` (`id`),
    CONSTRAINT `garantia_producto_FK_3`
        FOREIGN KEY (`producto_id`)
        REFERENCES `producto` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- comentario_cliente
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `comentario_cliente`;

CREATE TABLE `comentario_cliente`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `empresa_id` INTEGER,
    `cliente_id` INTEGER,
    `titulo` VARCHAR(60),
    `comentario` TEXT,
    `fecha_hora` DATETIME,
    `estatus` VARCHAR(300),
    `tipo` VARCHAR(60),
    PRIMARY KEY (`id`),
    INDEX `comentario_cliente_FI_1` (`empresa_id`),
    INDEX `comentario_cliente_FI_2` (`cliente_id`),
    CONSTRAINT `comentario_cliente_FK_1`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`),
    CONSTRAINT `comentario_cliente_FK_2`
        FOREIGN KEY (`cliente_id`)
        REFERENCES `cliente` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- perfil
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `perfil`;

CREATE TABLE `perfil`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `descripcion` VARCHAR(100),
    `activo` TINYINT(1) DEFAULT 1,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- menu_seguridad
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `menu_seguridad`;

CREATE TABLE `menu_seguridad`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `descripcion` VARCHAR(100),
    `credencial` VARCHAR(100),
    `modulo` VARCHAR(100),
    `icono` VARCHAR(50),
    `accion` VARCHAR(100),
    `superior` INTEGER,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- usuario_perfil
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `usuario_perfil`;

CREATE TABLE `usuario_perfil`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `perfil_id` INTEGER,
    `usuario_id` INTEGER,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `usuario_perfil_FI_1` (`perfil_id`),
    INDEX `usuario_perfil_FI_2` (`usuario_id`),
    CONSTRAINT `usuario_perfil_FK_1`
        FOREIGN KEY (`perfil_id`)
        REFERENCES `perfil` (`id`),
    CONSTRAINT `usuario_perfil_FK_2`
        FOREIGN KEY (`usuario_id`)
        REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- perfil_menu
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `perfil_menu`;

CREATE TABLE `perfil_menu`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `perfil_id` INTEGER,
    `menu_seguridad_id` INTEGER,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `perfil_menu_FI_1` (`perfil_id`),
    INDEX `perfil_menu_FI_2` (`menu_seguridad_id`),
    CONSTRAINT `perfil_menu_FK_1`
        FOREIGN KEY (`perfil_id`)
        REFERENCES `perfil` (`id`),
    CONSTRAINT `perfil_menu_FK_2`
        FOREIGN KEY (`menu_seguridad_id`)
        REFERENCES `menu_seguridad` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tipo_usuario
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tipo_usuario`;

CREATE TABLE `tipo_usuario`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `empresa_id` INTEGER,
    `codigo` VARCHAR(32),
    `nombre` VARCHAR(260) NOT NULL,
    `activo` TINYINT(1) DEFAULT 1,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `tipo_usuario_FI_1` (`empresa_id`),
    CONSTRAINT `tipo_usuario_FK_1`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- gestion_reparacion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `gestion_reparacion`;

CREATE TABLE `gestion_reparacion`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `empresa_id` INTEGER,
    `codigo` VARCHAR(32),
    `cliente_id` INTEGER,
    `fecha_recepcion` DATETIME,
    `tipo_aparato_id` INTEGER,
    `marca` VARCHAR(100),
    `modelo` VARCHAR(100),
    `imei` VARCHAR(32),
    `sim` TINYINT(1),
    `memoria` TINYINT(1),
    `dual` TINYINT(1),
    `tapa` TINYINT(1),
    `bateria` TINYINT(1),
    `es_garantia` TINYINT(1),
    `recibe_aparato_bloqueado` TINYINT(1),
    `comentario_no_bloqueado` TEXT,
    `motivo` VARCHAR(450),
    `comentario_cliente` TEXT,
    `fecha_estimada_entrega` DATETIME,
    `recibido_por` INTEGER,
    `reparado_por` INTEGER,
    `estatus` VARCHAR(50),
    `activo` TINYINT(1) DEFAULT 1,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `confirmo_aparato` TINYINT(1),
    `confirmo_motivo` TINYINT(1),
    `confirmo_componente` TINYINT(1),
    `comentario_reparacion` TEXT,
    `detalle_diagnostico` VARCHAR(200),
    `nombre_cliente` VARCHAR(200),
    `apellido_cliente` VARCHAR(200),
    `direccion` VARCHAR(200),
    `empresa_cliente` VARCHAR(200),
    `departamento_id` INTEGER,
    `pais_id` INTEGER,
    `clave_dispostivo` VARCHAR(100),
    `operador_original` VARCHAR(100),
    `referido_id` INTEGER,
    `tienda` VARCHAR(200),
    `nit` VARCHAR(200),
    `email` VARCHAR(200),
    `numero_telefono` VARCHAR(200),
    `tipificacion_medio_id` INTEGER,
    `confirmado_por` INTEGER,
    `comentario_confirmacion` TEXT,
    PRIMARY KEY (`id`),
    INDEX `gestion_reparacion_I_1` (`recibido_por`),
    INDEX `gestion_reparacion_I_2` (`reparado_por`),
    INDEX `gestion_reparacion_I_3` (`confirmado_por`),
    INDEX `gestion_reparacion_FI_1` (`empresa_id`),
    INDEX `gestion_reparacion_FI_2` (`cliente_id`),
    INDEX `gestion_reparacion_FI_3` (`tipo_aparato_id`),
    INDEX `gestion_reparacion_FI_6` (`departamento_id`),
    INDEX `gestion_reparacion_FI_7` (`pais_id`),
    INDEX `gestion_reparacion_FI_8` (`referido_id`),
    INDEX `gestion_reparacion_FI_9` (`tipificacion_medio_id`),
    CONSTRAINT `gestion_reparacion_FK_1`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`),
    CONSTRAINT `gestion_reparacion_FK_2`
        FOREIGN KEY (`cliente_id`)
        REFERENCES `cliente` (`id`),
    CONSTRAINT `gestion_reparacion_FK_3`
        FOREIGN KEY (`tipo_aparato_id`)
        REFERENCES `tipo_aparato` (`id`),
    CONSTRAINT `gestion_reparacion_FK_4`
        FOREIGN KEY (`recibido_por`)
        REFERENCES `usuario` (`id`),
    CONSTRAINT `gestion_reparacion_FK_5`
        FOREIGN KEY (`reparado_por`)
        REFERENCES `usuario` (`id`),
    CONSTRAINT `gestion_reparacion_FK_6`
        FOREIGN KEY (`departamento_id`)
        REFERENCES `departamento` (`id`),
    CONSTRAINT `gestion_reparacion_FK_7`
        FOREIGN KEY (`pais_id`)
        REFERENCES `pais` (`id`),
    CONSTRAINT `gestion_reparacion_FK_8`
        FOREIGN KEY (`referido_id`)
        REFERENCES `referido` (`id`),
    CONSTRAINT `gestion_reparacion_FK_9`
        FOREIGN KEY (`tipificacion_medio_id`)
        REFERENCES `tipificacion_medio` (`id`),
    CONSTRAINT `gestion_reparacion_FK_10`
        FOREIGN KEY (`confirmado_por`)
        REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- gestion_diagnostico
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `gestion_diagnostico`;

CREATE TABLE `gestion_diagnostico`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `gestion_reparacion_id` INTEGER,
    `diagnostico` VARCHAR(200),
    `detalle_diagnostico` TEXT,
    `fallo_nuevo` TEXT,
    `recomendacion_cliente` TEXT,
    `nuevo_caso` VARCHAR(50),
    `es_garantia` TINYINT(1),
    `fecha_diagnostico` DATETIME,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `gestion_diagnostico_FI_1` (`gestion_reparacion_id`),
    CONSTRAINT `gestion_diagnostico_FK_1`
        FOREIGN KEY (`gestion_reparacion_id`)
        REFERENCES `gestion_reparacion` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- gestion_repuesto
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `gestion_repuesto`;

CREATE TABLE `gestion_repuesto`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `gestion_reparacion_id` INTEGER,
    `producto_id` INTEGER,
    `cantidad` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `gestion_repuesto_FI_1` (`gestion_reparacion_id`),
    INDEX `gestion_repuesto_FI_2` (`producto_id`),
    CONSTRAINT `gestion_repuesto_FK_1`
        FOREIGN KEY (`gestion_reparacion_id`)
        REFERENCES `gestion_reparacion` (`id`),
    CONSTRAINT `gestion_repuesto_FK_2`
        FOREIGN KEY (`producto_id`)
        REFERENCES `producto` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tipo_aparato
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tipo_aparato`;

CREATE TABLE `tipo_aparato`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `empresa_id` INTEGER,
    `codigo` VARCHAR(32),
    `nombre` VARCHAR(260) NOT NULL,
    `activo` TINYINT(1) DEFAULT 1,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `tipo_aparato_FI_1` (`empresa_id`),
    CONSTRAINT `tipo_aparato_FK_1`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- departamento
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `departamento`;

CREATE TABLE `departamento`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `pais_id` INTEGER,
    `region_id` INTEGER,
    `principal` TINYINT(1) DEFAULT 0,
    `codigo` VARCHAR(32),
    `nombre` VARCHAR(260) NOT NULL,
    `activo` TINYINT(1) DEFAULT 1,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `observaciones` TEXT,
    PRIMARY KEY (`id`),
    INDEX `departamento_FI_1` (`pais_id`),
    INDEX `departamento_FI_2` (`region_id`),
    CONSTRAINT `departamento_FK_1`
        FOREIGN KEY (`pais_id`)
        REFERENCES `pais` (`id`),
    CONSTRAINT `departamento_FK_2`
        FOREIGN KEY (`region_id`)
        REFERENCES `region` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- referido
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `referido`;

CREATE TABLE `referido`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `principal` TINYINT(1) DEFAULT 0,
    `codigo` VARCHAR(32),
    `nombre` VARCHAR(260) NOT NULL,
    `activo` TINYINT(1) DEFAULT 1,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `observaciones` TEXT,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tipificacion_medio
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tipificacion_medio`;

CREATE TABLE `tipificacion_medio`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `empresa_id` INTEGER,
    `codigo` VARCHAR(32),
    `nombre` VARCHAR(260) NOT NULL,
    `activo` TINYINT(1) DEFAULT 1,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `tipificacion_medio_FI_1` (`empresa_id`),
    CONSTRAINT `tipificacion_medio_FK_1`
        FOREIGN KEY (`empresa_id`)
        REFERENCES `empresa` (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
