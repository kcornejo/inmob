<?php



/**
 * This class defines the structure of the 'propiedad_imagen' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Sun Apr  1 20:27:09 2018
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class PropiedadImagenTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.PropiedadImagenTableMap';

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
        $this->setName('propiedad_imagen');
        $this->setPhpName('PropiedadImagen');
        $this->setClassname('PropiedadImagen');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('PROPIEDAD_ID', 'PropiedadId', 'INTEGER', 'propiedad', 'ID', true, null, null);
        $this->addColumn('NOMBRE_ORIGINAL', 'NombreOriginal', 'VARCHAR', false, 255, null);
        $this->getColumn('NOMBRE_ORIGINAL', false)->setPrimaryString(true);
        $this->addColumn('NOMBRE_ACTUAL', 'NombreActual', 'VARCHAR', false, 255, null);
        $this->getColumn('NOMBRE_ACTUAL', false)->setPrimaryString(true);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('CREATED_BY', 'CreatedBy', 'VARCHAR', false, 32, null);
        $this->addColumn('UPDATED_BY', 'UpdatedBy', 'VARCHAR', false, 32, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Propiedad', 'Propiedad', RelationMap::MANY_TO_ONE, array('propiedad_id' => 'id', ), null, null);
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
            'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
        );
    } // getBehaviors()

} // PropiedadImagenTableMap
