<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1517543118.
 * Generated on 2018-02-02 03:45:18 
 */
class PropelMigration_1517543118
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

CREATE TABLE `token`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario_id` INTEGER NOT NULL,
    `token` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `utilizado` TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`id`),
    INDEX `token_FI_1` (`usuario_id`),
    CONSTRAINT `token_FK_1`
        FOREIGN KEY (`usuario_id`)
        REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `correo_pendiente`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `asunto` VARCHAR(255),
    `contenido` TEXT,
    `beneficiario` TEXT,
    `enviado` TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `configuracion`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `host` VARCHAR(255),
    `encriptacion` VARCHAR(255),
    `puerto` VARCHAR(255),
    `usuario` VARCHAR(255),
    `clave` VARCHAR(255),
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

DROP TABLE IF EXISTS `token`;

DROP TABLE IF EXISTS `correo_pendiente`;

DROP TABLE IF EXISTS `configuracion`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}