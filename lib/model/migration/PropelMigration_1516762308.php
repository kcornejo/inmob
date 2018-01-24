<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1516762308.
 * Generated on 2018-01-24 02:51:48 
 */
class PropelMigration_1516762308
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

ALTER TABLE `requerimiento` DROP FOREIGN KEY `requerimiento_FK_3`;

ALTER TABLE `requerimiento` DROP FOREIGN KEY `requerimiento_FK_4`;

ALTER TABLE `requerimiento` DROP FOREIGN KEY `requerimiento_FK_2`;

DROP INDEX `requerimiento_FI_3` ON `requerimiento`;

DROP INDEX `requerimiento_FI_2` ON `requerimiento`;

ALTER TABLE `requerimiento` DROP `moneda_ingreso`;

ALTER TABLE `requerimiento` DROP `moneda_egresos`;

CREATE INDEX `requerimiento_FI_2` ON `requerimiento` (`usuario_id`);

ALTER TABLE `requerimiento` ADD CONSTRAINT `requerimiento_FK_2`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `usuario` (`id`);

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

ALTER TABLE `requerimiento` DROP FOREIGN KEY `requerimiento_FK_2`;

DROP INDEX `requerimiento_FI_2` ON `requerimiento`;

ALTER TABLE `requerimiento`
    ADD `moneda_ingreso` INTEGER NOT NULL AFTER `nucleo_familiar`,
    ADD `moneda_egresos` INTEGER NOT NULL AFTER `ingresos`;

CREATE BTREE INDEX `requerimiento_FI_2` ON `requerimiento` (`moneda_ingreso`);

CREATE BTREE INDEX `requerimiento_FI_3` ON `requerimiento` (`moneda_egresos`);

ALTER TABLE `requerimiento` ADD CONSTRAINT `requerimiento_FK_2`
    FOREIGN KEY (`moneda_ingreso`)
    REFERENCES `moneda` (`id`);

ALTER TABLE `requerimiento` ADD CONSTRAINT `requerimiento_FK_3`
    FOREIGN KEY (`moneda_egresos`)
    REFERENCES `moneda` (`id`);

ALTER TABLE `requerimiento` ADD CONSTRAINT `requerimiento_FK_4`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `usuario` (`id`);

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}