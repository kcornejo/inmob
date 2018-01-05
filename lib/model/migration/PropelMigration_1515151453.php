<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1515151453.
 * Generated on 2018-01-05 11:24:13 
 */
class PropelMigration_1515151453
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

ALTER TABLE `propiedad` CHANGE `dormitorio_servicio` `dormitorio_servicio` INTEGER;

ALTER TABLE `propiedad` CHANGE `estudio` `estudio` INTEGER;

ALTER TABLE `propiedad` CHANGE `cisterna` `cisterna` INTEGER;

ALTER TABLE `propiedad` CHANGE `lavanderia` `lavanderia` INTEGER;

ALTER TABLE `propiedad`
    ADD `mi_comision` DOUBLE AFTER `valor_avaluo`,
    ADD `comision_compartida` DOUBLE AFTER `mi_comision`,
    ADD `nombre_cliente` VARCHAR(255) AFTER `comision_compartida`,
    ADD `correo_cliente` VARCHAR(255) AFTER `nombre_cliente`,
    ADD `telefono_cliente` VARCHAR(25) AFTER `correo_cliente`,
    ADD `departamento_id` INTEGER AFTER `telefono_cliente`,
    ADD `municipio_id` INTEGER AFTER `departamento_id`,
    ADD `zona` VARCHAR(200) AFTER `municipio_id`,
    ADD `km` VARCHAR(200) AFTER `zona`,
    ADD `direccion` VARCHAR(255) AFTER `km`,
    ADD `seguridad` DOUBLE AFTER `direccion`,
    ADD `accesos` DOUBLE AFTER `seguridad`,
    ADD `agua` DOUBLE AFTER `accesos`,
    ADD `transporte_publico` DOUBLE AFTER `agua`,
    ADD `transito_vehicular` DOUBLE AFTER `transporte_publico`,
    ADD `comunidades_colidantes` DOUBLE AFTER `transito_vehicular`,
    ADD `areas_recreacion` DOUBLE AFTER `comunidades_colidantes`,
    ADD `precio_negociable` TINYINT(1) AFTER `areas_recreacion`,
    ADD `forma_pago` VARCHAR(255) AFTER `precio_negociable`,
    ADD `gastos_escritura` TINYINT(1) AFTER `forma_pago`;

CREATE INDEX `propiedad_FI_1` ON `propiedad` (`departamento_id`);

CREATE INDEX `propiedad_FI_2` ON `propiedad` (`municipio_id`);

ALTER TABLE `propiedad` ADD CONSTRAINT `propiedad_FK_1`
    FOREIGN KEY (`departamento_id`)
    REFERENCES `departamento` (`id`);

ALTER TABLE `propiedad` ADD CONSTRAINT `propiedad_FK_2`
    FOREIGN KEY (`municipio_id`)
    REFERENCES `municipio` (`id`);

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

ALTER TABLE `propiedad` DROP FOREIGN KEY `propiedad_FK_1`;

ALTER TABLE `propiedad` DROP FOREIGN KEY `propiedad_FK_2`;

DROP INDEX `propiedad_FI_1` ON `propiedad`;

DROP INDEX `propiedad_FI_2` ON `propiedad`;

ALTER TABLE `propiedad` CHANGE `dormitorio_servicio` `dormitorio_servicio` TINYINT(1) DEFAULT 0;

ALTER TABLE `propiedad` CHANGE `estudio` `estudio` TINYINT(1) DEFAULT 0;

ALTER TABLE `propiedad` CHANGE `cisterna` `cisterna` TINYINT(1) DEFAULT 0;

ALTER TABLE `propiedad` CHANGE `lavanderia` `lavanderia` TINYINT(1) DEFAULT 0;

ALTER TABLE `propiedad` DROP `mi_comision`;

ALTER TABLE `propiedad` DROP `comision_compartida`;

ALTER TABLE `propiedad` DROP `nombre_cliente`;

ALTER TABLE `propiedad` DROP `correo_cliente`;

ALTER TABLE `propiedad` DROP `telefono_cliente`;

ALTER TABLE `propiedad` DROP `departamento_id`;

ALTER TABLE `propiedad` DROP `municipio_id`;

ALTER TABLE `propiedad` DROP `zona`;

ALTER TABLE `propiedad` DROP `km`;

ALTER TABLE `propiedad` DROP `direccion`;

ALTER TABLE `propiedad` DROP `seguridad`;

ALTER TABLE `propiedad` DROP `accesos`;

ALTER TABLE `propiedad` DROP `agua`;

ALTER TABLE `propiedad` DROP `transporte_publico`;

ALTER TABLE `propiedad` DROP `transito_vehicular`;

ALTER TABLE `propiedad` DROP `comunidades_colidantes`;

ALTER TABLE `propiedad` DROP `areas_recreacion`;

ALTER TABLE `propiedad` DROP `precio_negociable`;

ALTER TABLE `propiedad` DROP `forma_pago`;

ALTER TABLE `propiedad` DROP `gastos_escritura`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}