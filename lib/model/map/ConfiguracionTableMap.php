<?php



/**
 * This class defines the structure of the 'configuracion' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Wed Apr 11 12:20:04 2018
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class ConfiguracionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.ConfiguracionTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('configuracion');
        $this->setPhpName('Configuracion');
        $this->setClassname('Configuracion');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('HOST', 'Host', 'VARCHAR', false, 255, null);
        $this->addColumn('ENCRIPTACION', 'Encriptacion', 'VARCHAR', false, 255, null);
        $this->addColumn('PUERTO', 'Puerto', 'VARCHAR', false, 255, null);
        $this->addColumn('USUARIO', 'Usuario', 'VARCHAR', false, 255, null);
        $this->addColumn('CLAVE', 'Clave', 'VARCHAR', false, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'symfony' => array('form' => 'true', 'filter' => 'true', ),
            'symfony_behaviors' => array(),
        );
    } // getBehaviors()

} // ConfiguracionTableMap
