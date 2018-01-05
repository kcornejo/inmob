<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1515126450.
 * Generated on 2018-01-05 04:27:30 
 */
class PropelMigration_1515126450
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

CREATE TABLE `departamento`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `descripcion` VARCHAR(255),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `municipio`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `descripcion` VARCHAR(255),
    `departamento_id` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `municipio_FI_1` (`departamento_id`),
    CONSTRAINT `municipio_FK_1`
        FOREIGN KEY (`departamento_id`)
        REFERENCES `departamento` (`id`)
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

DROP TABLE IF EXISTS `departamento`;

DROP TABLE IF EXISTS `municipio`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}