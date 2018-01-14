<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1515957465.
 * Generated on 2018-01-14 19:17:45 
 */
class PropelMigration_1515957465
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

ALTER TABLE `requerimiento`
    ADD `forma_pago` VARCHAR(255) AFTER `moneda_id`;

CREATE TABLE `negocio`
(
    `requerimiento_id` INTEGER,
    `propiedad_id` INTEGER,
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`),
    INDEX `negocio_FI_1` (`requerimiento_id`),
    INDEX `negocio_FI_2` (`propiedad_id`),
    CONSTRAINT `negocio_FK_1`
        FOREIGN KEY (`requerimiento_id`)
        REFERENCES `requerimiento` (`id`),
    CONSTRAINT `negocio_FK_2`
        FOREIGN KEY (`propiedad_id`)
        REFERENCES `propiedad` (`id`)
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

DROP TABLE IF EXISTS `negocio`;

ALTER TABLE `requerimiento` DROP `forma_pago`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}