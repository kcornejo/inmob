<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1515467075.
 * Generated on 2018-01-09 03:04:35 
 */
class PropelMigration_1515467075
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

ALTER TABLE `propiedad` ADD CONSTRAINT `propiedad_FK_4`
    FOREIGN KEY (`carretera_id`)
    REFERENCES `carretera` (`id`);

CREATE TABLE `propiedad_imagen`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `propiedad_id` INTEGER,
    `nombre_original` VARCHAR(255),
    `nombre_actual` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `created_by` VARCHAR(32),
    `updated_by` VARCHAR(32),
    PRIMARY KEY (`id`),
    INDEX `propiedad_imagen_FI_1` (`propiedad_id`),
    CONSTRAINT `propiedad_imagen_FK_1`
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

DROP TABLE IF EXISTS `propiedad_imagen`;

ALTER TABLE `propiedad` DROP FOREIGN KEY `propiedad_FK_4`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}