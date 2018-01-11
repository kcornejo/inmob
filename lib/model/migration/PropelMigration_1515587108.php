<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1515587108.
 * Generated on 2018-01-10 12:25:08 
 */
class PropelMigration_1515587108
{

    public function preUp($manager)
    {
        // add the pre-migration code here
    }

    public function postUp($manager)
    {
        // add the post-migration code here
    }

    public function preDown($manager)
    {
        // add the pre-migration code here
    }

    public function postDown($manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'propel' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE `requerimiento`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `tipo_operacion` VARCHAR(32),
    `tipo_inmueble` VARCHAR(32),
    `cantidad_habitacion` INTEGER,
    `cantidad_banio` INTEGER,
    `cantidad_parqueo` INTEGER,
    `cantidad_comedor` INTEGER,
    `cantidad_sala` INTEGER,
    `cantidad_cocina` INTEGER,
    `dormitorio_servicio` TINYINT(1) DEFAULT 0,
    `estudio` TINYINT(1) DEFAULT 0,
    `cisterna` TINYINT(1) DEFAULT 0,
    `cantidad_jardin` INTEGER,
    `cantidad_patio` INTEGER,
    `lavanderia` TINYINT(1) DEFAULT 0,
    `tiene_luz` TINYINT(1) DEFAULT 0,
    `tiene_agua` TINYINT(1) DEFAULT 0,
    `niveles` INTEGER,
    `area` DOUBLE,
    `area_x` DOUBLE,
    `area_y` DOUBLE,
    `estado` VARCHAR(32),
    `amenidades` VARCHAR(255),
    `moneda_id` INTEGER,
    `presupuesto_min` DOUBLE,
    `presupuesto_max` DOUBLE,
    `precalificacion` TINYINT(1) DEFAULT 0,
    `nombre_cliente` VARCHAR(255),
    `correo_cliente` VARCHAR(255),
    `telefono_cliente` VARCHAR(25),
    PRIMARY KEY (`id`),
    INDEX `requerimiento_FI_1` (`moneda_id`),
    CONSTRAINT `requerimiento_FK_1`
        FOREIGN KEY (`moneda_id`)
        REFERENCES `moneda` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `direccion_requerimiento`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `requerimiento_id` INTEGER,
    `departamento_id` INTEGER,
    `municipio_id` INTEGER,
    `zona` VARCHAR(200),
    `carretera_id` INTEGER,
    `km` VARCHAR(200),
    `direccion` VARCHAR(255),
    PRIMARY KEY (`id`),
    INDEX `direccion_requerimiento_FI_1` (`requerimiento_id`),
    INDEX `direccion_requerimiento_FI_2` (`departamento_id`),
    INDEX `direccion_requerimiento_FI_3` (`municipio_id`),
    INDEX `direccion_requerimiento_FI_4` (`carretera_id`),
    CONSTRAINT `direccion_requerimiento_FK_1`
        FOREIGN KEY (`requerimiento_id`)
        REFERENCES `requerimiento` (`id`),
    CONSTRAINT `direccion_requerimiento_FK_2`
        FOREIGN KEY (`departamento_id`)
        REFERENCES `departamento` (`id`),
    CONSTRAINT `direccion_requerimiento_FK_3`
        FOREIGN KEY (`municipio_id`)
        REFERENCES `municipio` (`id`),
    CONSTRAINT `direccion_requerimiento_FK_4`
        FOREIGN KEY (`carretera_id`)
        REFERENCES `carretera` (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'propel' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `requerimiento`;

DROP TABLE IF EXISTS `direccion_requerimiento`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}