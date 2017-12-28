<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1514347651.
 * Generated on 2017-12-27 04:07:31 
 */
class PropelMigration_1514347651
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

CREATE TABLE `propiedad`
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
    `cantidad_lavanderia` INTEGER,
    `estado` VARCHAR(32),
    `amenidades` VARCHAR(255),
    `precio` DOUBLE,
    `negociable` TINYINT(1) DEFAULT 0,
    `incluye_gastos_escritura` TINYINT(1) DEFAULT 0,
    `anio_construccion` INTEGER,
    `mantenimiento_mensual` DOUBLE,
    `iusi_semestral` DOUBLE,
    `valor_avaluo` DOUBLE,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    PRIMARY KEY (`id`)
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

DROP TABLE IF EXISTS `propiedad`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}